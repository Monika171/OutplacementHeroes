<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
use App\Company;
use App\VolunteerProfile;
use Hash;
use App\Role;
//use App\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        Role::truncate();

        $adminRole = Role::create(['name'=>'admin']);
        /*Role::create(['name'=>'seeker']);
        Role::create(['name'=>'employer']); 
        Role::create(['name'=>'volunteer']);
        Role::create(['name'=>'semployer']);*/

        $seekerRole = Role::create(['name'=>'seeker']);
        $employerRole = Role::create(['name'=>'employer']); 
        $volunteerRole = Role::create(['name'=>'volunteer']);
        Role::create(['name'=>'semployer']);


        $admin = User::create([
            'name'=>'admin',
            'user_type'=>'admin',
            'email'=>'outplacementheroes@gmail.com',
            'email_verified_at'=>NOW(),
            'password'=>bcrypt('2020hired')
            
        ]);

        $seeker = User::create([
            'name'=>'seek',
            'user_type'=>'seeker',
            'email'=>'seek@gmail.com',
            'email_verified_at'=>NOW(),
            'password'=>bcrypt('2020hired')
            
        ]);

        Profile::create([
            'user_id' => $seeker->id,
            'gender' => 'male',
            'dob'=>'03/15/2000'

        ]);

        $employer = User::create([
            'name'=>'emp',
            'user_type'=>'employer',
            'email'=>'emp@gmail.com',
            'email_verified_at'=>NOW(),
            'password'=>bcrypt('2020hired')
            
        ]);

        Company::create([
            'user_id' => $employer->id,
            'cname' => 'company1',
            'slug'=>str_slug('cname')

        ]);

        $volunteer = User::create([
            'name'=>'volun',
            'user_type'=>'volunteer',
            'email'=>'volun@gmail.com',
            'email_verified_at'=>NOW(),
            'password'=>bcrypt('2020hired')
            
        ]);

        VolunteerProfile::create([
            'user_id' => $volunteer->id,

        ]);

        $admin->roles()->attach($adminRole);
        $seeker->roles()->attach($seekerRole);
        $employer->roles()->attach($employerRole);
        $volunteer->roles()->attach($volunteerRole);

        //Category::truncate();
        // $this->call(UserSeeder::class);
        ////factory('App\User',20)->create();
    	////factory('App\Company',20)->create();
        //factory('App\Job',20)->create();
        
        /*$categories = [
            
            'Construction',
            'Technology',
            'Engineering',
            'Software',
            'Medical',
            'Government'
            

        ];
        foreach($categories as $category){
            Category::create(['name'=>$category]);
        }*/


    }
}
