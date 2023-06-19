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
            //USR4_0 
            ["id_product"=>71,'id_user'=>4,'verified'=>true,'context'=>"Oke Just a comment rating",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/02/2022 00:00:00')],
            ["id_product"=>57,'id_user'=>4,'verified'=>true,'context'=>"Oke Just a comment rating",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/02/2022 00:00:00')],
            //USR4_1 
            ["id_product"=>16,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/03/2022 00:00:00')],
            ["id_product"=>37,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/03/2022 00:00:00')],
            //USR4_2  
            ["id_product"=>83,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2022 00:00:00')],
            ["id_product"=>38,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2022 00:00:00')],
            //USR4_3 
            ["id_product"=>34,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/03/2022 00:00:00')],
            ["id_product"=>12,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/03/2022 00:00:00')],
            //USR4_4 
            ["id_product"=>24,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2022 00:00:00')],
            ["id_product"=>18,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2022 00:00:00')],
            //USR4_5 
            ["id_product"=>80,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/05/2022 00:00:00')],
            ["id_product"=>92,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/05/2022 00:00:00')],
            //USR4_6
            ["id_product"=>29,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/05/2022 00:00:00')],
            ["id_product"=>45,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/05/2022 00:00:00')],
            //USR4_7
            ["id_product"=>14,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/06/2022 00:00:00')],
            ["id_product"=>77,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/06/2022 00:00:00')],
            //USR4_8
            ["id_product"=>66,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/07/2022 00:00:00')],
            ["id_product"=>78,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/07/2022 00:00:00')],
            //USR4_9 
            ["id_product"=>13,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/07/2022 00:00:00')],
            ["id_product"=>27,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/07/2022 00:00:00')],
            //USR4_10
            ["id_product"=>34,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/08/2022 00:00:00')],
            ["id_product"=>59,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/08/2022 00:00:00')],
            //USR4_11 
            ["id_product"=>76,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/09/2022 00:00:00')],
            ["id_product"=>25,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/09/2022 00:00:00')],
            //USR4_13 
            ["id_product"=>29,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/10/2022 00:00:00')],
            ["id_product"=>13,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/10/2022 00:00:00')],
            //USR4_14 
            ["id_product"=>11,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/11/2022 00:00:00')],
            ["id_product"=>79,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/11/2022 00:00:00')],
            //USR4_15 
            ["id_product"=>70,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/11/2022 00:00:00')],
            ["id_product"=>15,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/11/2022 00:00:00')],
            //USR4_16 
            ["id_product"=>78,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/11/2022 00:00:00')],
            ["id_product"=>58,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/11/2022 00:00:00')],
            //USR4_17
            ["id_product"=>48,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/12/2022 00:00:00')],
            ["id_product"=>83,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/12/2022 00:00:00')],
            //USR4_18
            ["id_product"=>32,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/12/2022 00:00:00')],
            ["id_product"=>42,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/12/2022 00:00:00')],
            //USR4_19 
            ["id_product"=>83,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/12/2022 00:00:00')],
            ["id_product"=>23,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/12/2022 00:00:00')],
            //USR4_20 
            ["id_product"=>74,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/01/2023 00:00:00')],
            ["id_product"=>85,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/01/2023 00:00:00')],
            //USR4_22
            ["id_product"=>87,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','07/02/2023 00:00:00')],
            ["id_product"=>92,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','07/02/2023 00:00:00')],
            //USR4_23 
            ["id_product"=>69,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/02/2023 00:00:00')],
            ["id_product"=>88,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/02/2023 00:00:00')],
            //USR4_24
            ["id_product"=>89,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/03/2023 00:00:00')],
            ["id_product"=>68,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/03/2023 00:00:00')],
            //USR4_25
            ["id_product"=>55,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/04/2023 00:00:00')],
            ["id_product"=>43,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/04/2023 00:00:00')],
            //USR4_26
            ["id_product"=>53,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/04/2023 00:00:00')],
            ["id_product"=>50,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/04/2023 00:00:00')],
            //USR4_27
            ["id_product"=>35,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/05/2023 00:00:00')],
            ["id_product"=>23,'id_user'=>4,'verified'=>true,'context'=>":))))",'rating'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/05/2023 00:00:00')],
            
            //USR5_0 
            ["id_product"=>14,'id_user'=>5,'verified'=>true,'context'=>"I LOVE IT",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/02/2022 00:00:00')],
            ["id_product"=>26,'id_user'=>5,'verified'=>true,'context'=>"OKW",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/02/2022 00:00:00')],
            //USR5_1 
            ["id_product"=>16,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/03/2022 00:00:00')],
            ["id_product"=>30,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/03/2022 00:00:00')],
            //USR5_2  
            ["id_product"=>43,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/03/2022 00:00:00')],
            ["id_product"=>77,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/03/2022 00:00:00')],
            //USR5_3 
            ["id_product"=>90,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/03/2022 00:00:00')],
            ["id_product"=>50,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/03/2022 00:00:00')],
            //USR5_4 
            ["id_product"=>60,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/04/2022 00:00:00')],
            ["id_product"=>68,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/04/2022 00:00:00')],
            //USR5_5 
            ["id_product"=>80,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/05/2022 00:00:00')],
            ["id_product"=>19,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/05/2022 00:00:00')],
            //USR5_6
            ["id_product"=>69,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/05/2022 00:00:00')],
            ["id_product"=>34,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','27/05/2022 00:00:00')],
            //USR5_7
            ["id_product"=>24,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/06/2022 00:00:00')],
            ["id_product"=>47,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/06/2022 00:00:00')],
            //USR5_8
            ["id_product"=>36,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/07/2022 00:00:00')],
            ["id_product"=>76,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/07/2022 00:00:00')],
            //USR5_10
            ["id_product"=>51,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/08/2022 00:00:00')],
            ["id_product"=>26,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','17/08/2022 00:00:00')],
            //USR5_11 
            ["id_product"=>91,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/09/2022 00:00:00')],
            ["id_product"=>33,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/09/2022 00:00:00')],
            //USR5_12 
            ["id_product"=>24,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/09/2022 00:00:00')],
            ["id_product"=>15,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/09/2022 00:00:00')],
            //USR5_13 
            ["id_product"=>26,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/10/2022 00:00:00')],
            ["id_product"=>17,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/10/2022 00:00:00')],
            //USR5_15
            ["id_product"=>27,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/11/2022 00:00:00')],
            ["id_product"=>14,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/11/2022 00:00:00')],
            //USR5_16 
            ["id_product"=>15,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/11/2022 00:00:00')],
            ["id_product"=>12,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/11/2022 00:00:00')],
            //USR5_19
            ["id_product"=>73,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/12/2022 00:00:00')],
            ["id_product"=>83,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/12/2022 00:00:00')],
            //USR5_20
            ["id_product"=>79,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/01/2023 00:00:00')],
            ["id_product"=>18,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/01/2023 00:00:00')],
            //USR5_21
            ["id_product"=>34,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/01/2023 00:00:00')],
            ["id_product"=>58,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/01/2023 00:00:00')],
            ["id_product"=>25,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/01/2023 00:00:00')],
            ["id_product"=>28,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/01/2023 00:00:00')],
            //USR5_22
            ["id_product"=>18,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/02/2023 00:00:00')],
            ["id_product"=>19,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/02/2023 00:00:00')],
            //USR5_23 
            ["id_product"=>29,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/03/2023 00:00:00')],
            ["id_product"=>82,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/03/2023 00:00:00')],
            //USR5_24
            ["id_product"=>93,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/03/2023 00:00:00')],
            ["id_product"=>58,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/03/2023 00:00:00')],
            //USR5_25
            ["id_product"=>65,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/04/2023 00:00:00')],
            ["id_product"=>73,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/04/2023 00:00:00')],

            //USR5_26
            ["id_product"=>66,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/04/2023 00:00:00')],
            ["id_product"=>88,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/04/2023 00:00:00')],
            //USR5_27
            ["id_product"=>11,'id_user'=>5,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/05/2023 00:00:00')],            
            //USR6_0
            ["id_product"=>10,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/03/2022 00:00:00')],
            ["id_product"=>26,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/03/2022 00:00:00')],
            //USR6_1 
            ["id_product"=>6,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/04/2022 00:00:00')],
            ["id_product"=>30,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/04/2022 00:00:00')],
            //USR6_2
            ["id_product"=>63,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/04/2022 00:00:00')],
            ["id_product"=>36,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/04/2022 00:00:00')],
            //USR6_3
            ["id_product"=>13,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/05/2022 00:00:00')],
            ["id_product"=>18,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/05/2022 00:00:00')],
            //USR6_4
            ["id_product"=>20,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/06/2022 00:00:00')],
            ["id_product"=>90,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/06/2022 00:00:00')],
            //USR6_6
            ["id_product"=>29,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/07/2022 00:00:00')],
            ["id_product"=>64,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','16/07/2022 00:00:00')],
            //USR6_7
            ["id_product"=>84,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/07/2022 00:00:00')],
            ["id_product"=>27,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/07/2022 00:00:00')],
            //USR6_8 
            ["id_product"=>65,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/08/2022 00:00:00')],
            ["id_product"=>76,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/08/2022 00:00:00')],
            //USR6_9
            ["id_product"=>17,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/09/2022 00:00:00')],
            ["id_product"=>27,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/09/2022 00:00:00')],
            //USR6_10
            ["id_product"=>16,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/09/2022 00:00:00')],
            ["id_product"=>66,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/09/2022 00:00:00')],
            //USR6_11
            ["id_product"=>26,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/10/2022 00:00:00')],
            ["id_product"=>15,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','18/10/2022 00:00:00')],
            //USR6_12
            ["id_product"=>25,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/11/2022 00:00:00')],
            ["id_product"=>14,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/11/2022 00:00:00')],
            //USR6_13
            ["id_product"=>24,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2022 00:00:00')],
            ["id_product"=>27,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2022 00:00:00')],
            //USR6_14
            ["id_product"=>11,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/11/2022 00:00:00')],
            ["id_product"=>7,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/11/2022 00:00:00')],
            //USR6_15
            ["id_product"=>2,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/12/2022 00:00:00')],
            ["id_product"=>5,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/12/2022 00:00:00')],
            //USR6_16
            ["id_product"=>17,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/12/2022 00:00:00')],
            ["id_product"=>18,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','26/12/2022 00:00:00')],
            //USR6_17
            ["id_product"=>88,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>3,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/01/2023 00:00:00')],
            ["id_product"=>8,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/01/2023 00:00:00')],
            //USR6_19
            ["id_product"=>22,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>1,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/02/2023 00:00:00')],
            ["id_product"=>64,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/02/2023 00:00:00')],
            ["id_product"=>92,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/02/2023 00:00:00')],
            ["id_product"=>23,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/02/2023 00:00:00')],
            //USR6_21
            ["id_product"=>17,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/03/2023 00:00:00')],
            ["id_product"=>52,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/03/2023 00:00:00')],
            //USR6_22
            ["id_product"=>18,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/04/2023 00:00:00')],
            ["id_product"=>9,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','08/04/2023 00:00:00')],

            //USR6_23
            ["id_product"=>29,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/04/2023 00:00:00')],
            ["id_product"=>44,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/04/2023 00:00:00')],
            //USR6_24
            ["id_product"=>9,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/05/2023 00:00:00')],
            ["id_product"=>84,'id_user'=>6,'verified'=>true,'context'=>":))))",'rating'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/05/2023 00:00:00')],
            
            ["id_product"=>5,'id_user'=>1,'context'=>"Just a good",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/04/2023 00:00:00')],
            ["id_product"=>1,'id_user'=>1,'context'=>"Change this comment",'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/04/2023 00:00:00')],
            
            ["id_product"=>1,'id_user'=>3,'verified'=>true,'context'=>"So so good",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["id_product"=>12,'id_user'=>3,'verified'=>true,'context'=>"So so good",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["id_product"=>29,'id_user'=>3,'verified'=>true,'context'=>"So so good",'rating'=>4,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            ["id_product"=>15,'id_user'=>3,'verified'=>true,'context'=>"So so good",'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/04/2023 00:00:00')],
            //GUT_1
            ["id_product"=>11,'phone'=>'01202169690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/04/2022 00:00:00')],
            ["id_product"=>23,'phone'=>'01202169690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','05/04/2022 00:00:00')],
            //GUT_2
            ["id_product"=>76,'phone'=>'01202169690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2022 00:00:00')],
            ["id_product"=>82,'phone'=>'01202169690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/05/2022 00:00:00')],
            
            //GUT_5
            ["id_product"=>38,'phone'=>'01202756690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/06/2022 00:00:00')],
            ["id_product"=>15,'phone'=>'01202756690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','06/06/2022 00:00:00')],
            //GUT_6
            ["id_product"=>16,'phone'=>'01202169690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/06/2022 00:00:00')],
            ["id_product"=>29,'phone'=>'01202169690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/06/2022 00:00:00')],

            //GUT_7
            ["id_product"=>12,'phone'=>'01202756690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/06/2022 00:00:00')],
            //GUT_9
            ["id_product"=>10,'phone'=>'01202756690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/07/2022 00:00:00')],
            //GUT_10
            ["id_product"=>30,'phone'=>'01202169690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','03/08/2022 00:00:00')],
            //GUT_11
            ["id_product"=>22,'phone'=>'012027522342','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/08/2022 00:00:00')],
            ["id_product"=>33,'phone'=>'012027522342','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','04/08/2022 00:00:00')],
            //GUT_12
            ["id_product"=>55,'phone'=>'01202159690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/08/2022 00:00:00')],
            ["id_product"=>88,'phone'=>'01202159690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/08/2022 00:00:00')],
            //GUT_14
            ["id_product"=>11,'phone'=>'01202159690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/09/2022 00:00:00')],
            ["id_product"=>13,'phone'=>'01202159690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/09/2022 00:00:00')],
            //GUT_16
            ["id_product"=>30,'phone'=>'01202159690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/09/2022 00:00:00')],
            ["id_product"=>38,'phone'=>'01202159690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/09/2022 00:00:00')],
            //GUT_18
            ["id_product"=>22,'phone'=>'01202159690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/09/2022 00:00:00')],
            ["id_product"=>45,'phone'=>'01202159690','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/09/2022 00:00:00')],
            //GUT_20
            ["id_product"=>2,'phone'=>'01202157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/11/2022 00:00:00')],
            ["id_product"=>3,'phone'=>'01202157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/11/2022 00:00:00')],
            //GUT_21
            ["id_product"=>5,'phone'=>'01702717342','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/11/2022 00:00:00')],
            //GUT_22
            ["id_product"=>18,'phone'=>'01202157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/11/2022 00:00:00')],
            ["id_product"=>11,'phone'=>'01202157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/11/2022 00:00:00')],
            //GUT_23
            ["id_product"=>44,'phone'=>'01702717342','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/11/2022 00:00:00')],
            //GUT_24
            ["id_product"=>46,'phone'=>'01202157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/11/2022 00:00:00')],
            ["id_product"=>40,'phone'=>'01202157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/11/2022 00:00:00')],
            //GUT_26
            ["id_product"=>41,'phone'=>'01223157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/12/2022 00:00:00')],
            //GUT_27
            ["id_product"=>42,'phone'=>'0172717342','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/12/2022 00:00:00')],
            ["id_product"=>4,'phone'=>'0172717342','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/12/2022 00:00:00')],
            //GUT_28
            ["id_product"=>14,'phone'=>'01813157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/12/2022 00:00:00')],
            //GUT_29
            ["id_product"=>18,'phone'=>'0172717342','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/01/2023 00:00:00')],
            //GUT_30
            ["id_product"=>15,'phone'=>'01813157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','13/01/2023 00:00:00')],
            //GUT_31
            ["id_product"=>24,'phone'=>'0132232423','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/01/2023 00:00:00')],
            //GUT_32
            ["id_product"=>77,'phone'=>'01813157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/01/2023 00:00:00')],
            ["id_product"=>74,'phone'=>'01813157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/01/2023 00:00:00')],
            ["id_product"=>79,'phone'=>'01813157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','28/01/2023 00:00:00')],
            //GUT_35
            ["id_product"=>61,'phone'=>'013223242333','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/02/2023 00:00:00')],
            ["id_product"=>81,'phone'=>'013223242333','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/02/2023 00:00:00')],
            //GUT_36
            ["id_product"=>1,'phone'=>'01813157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ["id_product"=>22,'phone'=>'01813157869','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            //GUT_37
            ["id_product"=>14,'phone'=>'0132232423','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/03/2023 00:00:00')],
            ["id_product"=>18,'phone'=>'0132232423','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/03/2023 00:00:00')],
            //GUT_38
            ["id_product"=>72,'phone'=>'0181315319','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','30/03/2023 00:00:00')],
            //GUT_40
            ["id_product"=>84,'phone'=>'01713153230','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/04/2023 00:00:00')],
            ["id_product"=>25,'phone'=>'01713153230','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','15/04/2023 00:00:00')],
            //GUT_42
            ["id_product"=>21,'phone'=>'01713153203','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/04/2023 00:00:00')],
            ["id_product"=>91,'phone'=>'01713153203','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/04/2023 00:00:00')],
            //GUT_43
            ["id_product"=>29,'phone'=>'01922382423','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/04/2023 00:00:00')],
            //GUT_44
            ["id_product"=>89,'phone'=>'01713333452','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/05/2023 00:00:00')],
            ["id_product"=>9,'phone'=>'01713333452','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','09/05/2023 00:00:00')],
            //GUT_45
            ["id_product"=>12,'phone'=>'01922382423','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/05/2023 00:00:00')],
            ["id_product"=>22,'phone'=>'01922382423','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/05/2023 00:00:00')],
            //GUT_46
            ["id_product"=>30,'phone'=>'01713153343','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','11/05/2023 00:00:00')],
            ["id_product"=>66,'phone'=>'01713153343','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','11/05/2023 00:00:00')],
            //GUT_47
            ["id_product"=>62,'phone'=>'019223212423','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/05/2023 00:00:00')],
            ["id_product"=>89,'phone'=>'019223212423','name'=>'Guest','verified'=>true,'rating'=>5,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/05/2023 00:00:00')],
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
