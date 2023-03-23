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
            ['id_product'=>12,'id_user'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>14,'id_user'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>21,'id_user'=>3,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>51,'id_user'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>69,'id_user'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>72,'id_user'=>3,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>32,'id_user'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>72,'id_user'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>63,'id_user'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>37,'id_user'=>3,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>33,'id_user'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>43,'id_user'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>64,'id_user'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>24,'id_user'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>84,'id_user'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['id_product'=>4,'id_user'=>3,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')]
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
