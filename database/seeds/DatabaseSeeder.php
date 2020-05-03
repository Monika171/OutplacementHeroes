<?php

use Illuminate\Database\Seeder;
use App\User;
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
        //Category::truncate();
        // $this->call(UserSeeder::class);
        factory('App\User',20)->create();
    	factory('App\Company',20)->create();
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

        Role::truncate();
        $adminRole = Role::create(['name'=>'admin']);

        $admin = User::create([
            'name'=>'admin',
            'email'=>'outplacementheroes@gmail.com',
            'password'=>bcrypt('2020hired'),
            'email_verified_at'=>NOW()
        ]);

        $admin->roles()->attach($adminRole);



    }
}
