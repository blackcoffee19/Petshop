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
		    ["title"=>"Dog Day","code"=>"DOG12","discount"=>20,"status"=>false,"created_at"=>Carbon::createFromFormat('d/m/Y H:i:s','12/12/2022 00:00:00')],  
		    ["title"=>"Happy Spring","code"=>"SPR2023","discount"=>50,"status"=>true,"created_at"=>Carbon::createFromFormat('d/m/Y H:i:s','01/01/2023 00:00:00')],
		    ["title"=>"Happy Wednesday","code"=>"WED13","discount"=>30,"status"=>false,"created_at"=>Carbon::createFromFormat('d/m/Y H:i:s','23/11/2022 00:00:00')],
		    ["title"=>"Merry Chirstmast","code"=>"MERRY2022","discount"=>30,"status"=>false,"created_at"=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
		    ["title"=>"Happy Valentine","code"=>"VAL24","discount"=>10,"status"=>false,"created_at"=>Carbon::createFromFormat('d/m/Y H:i:s','14/02/2023 00:00:00')],
		    ["title"=>"Pet Weekend","code"=>"PET2023","discount"=>40,"status"=>true,"created_at"=>Carbon::createFromFormat('d/m/Y H:i:s','30/03/2023 00:00:00')],
		    ["title"=>"New Member","code"=>"NEW92MEETU","discount"=>50,"status"=>true,"created_at"=>Carbon::createFromFormat('d/m/Y H:i:s','01/12/2021 00:00:00')],
		    ["title"=>"Free Ship","code"=>"FREESHIP","discount"=>10,"status"=>true,"created_at"=>Carbon::createFromFormat('d/m/Y H:i:s','01/12/2021 00:00:00')]
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
