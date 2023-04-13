<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_likecomment extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $likes = [
            ["id_user"=>1,"id_comment"=>1],
            ["id_user"=>6,"id_comment"=>3],
            ["id_user"=>2,"id_comment"=>4],
            ["id_user"=>6,"id_comment"=>6],
            ["id_user"=>1,"id_comment"=>7],
            ["id_user"=>2,"id_comment"=>8],
            ["id_user"=>3,"id_comment"=>11],
            ["id_user"=>5,"id_comment"=>13],
            ["id_user"=>4,"id_comment"=>15],
            ["id_user"=>5,"id_comment"=>15],
            ["id_user"=>2,"id_comment"=>18],
            ["id_user"=>1,"id_comment"=>19],
            ["id_user"=>2,"id_comment"=>19],
            ["id_user"=>2,"id_comment"=>20],
            ["id_user"=>3,"id_comment"=>20],
            ["id_user"=>1,"id_comment"=>22],
            ["id_user"=>2,"id_comment"=>23],
            ["id_user"=>1,"id_comment"=>24],
            ["id_user"=>2,"id_comment"=>25],
            ["id_user"=>5,"id_comment"=>25],
            ["id_user"=>3,"id_comment"=>25],
            ["id_user"=>2,"id_comment"=>26],
            ["id_user"=>5,"id_comment"=>26],
            ["id_user"=>4,"id_comment"=>26],
            ["id_user"=>2,"id_comment"=>27],
            ["id_user"=>3,"id_comment"=>27],
            ["id_user"=>6,"id_comment"=>27],
            ["id_user"=>5,"id_comment"=>28],
            ["id_user"=>2,"id_comment"=>29],
            ["id_user"=>2,"id_comment"=>30],
            ["id_user"=>3,"id_comment"=>30],
            ["id_user"=>4,"id_comment"=>30],
            ["id_user"=>1,"id_comment"=>31],
            ["id_user"=>2,"id_comment"=>31],
            ["id_user"=>4,"id_comment"=>31],
            ["id_user"=>5,"id_comment"=>31],
            ["id_user"=>2,"id_comment"=>32],
            ["id_user"=>1,"id_comment"=>32],
            ["id_user"=>5,"id_comment"=>32],
            ["id_user"=>2,"id_comment"=>33],
            ["id_user"=>1,"id_comment"=>33],
            ["id_user"=>4,"id_comment"=>34],
            ["id_user"=>6,"id_comment"=>34],
            ["id_user"=>1,"id_comment"=>34],
            ["id_user"=>1,"id_comment"=>35],
            ["id_user"=>2,"id_comment"=>35],
            ["id_user"=>3,"id_comment"=>35],
            ["id_user"=>4,"id_comment"=>36],
            ["id_user"=>2,"id_comment"=>37],
            ["id_user"=>1,"id_comment"=>38],
            ["id_user"=>5,"id_comment"=>38],
            ["id_user"=>4,"id_comment"=>38],
            ["id_user"=>3,"id_comment"=>39],
            ["id_user"=>2,"id_comment"=>39],
            ["id_user"=>5,"id_comment"=>39]
        ];
        try {
            foreach($likes as $like){
                DB::table('like_comment')->insert($like);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
