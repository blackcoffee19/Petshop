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
            ['order_code'=>'USR1_0','id_product'=>3,'id_user'=>1,'qty'=>3, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00')],
            ['order_code'=>'USR1_0','id_product'=>52,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00')],
            ['order_code'=>'USR1_1','id_product'=>69,'id_user'=>1,'qty'=>5, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00')],
            ['order_code'=>'USR1_1','id_product'=>11,'id_user'=>1,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00')],
            ['order_code'=>'USR3_0','id_product'=>22,'id_user'=>3,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/12/2021 00:00:00')],
            ['order_code'=>'USR3_1','id_product'=>66,'id_user'=>3,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/02/2022 00:00:00')],
            ['order_code'=>'USR1_2','id_product'=>60,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/05/2022 00:00:00')],
            ['order_code'=>'USR3_2','id_product'=>50,'id_user'=>3,'qty'=>3, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/09/2022 00:00:00')],
            ['order_code'=>'USR1_3','id_product'=>23,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['order_code'=>'USR1_3','id_product'=>75,'id_user'=>1,'qty'=>4, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['order_code'=>'USR1_4','id_product'=>64,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00')],
            ['order_code'=>'USR1_4','id_product'=>71,'id_user'=>1,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00')],
            ['order_code'=>'USR3_3','id_product'=>63,'id_user'=>3,'qty'=>3, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['order_code'=>'USR3_3','id_product'=>56,'id_user'=>3,'qty'=>5, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['order_code'=>'USR3_3','id_product'=>88,'id_user'=>3,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['order_code'=>'USR3_4','id_product'=>12,'id_user'=>3,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00')],
            ['order_code'=>'USR5_0','id_product'=>77,'id_user'=>5,'qty'=>3, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00')],
            ['order_code'=>'USR5_0','id_product'=>59,'id_user'=>5,'qty'=>5, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00')],
            ['order_code'=>'USR5_0','id_product'=>56,'id_user'=>5,'qty'=>5, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00')],
            ['order_code'=>'GUT_0','id_product'=>32,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['order_code'=>'GUT_0','id_product'=>31,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['order_code'=>'GUT_0','id_product'=>30,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['order_code'=>'GUT_1','id_product'=>42,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['order_code'=>'GUT_1','id_product'=>44,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['order_code'=>'USR6_0','id_product'=>88,'id_user'=>6,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '31/03/2023 00:00:00')],
            ['order_code'=>'USR6_0','id_product'=>86,'id_user'=>6,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '31/03/2023 00:00:00')],
            ['order_code'=>'USR4_0','id_product'=>59,'id_user'=>4,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '02/04/2023 00:00:00')],
            
            ['order_code'=>'USR1_5','id_product'=>19,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
            ['order_code'=>'USR1_5','id_product'=>59,'id_user'=>1,'qty'=>2, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
            ['order_code'=>'USR3_5','id_product'=>89,'id_user'=>3,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
            //Has News
            ['order_code'=>'USR5_1','id_product'=>17,'id_user'=>5,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '02/04/2023 00:00:00')],
            ['order_code'=>'USR6_1','id_product'=>60,'id_user'=>6,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '31/03/2023 01:00:00')],
            ['order_code'=>'USR6_1','id_product'=>32,'id_user'=>6,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '31/03/2023 01:00:00')],
            ['order_code'=>'USR6_1','id_product'=>21,'id_user'=>6,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '31/03/2023 01:00:00')],
            ['order_code'=>'USR6_2','id_product'=>67,'id_user'=>6,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '31/03/2023 09:00:00')],
            ['order_code'=>'USR6_2','id_product'=>20,'id_user'=>6,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '31/03/2023 09:00:00')],
            ['order_code'=>'USR6_2','id_product'=>27,'id_user'=>6,'qty'=>1, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '31/03/2023 09:00:00')],
            ['order_code'=>'USR5_2','id_product'=>57,'id_user'=>5,'qty'=>3, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '10/04/2023 04:00:00')],
            ['order_code'=>'USR5_2','id_product'=>67,'id_user'=>5,'qty'=>4, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '10/04/2023 04:00:00')],
            ['order_code'=>'USR5_2','id_product'=>56,'id_user'=>5,'qty'=>5, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '10/04/2023 04:00:00')],
            ['order_code'=>'USR4_1','id_product'=>53,'id_user'=>4,'qty'=>4, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['order_code'=>'USR4_1','id_product'=>55,'id_user'=>4,'qty'=>4, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['order_code'=>'USR4_1','id_product'=>51,'id_user'=>4,'qty'=>4, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['order_code'=>'USR4_1','id_product'=>21,'id_user'=>4,'qty'=>4, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['order_code'=>'GUT_2','id_product'=>11,'qty'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '08/04/2023 00:00:00')],
            ['order_code'=>'GUT_2','id_product'=>1,'qty'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '08/04/2023 00:00:00')],
            ['order_code'=>'GUT_3','id_product'=>31,'qty'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 04:00:00')],
            ['order_code'=>'GUT_4','id_product'=>61,'qty'=>3,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['order_code'=>'GUT_5','id_product'=>71,'qty'=>3,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['order_code'=>'GUT_6','id_product'=>79,'qty'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['order_code'=>'GUT_6','id_product'=>90,'qty'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['order_code'=>'GUT_7','id_product'=>91,'qty'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
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
