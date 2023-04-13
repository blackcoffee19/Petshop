<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class insert_news extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $news = [
	    	["title"=>"New Product",'link'=>"productdetail","attr"=>"93",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
	    	["order_code"=>'USR5_1','id_user'=>5,"title"=>"How do you think about your pets?","link"=>"feedback","attr"=>"USR5_1",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '02/04/2023 00:00:00')],
	    	["order_code"=>'USR6_1','id_user'=>6,"title"=>"How do you think about your pets?","link"=>"feedback","attr"=>"USR6_1",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '31/03/2023 01:00:00')],
	    	["order_code"=>'USR6_2','id_user'=>6,'send_admin'=>true,"title"=>"New Order","link"=>"USR6_2",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/04/2023 09:00:00')],
	    	["order_code"=>'USR5_2','id_user'=>5,'send_admin'=>true,"title"=>"New Order","link"=>"USR5_2",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 09:00:00')],
	    	["order_code"=>'USR4_1','id_user'=>4,'send_admin'=>true,"title"=>"New Order","link"=>"USR4_1",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 09:00:00')],
	    	["order_code"=>'GUT_2','send_admin'=>true,"title"=>"Order Transaction Failed","link"=>"GUT_2",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
	    	["order_code"=>'GUT_3','send_admin'=>true,"title"=>"Order Cancel","link"=>"GUT_3",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '09/04/2023 06:00:00')],
	    	["order_code"=>'GUT_4','send_admin'=>true,"title"=>"New Order","link"=>"GUT_4",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '11/04/2023 09:33:00')],
	    	["order_code"=>'GUT_5','send_admin'=>true,"title"=>"New Order","link"=>"GUT_5",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','11/04/2023 09:33:00')],
	    	["order_code"=>'GUT_6','send_admin'=>true,"title"=>"New Order","link"=>"GUT_6",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '11/04/2023 09:33:00')],
	    	["order_code"=>'GUT_7','send_admin'=>true,"title"=>"New Order","link"=>"GUT_7",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '11/04/2023 09:33:00')],
		];
	    try{
	    	foreach($news as $new){
			DB::table('news')->insert($new);
			}
	    }catch(\Throwable $tb){
	    	echo $tb;
	    } 
    }
}
