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
        Role::create(['name'=>'seeker']);
        Role::create(['name'=>'employer']); 
        Role::create(['name'=>'volunteer']);
        Role::create(['name'=>'semployer']);

        $admin = User::create([
            'name'=>'admin',
            'user_type'=>'admin',
            'email'=>'outplacementheroes@gmail.com',
            'email_verified_at'=>NOW(),
            'password'=>bcrypt('2020hired')
            
        ]);

        $admin->roles()->attach($adminRole);
       

    }
}
