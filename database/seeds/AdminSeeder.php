<?php
use App\User;
use App\Instructor;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	User::create([

    		'name' => 'admin',
    		'email' => 'admin@stm.com',
    		'password' => bcrypt('123456'),
    		'last_name' => 'admin',
    		'company' => 'Tactic',
    		'title'=>'Admin',	
    		'admin'=>'1'
    		
    	]);


        User::create([

    		'name' => 'saif',
    		'email' => 'saifarmyrej@gmail.com',
    		'password' => bcrypt('123456'),
    		'last_name' => 'admin',
    		'company' => 'Tactic',
    		'title'=>'DAF',	
    		'admin'=>'0'
    		
    	]);




     

        
    }
}
