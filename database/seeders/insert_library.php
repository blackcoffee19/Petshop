<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_library extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $library = [
            ["id_product"=>1,"image"=>"husky1.png"],
            ["id_product"=>2,"image"=>"husky2.png"],
            ["id_product"=>3,"image"=>"husky3.png"],
            ["id_product"=>4,"image"=>"husky4.png"],
            ["id_product"=>5,"image"=>"husky5.jpg"],
            ["id_product"=>6,"image"=>"husky6.jpg"],
            ["id_product"=>7,"image"=>"husky7.jpeg"],
            ["id_product"=>8,"image"=>"husky8.jpg"],
            ["id_product"=>9,"image"=>"husky9.jpg"],
            ["id_product"=>10,"image"=>"husky10.jpg"],
            ["id_product"=>11,"image"=>"american1.jpg"],
            ["id_product"=>12,"image"=>"american2.jpg"],
            ["id_product"=>13,"image"=>"american3.jpeg"],
            ["id_product"=>14,"image"=>"american4.jpeg"],
            ["id_product"=>15,"image"=>"american5.jpg"],
            ["id_product"=>16,"image"=>"american5.webp"],
            ["id_product"=>17,"image"=>"american6.jpeg"],
            ["id_product"=>18,"image"=>"becgie1.jpg"],
            ["id_product"=>19,"image"=>"becgie2.jpg"],
            ["id_product"=>20,"image"=>"becgie3.jpeg"],
            ["id_product"=>21,"image"=>"becgie4.jpg"],
            ["id_product"=>22,"image"=>"becgie5.jpg"],
            ["id_product"=>23,"image"=>"becgie6.jpeg"],
            ["id_product"=>24,"image"=>"betta1.jpeg"],
            ["id_product"=>25,"image"=>"betta2.jpeg"],
            ["id_product"=>26,"image"=>"betta3.jpg"],
            ["id_product"=>27,"image"=>"betta4.png"],
            ["id_product"=>28,"image"=>"betta5.jpeg"],
            ["id_product"=>29,"image"=>"betta6.jpeg"],
            ["id_product"=>30,"image"=>"corgi1.jpeg"],
            ["id_product"=>31,"image"=>"corgi2.jpg"],
            ["id_product"=>32,"image"=>"corgi3.jpg"],
            ["id_product"=>33,"image"=>"corgi4.png"],
            ["id_product"=>34,"image"=>"corgi5.png"],
            ["id_product"=>35,"image"=>"corgi6.webp"],
            ["id_product"=>36,"image"=>"goldfish1.jpg"],
            ["id_product"=>37,"image"=>"goldfish2.jpeg"],
            ["id_product"=>38,"image"=>"goldfish3.jpg"],
            ["id_product"=>39,"image"=>"goldfish4.jpg"],
            ["id_product"=>40,"image"=>"koi1.jpg"],
            ["id_product"=>41,"image"=>"koi2.jpg"],
            ["id_product"=>42,"image"=>"koi3.jpg"],
            ["id_product"=>43,"image"=>"koi4.jpg"],
            ["id_product"=>44,"image"=>"koi5.png"],
            ["id_product"=>45,"image"=>"koi6.jpg"],
            ["id_product"=>46,"image"=>"persian1.jpg"],
            ["id_product"=>47,"image"=>"persian2.jpeg"],
            ["id_product"=>48,"image"=>"persian3.jpg"],
            ["id_product"=>49,"image"=>"persian4.jpg"],
            ["id_product"=>50,"image"=>"rottweiler1.jpg"],
            ["id_product"=>51,"image"=>"rottweiler2.jpg"],
            ["id_product"=>52,"image"=>"rottweiler3.jpg"],
            ["id_product"=>53,"image"=>"rottweiler4.jpg"],
            ["id_product"=>54,"image"=>"rottweiler5.jpg"],
            ["id_product"=>55,"image"=>"rottweiler6.jpg"],
            ["id_product"=>56,"image"=>"scorpion1.jpg"],
            ["id_product"=>57,"image"=>"scorpion2.webp"],
            ["id_product"=>58,"image"=>"scorpion3.png"],
            ["id_product"=>59,"image"=>"scorpion4.jpg"],
            ["id_product"=>60,"image"=>"shark1.jpg"],
            ["id_product"=>61,"image"=>"shark2.jpeg"],
            ["id_product"=>62,"image"=>"shark3.jpeg"],
            ["id_product"=>63,"image"=>"shark4.jpg"],
            ["id_product"=>64,"image"=>"shark5.jpg"],
            ["id_product"=>65,"image"=>"shark6.png"],
            ["id_product"=>66,"image"=>"shark7.jpg"],
            ["id_product"=>67,"image"=>"shark7.png"],
            ["id_product"=>68,"image"=>"siamese1.jpg"],
            ["id_product"=>69,"image"=>"siamese2.jpg"],
            ["id_product"=>70,"image"=>"siamese3.jpg"],
            ["id_product"=>71,"image"=>"snake1.jpg"],
            ["id_product"=>72,"image"=>"snake2.jpg"],
            ["id_product"=>73,"image"=>"snake3.jpg"],
            ["id_product"=>74,"image"=>"snake4.jpg"],
            ["id_product"=>75,"image"=>"snake5.jpg"],
            ["id_product"=>76,"image"=>"snake6.jpg"],
            ["id_product"=>77,"image"=>"snake7.jpg"],
            ["id_product"=>78,"image"=>"snake8.jpg"],
            ["id_product"=>79,"image"=>"sokoke1.jpg"],
            ["id_product"=>80,"image"=>"sokoke2.jpg"],
            ["id_product"=>81,"image"=>"sokoke3.jpg"],
            ["id_product"=>82,"image"=>"sokoke4.jpg"],
            ["id_product"=>83,"image"=>"sokoke5.jpg"],
            ["id_product"=>84,"image"=>"sokoke6.jpg"],
            ["id_product"=>85,"image"=>"tarantula1.jpg"],
            ["id_product"=>86,"image"=>"tarantula2.png"],
            ["id_product"=>87,"image"=>"tarantula3.jpeg"],
            ["id_product"=>88,"image"=>"tarantula4.jpg"],
            ["id_product"=>89,"image"=>"tarantula5.jpg"],
            ["id_product"=>90,"image"=>"tarantula6.jpg"],
            ["id_product"=>91,"image"=>"komodo1.jpeg"],
            ["id_product"=>92,"image"=>"komodo2.jpg"],
            ["id_product"=>93,"image"=>"komodo3.jpg"],
        ];
        try{
            foreach($library as $lib){
                DB::table('library')->insert($lib);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
