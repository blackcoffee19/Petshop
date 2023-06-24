<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class insert_cart extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carts=[
            ["order_code"=>"USR4_0","id_user"=>4,"id_product"=>71,'price'=>12,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR4_0","id_user"=>4,"id_product"=>57,'price'=>20,'sale'=>0,'amount'=>7],
            
            ["order_code"=>"USR4_1","id_user"=>4,"id_product"=>16,'price'=>10,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR4_1","id_user"=>4,"id_product"=>37,'price'=>5,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR4_2","id_user"=>4,"id_product"=>83,'price'=>33,'sale'=>10,'amount'=>3],
            ["order_code"=>"USR4_2","id_user"=>4,"id_product"=>38,'price'=>18,'sale'=>0,'amount'=>1],
            
            ["order_code"=>"USR4_3","id_user"=>4,"id_product"=>34,'price'=>30,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR4_3","id_user"=>4,"id_product"=>12,'price'=>33,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR4_4","id_user"=>4,"id_product"=>24,'price'=>43,'sale'=>0,'amount'=>3],
            ["order_code"=>"USR4_4","id_user"=>4,"id_product"=>18,'price'=>28,'sale'=>10,'amount'=>2],
            
            ["order_code"=>"USR4_5","id_user"=>4,"id_product"=>80,'price'=>8,'sale'=>10,'amount'=>4],
            ["order_code"=>"USR4_5","id_user"=>4,"id_product"=>92,'price'=>40,'sale'=>20,'amount'=>2],
            
            ["order_code"=>"USR4_6","id_user"=>4,"id_product"=>29,'price'=>5,'sale'=>10,'amount'=>4],
            ["order_code"=>"USR4_6","id_user"=>4,"id_product"=>45,'price'=>43,'sale'=>20,'amount'=>2],
            
            ["order_code"=>"USR4_7","id_user"=>4,"id_product"=>14,'price'=>30,'sale'=>0,'amount'=>3],
            ["order_code"=>"USR4_7","id_user"=>4,"id_product"=>77,'price'=>19,'sale'=>0,'amount'=>1],
            
            ["order_code"=>"USR4_8","id_user"=>4,"id_product"=>66,'price'=>20,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR4_8","id_user"=>4,"id_product"=>78,'price'=>17,'sale'=>10,'amount'=>1],
            
            ["order_code"=>"USR4_9","id_user"=>4,"id_product"=>13,'price'=>49,'sale'=>10,'amount'=>4],
            ["order_code"=>"USR4_9","id_user"=>4,"id_product"=>27,'price'=>19,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_10","id_user"=>4,"id_product"=>34,'price'=>30,'sale'=>0,'amount'=>3],
            ["order_code"=>"USR4_10","id_user"=>4,"id_product"=>59,'price'=>42,'sale'=>10,'amount'=>3],
            
            ["order_code"=>"USR4_11","id_user"=>4,"id_product"=>76,'price'=>34,'sale'=>10,'amount'=>4],
            ["order_code"=>"USR4_11","id_user"=>4,"id_product"=>25,'price'=>45,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_12","id_user"=>4,"id_product"=>55,'price'=>30,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR4_12","id_user"=>4,"id_product"=>84,'price'=>34,'sale'=>10,'amount'=>2],
            
            ["order_code"=>"USR4_13","id_user"=>4,"id_product"=>29,'price'=>43,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR4_13","id_user"=>4,"id_product"=>13,'price'=>49,'sale'=>10,'amount'=>2],
            
            ["order_code"=>"USR4_14","id_user"=>4,"id_product"=>11,'price'=>22,'sale'=>10,'amount'=>1],
            ["order_code"=>"USR4_14","id_user"=>4,"id_product"=>79,'price'=>14,'sale'=>30,'amount'=>1],
            
            ["order_code"=>"USR4_15","id_user"=>4,"id_product"=>70,'price'=>19,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR4_15","id_user"=>4,"id_product"=>15,'price'=>45,'sale'=>20,'amount'=>3],
            
            ["order_code"=>"USR4_16","id_user"=>4,"id_product"=>78,'price'=>49,'sale'=>10,'amount'=>5],
            ["order_code"=>"USR4_16","id_user"=>4,"id_product"=>58,'price'=>20,'sale'=>0,'amount'=>5],
            
            ["order_code"=>"USR4_17","id_user"=>4,"id_product"=>48,'price'=>30,'sale'=>30,'amount'=>2],
            ["order_code"=>"USR4_17","id_user"=>4,"id_product"=>83,'price'=>8,'sale'=>0,'amount'=>1],
            
            ["order_code"=>"USR4_18","id_user"=>4,"id_product"=>32,'price'=>18,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR4_18","id_user"=>4,"id_product"=>42,'price'=>18,'sale'=>10,'amount'=>2],
            
            ["order_code"=>"USR4_19","id_user"=>4,"id_product"=>83,'price'=>29,'sale'=>40,'amount'=>4],
            ["order_code"=>"USR4_19","id_user"=>4,"id_product"=>23,'price'=>29,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_20","id_user"=>4,"id_product"=>74,'price'=>15,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR4_20","id_user"=>4,"id_product"=>85,'price'=>25,'sale'=>0,'amount'=>1],
            
            ["order_code"=>"USR4_21","id_user"=>4,"id_product"=>47,'price'=>19,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR4_21","id_user"=>4,"id_product"=>57,'price'=>14,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR4_22","id_user"=>4,"id_product"=>87,'price'=>20,'sale'=>10,'amount'=>1],
            ["order_code"=>"USR4_22","id_user"=>4,"id_product"=>92,'price'=>40,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_23","id_user"=>4,"id_product"=>69,'price'=>5,'sale'=>10,'amount'=>4],
            ["order_code"=>"USR4_23","id_user"=>4,"id_product"=>88,'price'=>23,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_24","id_user"=>4,"id_product"=>89,'price'=>12,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR4_24","id_user"=>4,"id_product"=>68,'price'=>20,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_25","id_user"=>4,"id_product"=>55,'price'=>48,'sale'=>20,'amount'=>2],
            ["order_code"=>"USR4_25","id_user"=>4,"id_product"=>43,'price'=>29,'sale'=>0,'amount'=>1],
            
            ["order_code"=>"USR4_26","id_user"=>4,"id_product"=>53,'price'=>18,'sale'=>0,'amount'=>5],
            ["order_code"=>"USR4_26","id_user"=>4,"id_product"=>30,'price'=>5,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_27","id_user"=>4,"id_product"=>35,'price'=>18,'sale'=>0,'amount'=>5],
            ["order_code"=>"USR4_27","id_user"=>4,"id_product"=>23,'price'=>22,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_28","id_user"=>4,"id_product"=>1,'price'=>12,'sale'=>10,'amount'=>5],
            ["order_code"=>"USR4_28","id_user"=>4,"id_product"=>85,'price'=>8,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR4_29","id_user"=>4,"id_product"=>13,'price'=>29,'sale'=>30,'amount'=>5],
            ["order_code"=>"USR4_29","id_user"=>4,"id_product"=>89,'price'=>20,'sale'=>25,'amount'=>2],
            
            ["order_code"=>"USR5_0","id_user"=>5,"id_product"=>14,'price'=>29,'sale'=>0,'amount'=>3],
            ["order_code"=>"USR5_0","id_user"=>5,"id_product"=>26,'price'=>30,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_1","id_user"=>5,"id_product"=>16,'price'=>20,'sale'=>0,'amount'=>3],
            ["order_code"=>"USR5_1","id_user"=>5,"id_product"=>30,'price'=>5,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR5_2","id_user"=>5,"id_product"=>43,'price'=>33,'sale'=>10,'amount'=>5],
            ["order_code"=>"USR5_2","id_user"=>5,"id_product"=>77,'price'=>10,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_3","id_user"=>5,"id_product"=>90,'price'=>28,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR5_3","id_user"=>5,"id_product"=>50,'price'=>28,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR5_4","id_user"=>5,"id_product"=>60,'price'=>35,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR5_4","id_user"=>5,"id_product"=>68,'price'=>23,'sale'=>10,'amount'=>3],
            
            ["order_code"=>"USR5_5","id_user"=>5,"id_product"=>80,'price'=>8,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR5_5","id_user"=>5,"id_product"=>19,'price'=>42,'sale'=>20,'amount'=>2],
            
            ["order_code"=>"USR5_6","id_user"=>5,"id_product"=>69,'price'=>20,'sale'=>10,'amount'=>4],
            ["order_code"=>"USR5_6","id_user"=>5,"id_product"=>34,'price'=>43,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_7","id_user"=>5,"id_product"=>24,'price'=>30,'sale'=>0,'amount'=>3],
            ["order_code"=>"USR5_7","id_user"=>5,"id_product"=>47,'price'=>2,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR5_8","id_user"=>5,"id_product"=>36,'price'=>20,'sale'=>10,'amount'=>1],
            ["order_code"=>"USR5_8","id_user"=>5,"id_product"=>76,'price'=>16,'sale'=>20,'amount'=>3],
            
            ["order_code"=>"USR5_9","id_user"=>5,"id_product"=>47,'price'=>51,'sale'=>10,'amount'=>3],
            ["order_code"=>"USR5_9","id_user"=>5,"id_product"=>27,'price'=>10,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_10","id_user"=>5,"id_product"=>51,'price'=>12,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR5_10","id_user"=>5,"id_product"=>26,'price'=>30,'sale'=>10,'amount'=>4],
            
            ["order_code"=>"USR5_11","id_user"=>5,"id_product"=>91,'price'=>30,'sale'=>0,'amount'=>4],
            ["order_code"=>"USR5_11","id_user"=>5,"id_product"=>33,'price'=>45,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR5_12","id_user"=>5,"id_product"=>24,'price'=>30,'sale'=>20,'amount'=>3],
            ["order_code"=>"USR5_12","id_user"=>5,"id_product"=>15,'price'=>30,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_13","id_user"=>5,"id_product"=>26,'price'=>43,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR5_13","id_user"=>5,"id_product"=>17,'price'=>52,'sale'=>10,'amount'=>5],
            
            ["order_code"=>"USR5_14","id_user"=>5,"id_product"=>11,'price'=>24,'sale'=>20,'amount'=>1],
            ["order_code"=>"USR5_14","id_user"=>5,"id_product"=>74,'price'=>18,'sale'=>30,'amount'=>1],
            
            ["order_code"=>"USR5_15","id_user"=>5,"id_product"=>27,'price'=>20,'sale'=>0,'amount'=>7],
            ["order_code"=>"USR5_15","id_user"=>5,"id_product"=>14,'price'=>48,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR5_16","id_user"=>5,"id_product"=>15,'price'=>49,'sale'=>10,'amount'=>5],
            ["order_code"=>"USR5_16","id_user"=>5,"id_product"=>12,'price'=>20,'sale'=>0,'amount'=>5],
            
            ["order_code"=>"USR5_17","id_user"=>5,"id_product"=>24,'price'=>40,'sale'=>30,'amount'=>3],
            ["order_code"=>"USR5_17","id_user"=>5,"id_product"=>85,'price'=>8,'sale'=>0,'amount'=>1],
            
            ["order_code"=>"USR5_18","id_user"=>5,"id_product"=>36,'price'=>19,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR5_18","id_user"=>5,"id_product"=>17,'price'=>19,'sale'=>10,'amount'=>2],
            
            ["order_code"=>"USR5_19","id_user"=>5,"id_product"=>73,'price'=>29,'sale'=>0,'amount'=>4],
            ["order_code"=>"USR5_19","id_user"=>5,"id_product"=>83,'price'=>29,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_20","id_user"=>5,"id_product"=>79,'price'=>14,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR5_20","id_user"=>5,"id_product"=>18,'price'=>25,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_21","id_user"=>5,"id_product"=>34,'price'=>12,'sale'=>10,'amount'=>3],
            ["order_code"=>"USR5_21","id_user"=>5,"id_product"=>58,'price'=>15,'sale'=>10,'amount'=>2],
            ["order_code"=>"USR5_21","id_user"=>5,"id_product"=>25,'price'=>20,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR5_21","id_user"=>5,"id_product"=>28,'price'=>20,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_22","id_user"=>5,"id_product"=>18,'price'=>20,'sale'=>10,'amount'=>2],
            ["order_code"=>"USR5_22","id_user"=>5,"id_product"=>19,'price'=>44,'sale'=>10,'amount'=>4],
            
            ["order_code"=>"USR5_23","id_user"=>5,"id_product"=>29,'price'=>5,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR5_23","id_user"=>5,"id_product"=>82,'price'=>20,'sale'=>10,'amount'=>3],
            
            ["order_code"=>"USR5_24","id_user"=>5,"id_product"=>93,'price'=>10,'sale'=>0,'amount'=>4],
            ["order_code"=>"USR5_24","id_user"=>5,"id_product"=>58,'price'=>23,'sale'=>0,'amount'=>5],
            
            ["order_code"=>"USR5_25","id_user"=>5,"id_product"=>65,'price'=>38,'sale'=>20,'amount'=>2],
            ["order_code"=>"USR5_25","id_user"=>5,"id_product"=>73,'price'=>29,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_26","id_user"=>5,"id_product"=>66,'price'=>18,'sale'=>0,'amount'=>5],
            ["order_code"=>"USR5_26","id_user"=>5,"id_product"=>88,'price'=>30,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR5_27","id_user"=>5,"id_product"=>11,'price'=>20,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR5_28","id_user"=>5,"id_product"=>10,'price'=>12,'sale'=>10,'amount'=>1],
            ["order_code"=>"USR5_28","id_user"=>5,"id_product"=>60,'price'=>17,'sale'=>32,'amount'=>4],
            ["order_code"=>"USR5_28","id_user"=>5,"id_product"=>8,'price'=>8,'sale'=>0,'amount'=>4],

            ["order_code"=>"USR5_29","id_user"=>5,"id_product"=>13,'price'=>29,'sale'=>30,'amount'=>2],
            ["order_code"=>"USR5_29","id_user"=>5,"id_product"=>9,'price'=>5,'sale'=>10,'amount'=>3],
            ["order_code"=>"USR5_29","id_user"=>5,"id_product"=>20,'price'=>35,'sale'=>40,'amount'=>3],

            ["order_code"=>"USR6_0","id_user"=>6,"id_product"=>10,'price'=>27,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR6_0","id_user"=>6,"id_product"=>26,'price'=>80,'sale'=>0,'amount'=>3],

            ["order_code"=>"USR6_1","id_user"=>6,"id_product"=>6,'price'=>40,'sale'=>20,'amount'=>3],
            ["order_code"=>"USR6_1","id_user"=>6,"id_product"=>30,'price'=>5,'sale'=>0,'amount'=>4],

            ["order_code"=>"USR6_2","id_user"=>6,"id_product"=>63,'price'=>30,'sale'=>10,'amount'=>5],
            ["order_code"=>"USR6_2","id_user"=>6,"id_product"=>36,'price'=>18,'sale'=>0,'amount'=>3],

            ["order_code"=>"USR6_3","id_user"=>6,"id_product"=>13,'price'=>30,'sale'=>0,'amount'=>4],
            ["order_code"=>"USR6_3","id_user"=>6,"id_product"=>18,'price'=>17,'sale'=>0,'amount'=>1],

            ["order_code"=>"USR6_4","id_user"=>6,"id_product"=>20,'price'=>39,'sale'=>20,'amount'=>4],
            ["order_code"=>"USR6_4","id_user"=>6,"id_product"=>90,'price'=>20,'sale'=>10,'amount'=>2],

            ["order_code"=>"USR6_5","id_user"=>6,"id_product"=>80,'price'=>10,'sale'=>10,'amount'=>3],
            ["order_code"=>"USR6_5","id_user"=>6,"id_product"=>19,'price'=>40,'sale'=>0,'amount'=>3],

            ["order_code"=>"USR6_6","id_user"=>6,"id_product"=>29,'price'=>5,'sale'=>10,'amount'=>4],
            ["order_code"=>"USR6_6","id_user"=>6,"id_product"=>64,'price'=>45,'sale'=>0,'amount'=>4],

            ["order_code"=>"USR6_7","id_user"=>6,"id_product"=>84,'price'=>30,'sale'=>0,'amount'=>5],
            ["order_code"=>"USR6_7","id_user"=>6,"id_product"=>27,'price'=>29,'sale'=>0,'amount'=>5],

            ["order_code"=>"USR6_8","id_user"=>6,"id_product"=>65,'price'=>9,'sale'=>0,'amount'=>1],
            ["order_code"=>"USR6_8","id_user"=>6,"id_product"=>76,'price'=>12,'sale'=>0,'amount'=>4],

            ["order_code"=>"USR6_9","id_user"=>6,"id_product"=>17,'price'=>20,'sale'=>10,'amount'=>2],
            ["order_code"=>"USR6_9","id_user"=>6,"id_product"=>27,'price'=>20,'sale'=>0,'amount'=>4],

            ["order_code"=>"USR6_10","id_user"=>6,"id_product"=>16,'price'=>12,'sale'=>0,'amount'=>4],
            ["order_code"=>"USR6_10","id_user"=>6,"id_product"=>66,'price'=>30,'sale'=>10,'amount'=>2],

            ["order_code"=>"USR6_11","id_user"=>6,"id_product"=>26,'price'=>30,'sale'=>10,'amount'=>2],
            ["order_code"=>"USR6_11","id_user"=>6,"id_product"=>15,'price'=>43,'sale'=>0,'amount'=>4],

            ["order_code"=>"USR6_12","id_user"=>6,"id_product"=>25,'price'=>30,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR6_12","id_user"=>6,"id_product"=>14,'price'=>28,'sale'=>0,'amount'=>5],

            ["order_code"=>"USR6_13","id_user"=>6,"id_product"=>24,'price'=>43,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR6_13","id_user"=>6,"id_product"=>27,'price'=>10,'sale'=>10,'amount'=>2],

            ["order_code"=>"USR6_14","id_user"=>6,"id_product"=>11,'price'=>22,'sale'=>0,'amount'=>4],
            ["order_code"=>"USR6_14","id_user"=>6,"id_product"=>7,'price'=>15,'sale'=>30,'amount'=>1],

            ["order_code"=>"USR6_15","id_user"=>6,"id_product"=>2,'price'=>10,'sale'=>10,'amount'=>2],
            ["order_code"=>"USR6_15","id_user"=>6,"id_product"=>5,'price'=>38,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR6_16","id_user"=>6,"id_product"=>17,'price'=>46,'sale'=>10,'amount'=>2],
            ["order_code"=>"USR6_16","id_user"=>6,"id_product"=>18,'price'=>23,'sale'=>0,'amount'=>5],
            
            ["order_code"=>"USR6_17","id_user"=>6,"id_product"=>88,'price'=>22,'sale'=>10,'amount'=>4],
            ["order_code"=>"USR6_17","id_user"=>6,"id_product"=>8,'price'=>8,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR6_18","id_user"=>6,"id_product"=>3,'price'=>20,'sale'=>20,'amount'=>2],
            ["order_code"=>"USR6_18","id_user"=>6,"id_product"=>12,'price'=>18,'sale'=>20,'amount'=>2],
            
            ["order_code"=>"USR6_19","id_user"=>6,"id_product"=>22,'price'=>80,'sale'=>0,'amount'=>3],
            ["order_code"=>"USR6_19","id_user"=>6,"id_product"=>64,'price'=>43,'sale'=>20,'amount'=>3],
            ["order_code"=>"USR6_19","id_user"=>6,"id_product"=>92,'price'=>33,'sale'=>40,'amount'=>4],
            ["order_code"=>"USR6_19","id_user"=>6,"id_product"=>23,'price'=>32,'sale'=>0,'amount'=>3],
            
            ["order_code"=>"USR6_20","id_user"=>6,"id_product"=>71,'price'=>15,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR6_20","id_user"=>6,"id_product"=>51,'price'=>40,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR6_21","id_user"=>6,"id_product"=>17,'price'=>55,'sale'=>40,'amount'=>3],
            ["order_code"=>"USR6_21","id_user"=>6,"id_product"=>52,'price'=>14,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR6_22","id_user"=>6,"id_product"=>18,'price'=>23,'sale'=>10,'amount'=>3],
            ["order_code"=>"USR6_22","id_user"=>6,"id_product"=>9,'price'=>10,'sale'=>0,'amount'=>2],
            
            ["order_code"=>"USR6_23","id_user"=>6,"id_product"=>29,'price'=>5,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR6_23","id_user"=>6,"id_product"=>44,'price'=>19,'sale'=>10,'amount'=>1],
            
            ["order_code"=>"USR6_24","id_user"=>6,"id_product"=>9,'price'=>10,'sale'=>0,'amount'=>2],
            ["order_code"=>"USR6_24","id_user"=>6,"id_product"=>84,'price'=>8,'sale'=>0,'amount'=>5],
            
            ["order_code"=>"USR6_25","id_user"=>6,"id_product"=>1,'price'=>12,'sale'=>10,'amount'=>1],
            ["order_code"=>"USR6_25","id_user"=>6,"id_product"=>12,'price'=>18,'sale'=>45,'amount'=>1],
            
            ["order_code"=>"USR6_26","id_user"=>6,"id_product"=>29,'price'=>5,'sale'=>0,'amount'=>3],
            ["order_code"=>"USR6_26","id_user"=>6,"id_product"=>15,'price'=>45,'sale'=>25,'amount'=>1],
            
            ["order_code"=>"GUT_0","id_product"=>20,'price'=>32,'sale'=>10,'amount'=>2],
            ["order_code"=>"GUT_0","id_product"=>17,'price'=>45,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_1","id_product"=>11,'price'=>14,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_1","id_product"=>23,'price'=>30,'sale'=>10,'amount'=>3],
            ["order_code"=>"GUT_2","id_product"=>76,'price'=>40,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_2","id_product"=>82,'price'=>90,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_3","id_product"=>45,'price'=>42,'sale'=>20,'amount'=>3],
            ["order_code"=>"GUT_3","id_product"=>53,'price'=>32,'sale'=>30,'amount'=>2],
            ["order_code"=>"GUT_4","id_product"=>82,'price'=>19,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_4","id_product"=>91,'price'=>22,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_5","id_product"=>38,'price'=>21,'sale'=>10,'amount'=>2],
            ["order_code"=>"GUT_5","id_product"=>15,'price'=>12,'sale'=>0,'amount'=>4],
            ["order_code"=>"GUT_6","id_product"=>16,'price'=>12,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_6","id_product"=>29,'price'=>50,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_7","id_product"=>12,'price'=>18,'sale'=>10,'amount'=>3],
            ["order_code"=>"GUT_8","id_product"=>13,'price'=>33,'sale'=>30,'amount'=>5],
            ["order_code"=>"GUT_8","id_product"=>19,'price'=>40,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_9","id_product"=>10,'price'=>12,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_10","id_product"=>30,'price'=>20,'sale'=>20,'amount'=>1],
            ["order_code"=>"GUT_11","id_product"=>22,'price'=>80,'sale'=>10,'amount'=>5],
            ["order_code"=>"GUT_11","id_product"=>33,'price'=>25,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_12","id_product"=>55,'price'=>45,'sale'=>0,'amount'=>7],
            ["order_code"=>"GUT_12","id_product"=>88,'price'=>24,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_13","id_product"=>44,'price'=>45,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_13","id_product"=>66,'price'=>30,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_14","id_product"=>11,'price'=>20,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_14","id_product"=>13,'price'=>29,'sale'=>0,'amount'=>4],
            ["order_code"=>"GUT_15","id_product"=>84,'price'=>43,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_15","id_product"=>29,'price'=>30,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_16","id_product"=>30,'price'=>5,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_16","id_product"=>38,'price'=>20,'sale'=>0,'amount'=>6],
            ["order_code"=>"GUT_17","id_product"=>12,'price'=>12,'sale'=>0,'amount'=>4],
            ["order_code"=>"GUT_18","id_product"=>22,'price'=>13,'sale'=>10,'amount'=>2],
            ["order_code"=>"GUT_18","id_product"=>45,'price'=>16,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_19","id_product"=>28,'price'=>20,'sale'=>0,'amount'=>4],
            ["order_code"=>"GUT_20","id_product"=>2,'price'=>20,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_20","id_product"=>3,'price'=>29,'sale'=>20,'amount'=>1],
            ["order_code"=>"GUT_21","id_product"=>5,'price'=>43,'sale'=>10,'amount'=>1],
            ["order_code"=>"GUT_22","id_product"=>18,'price'=>23,'sale'=>10,'amount'=>3],
            ["order_code"=>"GUT_22","id_product"=>11,'price'=>20,'sale'=>20,'amount'=>2],
            ["order_code"=>"GUT_23","id_product"=>44,'price'=>45,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_24","id_product"=>46,'price'=>20,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_24","id_product"=>40,'price'=>29,'sale'=>20,'amount'=>3],
            ["order_code"=>"GUT_25","id_product"=>43,'price'=>25,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_25","id_product"=>47,'price'=>29,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_26","id_product"=>41,'price'=>10,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_27","id_product"=>42,'price'=>10,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_27","id_product"=>4,'price'=>18,'sale'=>10,'amount'=>1],
            ["order_code"=>"GUT_28","id_product"=>14,'price'=>30,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_29","id_product"=>18,'price'=>20,'sale'=>20,'amount'=>3],
            ["order_code"=>"GUT_30","id_product"=>15,'price'=>25,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_31","id_product"=>24,'price'=>24,'sale'=>10,'amount'=>1],
            ["order_code"=>"GUT_32","id_product"=>77,'price'=>22,'sale'=>40,'amount'=>2],
            ["order_code"=>"GUT_32","id_product"=>79,'price'=>22,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_32","id_product"=>74,'price'=>43,'sale'=>20,'amount'=>1],
            ["order_code"=>"GUT_33","id_product"=>67,'price'=>29,'sale'=>20,'amount'=>3],
            ["order_code"=>"GUT_33","id_product"=>39,'price'=>5,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_34","id_product"=>71,'price'=>14,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_35","id_product"=>61,'price'=>16,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_35","id_product"=>81,'price'=>10,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_36","id_product"=>1,'price'=>12,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_36","id_product"=>22,'price'=>10,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_37","id_product"=>14,'price'=>33,'sale'=>10,'amount'=>3],
            ["order_code"=>"GUT_37","id_product"=>18,'price'=>20,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_38","id_product"=>72,'price'=>30,'sale'=>20,'amount'=>3],
            ["order_code"=>"GUT_39","id_product"=>73,'price'=>29,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_40","id_product"=>84,'price'=>43,'sale'=>20,'amount'=>1],
            ["order_code"=>"GUT_40","id_product"=>25,'price'=>30,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_41","id_product"=>27,'price'=>19,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_41","id_product"=>82,'price'=>20,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_42","id_product"=>21,'price'=>50,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_42","id_product"=>91,'price'=>40,'sale'=>0,'amount'=>2],
            ["order_code"=>"GUT_43","id_product"=>29,'price'=>5,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_44","id_product"=>89,'price'=>8,'sale'=>0,'amount'=>1],
            ["order_code"=>"GUT_44","id_product"=>9,'price'=>10,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_45","id_product"=>12,'price'=>18,'sale'=>45,'amount'=>2],
            ["order_code"=>"GUT_45","id_product"=>22,'price'=>30,'sale'=>40,'amount'=>2],
            ["order_code"=>"GUT_46","id_product"=>30,'price'=>5,'sale'=>0,'amount'=>3],
            ["order_code"=>"GUT_46","id_product"=>66,'price'=>30,'sale'=>1,'amount'=>3],
            ["order_code"=>"GUT_47","id_product"=>62,'price'=>18,'sale'=>45,'amount'=>3],
            ["order_code"=>"GUT_47","id_product"=>89,'price'=>40,'sale'=>15,'amount'=>2],
            ["order_code"=>"GUT_48","id_product"=>1,'price'=>12,'sale'=>0,'amount'=>5],
            ["order_code"=>"GUT_49","id_product"=>88,'price'=>20,'sale'=>25,'amount'=>2],
            ["order_code"=>"GUT_50","id_product"=>12,'price'=>18,'sale'=>45,'amount'=>3],
            ["order_code"=>"GUT_51","id_product"=>79,'price'=>40,'sale'=>15,'amount'=>2],
            //
            
        ];
        try{
            foreach($carts as $cart){
                DB::table('cart')->insert($cart);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
