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
            ['reply_comment'=>null,'id_product'=>3,'id_user'=>3,'likes'=>3,'context'=>"It's look like my old dog",'rating'=>4, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>1,'id_product'=>3,'id_user'=>1,'context'=>"Maybe It really your dog",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>5,'id_user'=>1,'likes'=>1,'context'=>"They're so cute",'rating'=>5, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>3,'id_product'=>5,'id_user'=>3,'context'=>"No Doubt",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>5,'id_user'=>3,'likes'=>10,'context'=>"Did you have any puppy look like them?",'rating'=>5, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>66,'id_user'=>3,'likes'=>3,'context'=>"This Urgly is so cute",'rating'=>5, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>60,'id_user'=>1,'likes'=>1,'context'=>"This pet is all I looking for",'rating'=>5, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>7,'id_product'=>60,'id_user'=>3,'context'=>"Did you have a big pool for it?",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>7,'id_product'=>60,'id_user'=>1,'context'=>"Yes I did",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>67,'id_user'=>1,'likes'=>6,'context'=>"How feets is it?",'rating'=>5, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>10,'id_product'=>67,'id_user'=>2,'context'=>"Shark has no feet, sir",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>69,'id_user'=>3,'likes'=>7,'context'=>"Who name cat was Mouse?",'rating'=>3, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>12,'id_product'=>69,'id_user'=>2,'context'=>"His old owner",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>63,'id_user'=>1,'likes'=>5,'context'=>"Shark eat pizza? The only one shark I know which ate pizza in bathud was Gura and she is a Vtuber",'rating'=>5, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>14,'id_product'=>63,'id_user'=>2,'context'=>"LOL",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>14,'id_product'=>63,'id_user'=>3,'context'=>"Did you know sharks name Stars they eat rice and salad?",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>64,'id_user'=>1,'likes'=>3,'context'=>"Shark eat pizza, now they alse eat rice and salad. Got it",'rating'=>5, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>56,'id_user'=>3,'likes'=>5,'context'=>"Scorpion eat sandwich. That's weird dude",'rating'=>4, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>null,'id_product'=>71,'id_user'=>1,'likes'=>2,'context'=>"Are you sure it not bite and no poison?",'rating'=>3, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['reply_comment'=>19,'id_product'=>71,'id_user'=>2,'context'=>"100% sure, get one for testing it poison",'rating'=>null, 'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
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
