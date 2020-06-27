<?php

namespace App\Observers;

use App\Job;
use App\Notifications\NewJobImmediateNotification;
use App\User;
use App\Profile;
use App\Company;
use App\Education;
use App\Work;
use App\Country;
use App\State;
use App\City;
use App\Skill;
use App\Industry;
use App\Designation;
use App\Specialization;
use App\Course;
use Notification;

class JobObserver
{
    public function created(Job $job)
    {       

        $job->skills()->sync(request()->input('skills', []));
        $skills = $job->skills->pluck('id');        
       
        if($job->category_id){
        $i = $job->category_id;
        $ind = Industry::where('id', $i)->first();
        $industry = $ind->industry;
        }else {
            $industry = "";
          }

        $recent_designation = $job->position;        
        $course = $job->course;
        $specialization = $job->specialization;
        
        if($industry||$recent_designation||$course||$specialization){                    
            $data = []; 

                $seekersProfile = Profile::where('industry',$industry)                   
                ->orWhere('recent_designation',$recent_designation)
                ->get();

                if($seekersProfile->isNotEmpty()){
                array_push($data,$seekersProfile);
                }

                $seekersWork = Work::where('industry',$industry)                   
                ->orWhere('designation',$recent_designation)                   
                ->get();

                if($seekersWork->isNotEmpty()){
                array_push($data,$seekersWork);
                }

                $seekersEducation = Education::where('course',$course)
                          ->where('specialization',$specialization)
                          ->get();
                          
                 if($seekersEducation->isNotEmpty()){         
                array_push($data,$seekersEducation);
                 }

                $collection = collect($data);
               
                $unique =  $collection->unique('user_id'); 
                                                           
                $seekers = $unique->values()->first();             
                $user_collect = $seekers->pluck('user_id');
                $user_id = $user_collect->all();

                //dd($user_id);             

                //$myArray = $unique->values()->first();
                //return $unique->values()->all();                
            }
        

        $users = User::where('notifications_frequency', 'immediately')
            ->whereHas('skills', function ($query) use ($skills) {
                $query->whereIn('skill_id', $skills);
            })->orWhereIn('id', $user_id)
            ->get();

           //dd($users);
        Notification::send($users, new NewJobImmediateNotification($job));
    }
}
