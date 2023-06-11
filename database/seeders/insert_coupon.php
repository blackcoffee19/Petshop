<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class insert_coupon extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $coupons = [
		    ["title"=>"New Member",'code'=>"NEWMEM",'discount'=>40,'max'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/01/2022 00:00:00')],
            ["title"=>"Wednesday",'code'=>"WEDNESDAY22",'discount'=>50,'max'=>1,'status'=>false,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],
            ["title"=>"Merry Chirstmast",'code'=>"MARRYCHIRT",'discount'=>20,'max'=>1,'status'=>false,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
            ["title"=>"Free Ship",'code'=>"FREESHIP423",'discount'=>24000,'max'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/04/2023 00:00:00')],
            ["title"=>"Free Ship",'code'=>"FREESHIP522",'discount'=>24000,'max'=>3,'status'=>false,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2022 00:00:00')],
            ["title"=>"Happy May",'code'=>"MAYBE",'discount'=>20,'max'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2023 00:00:00')],
	    ];
		try{
			foreach($coupons as $cp){
				DB::table('coupon')->insert($cp);
			}
		}catch(\Throwable $tb){
			echo $tb;
		}
    }
}
