<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
         $array = array(         
            array(
                'name'=>'Administrator',
                //'adress'=>'Bharatpur',
                'email'=>'admin@exam.com',
                'role'=>'admin',
                'password'=>Hash::make('exam123'),
             
            ),
            array(
                'name'=>'Sujan Poudel',
                //'adress'=>'Kathmandu',
                'email'=>'teacher1@exam.com',
                'role'=>'teacher',
                'password'=>Hash::make('sujan123'),
                
            ),
            array(
                'name'=>'Student',
                //'adress'=>'Kathmandu',
                'email'=>'student@exam.com',
                'role'=>'student',
                'password'=>Hash::make('student123'),
                
            )
        );
        foreach($array as $key=>$value){
            $user = User::where('email', $value['email'])->first();
            if(!$user){
                $user = new User();
            }
            $user->fill($value);
            $user->save();
        }
    }
}
