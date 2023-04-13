<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_banner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $banners = [
		    ["image"=>"banner-1.png","title"=>"Friendly Dogs",'title_color'=>'#000000',"link"=>"productlist","attr"=>"dog","content"=>"Get up -50% Off",'content_color'=>'#5F717C','btn_content'=>'Buy Now','btn_bg_color'=>"#000000",'btn_color'=>'#FFFFFF'],
	    	["image"=>"banner-2.png","title"=>"Beatiful Cats",'title_color'=>'#000000',"link"=>"productlist","attr"=>"cat","content"=>"Get up -50% Off",'content_color'=>'#5F717C','btn_content'=>'Buy Now','btn_bg_color'=>"#000000",'btn_color'=>'#FFFFFF'],
			['image'=>'banner-3.jpg','title'=>"Adopt A Cute Dog",'title_color'=>'#FFFFFF','link'=>"productlist",'attr'=>'dog','content'=>'Get the best dog','content_color'=>'#000000','btn_content'=>"Show Now",'btn_bg_color'=>"#198754","btn_color"=>'#000000']
		];
	    try{
	    	foreach($banners as $banner){
			DB::table('banner')->insert($banner);
		}
	    }catch(\Throwable $tb){
	    	echo $tb;
	    }
    }
}
