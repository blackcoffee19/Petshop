<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;



class insert_comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments=[
            ['reply_comment'=>null,'id_product'=>3,'id_user'=>3,'context'=>"It's look like my old dog",'verified'=>false, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>1,'id_product'=>3,'id_user'=>1,'context'=>"Maybe It really your dog",'verified'=>false, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>3,'id_user'=>1,'context'=>":)",'verified'=>true,'rating'=>5, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00')],
            ['reply_comment'=>null,'id_product'=>52,'id_user'=>1,'context'=>"They're so cute",'rating'=>5,'verified'=>true, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00')],
            ['reply_comment'=>4,'id_product'=>52,'id_user'=>3,'context'=>"No Doubt",'verified'=>false, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/02/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/02/2021 00:00:00')],
            ['reply_comment'=>null,'id_product'=>22,'id_user'=>3,'context'=>"Did you have any puppy look like them?",'rating'=>5,'verified'=>true, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/12/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/12/2021 00:00:00')],
            ['reply_comment'=>null,'id_product'=>66,'id_user'=>3,'context'=>"This Urgly is so cute",'rating'=>5,'verified'=>true, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/02/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/02/2022 00:00:00')],
            ['reply_comment'=>null,'id_product'=>60,'id_user'=>1,'context'=>"This pet is all I looking for",'rating'=>5,'verified'=>true, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/05/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/05/2022 00:00:00')],
            ['reply_comment'=>8,'id_product'=>60,'id_user'=>3,'context'=>"Did you have a big pool for it?",'verified'=>false,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/05/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/05/2022 00:00:00')],
            ['reply_comment'=>8,'id_product'=>60,'id_user'=>1,'context'=>"Yes I did",'verified'=>false, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '24/05/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '24/05/2022 00:00:00')],
            ['reply_comment'=>null,'id_product'=>23,'id_user'=>1,'context'=>"How feets is it?",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['reply_comment'=>11,'id_product'=>23,'id_user'=>2,'context'=>"Shark has no feet, sir",'verified'=>false, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>69,'id_user'=>3,'context'=>"Who name cat was Mouse?",'rating'=>3,'verified'=>true, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>13,'id_product'=>69,'id_user'=>2,'context'=>"His old owner",'verified'=>false, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s'),'updated_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>63,'id_user'=>3,'context'=>"Shark eat pizza? The only one shark I know which ate pizza in bathud was Gura and she is a Vtuber",'rating'=>5,'verified'=>true, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['reply_comment'=>15,'id_product'=>63,'id_user'=>2,'context'=>"LOL",'verified'=>false ,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00')],
            ['reply_comment'=>15,'id_product'=>63,'id_user'=>4,'context'=>"Did you know sharks name Stars they eat rice and salad?",'verified'=>false, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>64,'id_user'=>1,'context'=>"Shark eat pizza, now they alse eat rice and salad. Got it",'rating'=>5,'verified'=>true, 'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>56,'id_user'=>3,'context'=>"Scorpion eat sandwich. That's weird dude",'rating'=>4, 'verified'=>true,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>71,'id_user'=>1,'context'=>"Are you sure it not bite and no poison?",'rating'=>3,'verified'=>true ,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00')],
            ['reply_comment'=>20,'id_product'=>71,'id_user'=>2,'context'=>"100% sure, get one for testing it poison",'verified'=>false ,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '02/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '02/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>32,'name'=>'Guest','rating'=>5,'verified'=>true ,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>31,'name'=>'Guest','rating'=>5,'verified'=>true ,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>30,'name'=>'Guest','rating'=>5,'verified'=>true ,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>3,'id_user'=>1,'context'=>"I love it",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00')],
            ['reply_comment'=>null,'id_product'=>69,'id_user'=>1,'context'=>"I love it too",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00')],
            ['reply_comment'=>null,'id_product'=>11,'id_user'=>1,'context'=>"I love this creature",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00')],
            ['reply_comment'=>null,'id_product'=>50,'id_user'=>3,'context'=>"I love them",'verified'=>true,'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/09/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/09/2022 00:00:00')],
            ['reply_comment'=>null,'id_product'=>75,'id_user'=>1,'context'=>"I love them",'verified'=>true,'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>3,'id_user'=>1,'context'=>"I love them",'verified'=>true,'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>88,'id_user'=>3,'context'=>":>",'verified'=>true,'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>12,'id_user'=>3,'context'=>"GOOG",'verified'=>true,'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>77,'id_user'=>5,'context'=>"",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00')],
            ['reply_comment'=>null,'id_product'=>59,'id_user'=>5,'context'=>"",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00')],
            ['reply_comment'=>null,'id_product'=>56,'id_user'=>5,'context'=>"",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00')],
            ['reply_comment'=>null,'id_product'=>42,'name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>44,'name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>88,'id_user'=>6,'context'=>"They so cute",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '31/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '31/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>86,'id_user'=>6,'context'=>"They so cute",'verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '31/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '31/03/2023 00:00:00')],
            ['reply_comment'=>null,'id_product'=>59,'id_user'=>4,'context'=>"Just comment",'verified'=>true,'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '02/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '03/04/2023 00:00:00')],
        ];
        try{
            foreach($comments as $comment){
                DB::table('comments')->insert($comment);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
