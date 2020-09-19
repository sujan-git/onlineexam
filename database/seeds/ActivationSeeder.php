<?php

use Illuminate\Database\Seeder;
use App\Model\Activation;

class ActivationSeeder extends Seeder
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
	                'label'=>'exam', 
	            ),
	            array(
	                'label'=>'registration',
	                
	             
	            ),
	            array(
	                'label'=>'result',
	            ),
	            
        	);
        foreach($array as $key=>$value){
            $actv = Activation::where('label', $value['label'])->first();
            if(!$actv){
                $actv = new Activation();
            }
            $actv->fill($value);
            $actv->save();
        }
    }
}
