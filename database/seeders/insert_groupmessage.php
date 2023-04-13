<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class insert_groupmessage extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            ['code_group'=>"UCT54",'id_user1'=>5,'id_user2'=>4,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['code_group'=>"UCT51",'id_user1'=>5,'id_user2'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['code_group'=>"UCT62",'id_user1'=>6,'id_user2'=>2,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
        ];
        try {
            foreach ($groups as $gr ) {
                DB::table('group_chat')->insert($gr);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
