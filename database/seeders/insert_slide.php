<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class insert_slide extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $slides = [
			
	    	["image"=>"slide-1.png","title"=>"Give us a home","content"=>"These cute and friendly pet want a sweete home","link"=>"productlist",'btn_content'=>"Shop Now","attr1"=>"dog",'attr2'=>'husky',"alert"=>"Nice to meet you",'alert_bg'=>'#FFC107','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
			["image"=>"slide-2.png","title"=>"-50% for New Friend","content"=>"Sign up to get -50% for first time buying","link"=>"signup",'btn_content'=>"Sign Up Now","alert"=>"Best Price",'alert_bg'=>'#FFC107','created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
	    ];
	    try{
		    foreach($slides as $sl){
		    	DB::table('slide')->insert($sl);
		    }
	    }catch(\Throwable $tb){
	    	echo $tb;
	    }
    }
}
