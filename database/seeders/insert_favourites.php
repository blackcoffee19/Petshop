<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_favourites extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $favourites=[
            ['id_product'=>42,'id_user'=>4,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>44,'id_user'=>5,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>54,'id_user'=>6,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>54,'id_user'=>4,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>69,'id_user'=>5,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>75,'id_user'=>6,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>65,'id_user'=>5,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>75,'id_user'=>4,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>66,'id_user'=>5,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>67,'id_user'=>6,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>6,'id_user'=>4,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>46,'id_user'=>5,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>64,'id_user'=>5,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>54,'id_user'=>4,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>84,'id_user'=>5,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>4,'id_user'=>6,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')]
        ];
        try{
            foreach($favourites as $fav){
                DB::table('favourites')->insert($fav);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
