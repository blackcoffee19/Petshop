<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class insert_message extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $messages = [
            ['code_group'=>"UCT54","id_user"=>5,'message'=>"Which type of scorpion has the strongest venom?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/01/2023 00:00:00')],
            ['code_group'=>"UCT54","id_user"=>4,'message'=>"I think you can check scorpion Sha or June",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/01/2023 00:00:00')],
            ['code_group'=>"UCT54","id_user"=>5,'message'=>"Ok thanks",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '20/01/2023 09:20:00')],
            ['code_group'=>"UCT54","id_user"=>5,'message'=>"Is Emma here?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '24/01/2023 12:00:00')],
            ['code_group'=>"UCT54","id_user"=>4,'message'=>"Yes?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '24/01/2023 12:30:00')],
            ['code_group'=>"UCT51","id_user"=>5,'message'=>"How to date with Emma?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '13/02/2023 1:30:00')],
            ['code_group'=>"UCT51","id_user"=>1,'message'=>"LOL",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '13/02/2023 1:33:00')],
            ['code_group'=>"UCT62","id_user"=>6,'message'=>"Hi",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 08:40:00')],
            ['code_group'=>"UCT62","id_user"=>2,'message'=>"How can I help you?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 08:43:00')],
            ["id_user"=>3,'message'=>"I'm finding a rabbit",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/04/2023 08:43:00')],
            ["id_user"=>6,'message'=>"Did you have any torture?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/04/2023 09:10:00')],
            ["id_user"=>5,'message'=>"Did you have crocodiles?",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/04/2023 12:10:00')],
        ];
        try {
            foreach ($messages as $mess) {
                DB::table('message')->insert($mess);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
