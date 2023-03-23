<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_breed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $breeds=[
            ['id_type_product'=>1,'breed_name'=>'husky','image'=>'category_husky.png'],
            ['id_type_product'=>1,'breed_name'=>'corgi','image'=>'category_corgi.png'],
            ['id_type_product'=>1,'breed_name'=>'becgie','image'=>'category_becgie.png'],
            ['id_type_product'=>1,'breed_name'=>'rottweiler','image'=>'category_rott.png'],
            ['id_type_product'=>2,'breed_name'=>'persian','image'=>'category_persian.png'],
            ['id_type_product'=>2,'breed_name'=>'siamese','image'=>'category_siamese.png'],
            ['id_type_product'=>2,'breed_name'=>'sokoke','image'=>'category_sokoke.png'],
            ['id_type_product'=>2,'breed_name'=>'american','image'=>'category_american.png'],
            ['id_type_product'=>3,'breed_name'=>'goldfish','image'=>'category_goldfish.png'],
            ['id_type_product'=>3,'breed_name'=>'koi','image'=>'category_koi.png'],
            ['id_type_product'=>3,'breed_name'=>'betta','image'=>'category_betta.png'],
            ['id_type_product'=>3,'breed_name'=>'shark','image'=>'category_shark.png'],
            ['id_type_product'=>4,'breed_name'=>'komodo','image'=>'category_komodo.png'],
            ['id_type_product'=>4,'breed_name'=>'tarantula','image'=>'category_taran.png'],
            ['id_type_product'=>4,'breed_name'=>'snake','image'=>'category_snake.png'],
            ['id_type_product'=>4,'breed_name'=>'scorpion','image'=>'category_scopion.png']
        ];
        try{
            foreach($breeds as $breed){
                DB::table('breeds')->insert($breed);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
