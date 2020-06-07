<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Industry;
use App\User;
use Auth;

class Job extends Model
{

  protected $fillable = ['user_id','company_id','title','slug','description',
  'category_id','position','roles','function','salary','experience','course',
  'specialization','gender','preferences','address_line1','address_line2',
  'country','state','city','pincode','number_of_vacancy','type',
  'notice_period','last_date','status'];


    public function getRouteKeyName(){
		return 'slug';
    }
    
    public function company(){
    	return $this->belongsTo('App\Company');
    }

    public function users(){
      return $this->belongsToMany(User::class)->withTimeStamps();
  }

  public function checkApplication(){
    return \DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
  }

  public function favorites(){
    return $this->belongsToMany(Job::class,'favourites','job_id','user_id')->withTimeStamps();
  }
  
  public function checkSaved(){
    return \DB::table('favourites')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
  } 


}
