<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_type_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type_products = [
            ['name_type'=>'dog'],
            ['name_type'=>'cat'],
            ['name_type'=>'fish'],
            ['name_type'=>'reptilia']
        ];

        try{
            foreach($type_products as $type){
                DB::table('type_products')->insert($type);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
