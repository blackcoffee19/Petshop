<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class insert_cart extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts=[
            ['order_code'=>'user_0919941037_0','id_product'=>3,'id_user'=>1,'qty'=>3, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00')],
            ['order_code'=>'user_0919941037_0','id_product'=>52,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00')],
            ['order_code'=>'user_0919941037_1','id_product'=>69,'id_user'=>1,'qty'=>5, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00')],
            ['order_code'=>'user_0919941037_1','id_product'=>11,'id_user'=>1,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00')],
            ['order_code'=>'user_1234568_0','id_product'=>22,'id_user'=>3,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/12/2021 00:00:00')],
            ['order_code'=>'user_1234568_1','id_product'=>66,'id_user'=>3,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/02/2022 00:00:00')],
            ['order_code'=>'user_0919941037_2','id_product'=>80,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/05/2022 00:00:00')],
            ['order_code'=>'user_1234568_2','id_product'=>50,'id_user'=>3,'qty'=>3, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/09/2022 00:00:00')],
            ['order_code'=>'user_0919941037_3','id_product'=>23,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['order_code'=>'user_0919941037_3','id_product'=>75,'id_user'=>1,'qty'=>4, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['order_code'=>'user_0919941037_4','id_product'=>63,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00')],
            ['order_code'=>'user_0919941037_4','id_product'=>33,'id_user'=>1,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00')],
            ['order_code'=>'user_1234568_3','id_product'=>54,'id_user'=>3,'qty'=>3, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['order_code'=>'user_1234568_3','id_product'=>50,'id_user'=>3,'qty'=>5, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['order_code'=>'user_1234568_3','id_product'=>88,'id_user'=>3,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['order_code'=>'user_1234568_4','id_product'=>12,'id_user'=>3,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00')],
            ['id_product'=>32,'id_user'=>1,'qty'=>1, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
        ];
        try{
            foreach($carts as $cart){
                DB::table('cart')->insert($cart);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
