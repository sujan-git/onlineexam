<?php

use Illuminate\Database\Seeder;
use App\Model\Subject;

class SubjectSeeder extends Seeder
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
	                'name'=>'English',
	                'fullmarks'=>20,
	                'passmarks'=>8
	             
	            ),
	            array(
	                'name'=>'Maths',
	                'fullmarks'=>20,
	                'passmarks'=>8
	             
	            ),
	            array(
	                'name'=>'Physics',
	                'fullmarks'=>20,
	                'passmarks'=>8
	             
	            ),
	            array(
	                'name'=>'Chemistry',
	                'fullmarks'=>20,
	                'passmarks'=>8
	             
	            ),
	            array(
	                'name'=>'Biology',
	                'fullmarks'=>20,
	                'passmarks'=>8
	             
	            ),
	            array(
	                'name'=>'English',
	                'fullmarks'=>20,
	                'passmarks'=>8
	             
	            ),
	            array(
	                'name'=>'General Knowledge',
	                'fullmarks'=>20,
	                'passmarks'=>8
	             
	            ),
        	);
        foreach($array as $key=>$value){
            $subject = Subject::where('name', $value['name'])->first();
            if(!$subject){
                $subject = new Subject();
            }
            $subject->fill($value);
            $subject->save();
        }
    }
}
