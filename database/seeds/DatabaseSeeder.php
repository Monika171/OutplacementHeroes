<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
use App\Company;
use App\VolunteerProfile;
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
        Role::create(['name'=>'seeker']);  //Job Seeker
        Role::create(['name'=>'employer']); //Hiring employer
        Role::create(['name'=>'semployer']);  //Separating employer      
        Role::create(['name'=>'volunteer']);  //Mentor Support Volunteer
        Role::create(['name'=>'jvolunteer']);  //Job Search Support Volunteer
        Role::create(['name'=>'consultant']);  //Consultant

        $admin = User::create([
            'name'=>'admin',
            'user_type'=>'admin',
            'email'=>'hello@outplacementheros.org',
            'email_verified_at'=>NOW(),
            'password'=>bcrypt('2020hired')
            
        ]);

        $admin->roles()->attach($adminRole);
       

    }
}
