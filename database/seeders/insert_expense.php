<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class insert_expense extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $expenses = [
            ['id_product'=>1,"costs"=>5,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>2,"costs"=>30,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '30/04/2022 00:00:00')],
            ['id_product'=>1,"costs"=>8,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '10/03/2023 00:00:00')],
            ['id_product'=>4,"costs"=>8,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '10/05/2023 00:00:00')],
            
            ['id_product'=>2,"costs"=>10,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/02/2022 00:00:00')],
            ['id_product'=>3,"costs"=>8,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/03/2022 00:00:00')],
            ['id_product'=>2,"costs"=>6,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/12/2022 00:00:00')],
            ['id_product'=>5,"costs"=>6,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/02/2023 00:00:00')],
            
            ['id_product'=>3,"costs"=>12,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/02/2022 00:00:00')],
            ['id_product'=>6,"costs"=>12,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/01/2023 00:00:00')],
            ['id_product'=>3,"costs"=>10,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/02/2023 00:00:00')],
            ['id_product'=>7,"costs"=>10,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/04/2023 00:00:00')],
            
            ['id_product'=>4,"costs"=>13,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>8,"costs"=>13,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '20/04/2022 00:00:00')],
            ['id_product'=>9,"costs"=>12,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>5,"costs"=>8,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>32,"costs"=>5,'quantity'=>6,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/07/2022 00:00:00')],
            ['id_product'=>35,"costs"=>8,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>55,"costs"=>10,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>25,"costs"=>8,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            
            ['id_product'=>64,"costs"=>5,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>66,"costs"=>10,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/11/2022 00:00:00')],
            ['id_product'=>86,"costs"=>11,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/01/2023 00:00:00')],
            
            ['id_product'=>75,"costs"=>11,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>37,"costs"=>12,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/06/2022 00:00:00')],
            ['id_product'=>76,"costs"=>10,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>83,"costs"=>3,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>85,"costs"=>3,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2022 00:00:00')],
            ['id_product'=>28,"costs"=>5,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>59,"costs"=>2,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>90,"costs"=>22,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>49,"costs"=>31,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>10,"costs"=>13,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>15,"costs"=>12,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2022 00:00:00')],
            ['id_product'=>16,"costs"=>10,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>13,"costs"=>11,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>13,"costs"=>14,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>18,"costs"=>12,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/05/2022 00:00:00')],
            ['id_product'=>17,"costs"=>13,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>16,"costs"=>15,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/03/2023 00:00:00')],

            ['id_product'=>42,"costs"=>8,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>62,"costs"=>8,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>82,"costs"=>5,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            ['id_product'=>92,"costs"=>10,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            
            ['id_product'=>33,"costs"=>15,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '10/07/2022 00:00:00')],
            ['id_product'=>43,"costs"=>16,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/01/2023 00:00:00')],
            ['id_product'=>73,"costs"=>18,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>44,"costs"=>18,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>64,"costs"=>13,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/07/2022 00:00:00')],
            ['id_product'=>84,"costs"=>20,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/01/2023 00:00:00')],
            ['id_product'=>14,"costs"=>15,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>45,"costs"=>25,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/01/2022 00:00:00')],
            ['id_product'=>35,"costs"=>25,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/03/2022 00:00:00')],
            ['id_product'=>85,"costs"=>3,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>86,"costs"=>2,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/06/2022 00:00:00')],
            ['id_product'=>56,"costs"=>10,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>67,"costs"=>12,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            
            ['id_product'=>18,"costs"=>34,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/04/2022 00:00:00')],
            ['id_product'=>87,"costs"=>7,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/10/2022 00:00:00')],
            ['id_product'=>37,"costs"=>30,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/03/2023 00:00:00')],
            
            ['id_product'=>88,"costs"=>12,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/02/2022 00:00:00')],
            ['id_product'=>68,"costs"=>12,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>48,"costs"=>10,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            
            ['id_product'=>35,"costs"=>25,'quantity'=>6,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/08/2022 00:00:00')],
            ['id_product'=>45,"costs"=>25,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/10/2022 00:00:00')],
            ['id_product'=>85,"costs"=>25,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>35,"costs"=>30,'quantity'=>6,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>65,"costs"=>30,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
        
            ['id_product'=>23,"costs"=>12,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2022 00:00:00')],
            ['id_product'=>25,"costs"=>12,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/11/2022 00:00:00')],
            ['id_product'=>22,"costs"=>110,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>21,"costs"=>15,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>22,"costs"=>20,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/03/2022 00:00:00')],
            ['id_product'=>24,"costs"=>20,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/12/2022 00:00:00')],
            ['id_product'=>27,"costs"=>20,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>29,"costs"=>29,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/03/2022 00:00:00')],
            ['id_product'=>32,"costs"=>20,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>62,"costs"=>23,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>73,"costs"=>15,'quantity'=>7,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/04/2022 00:00:00')],
            ['id_product'=>53,"costs"=>20,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2022 00:00:00')],
            ['id_product'=>83,"costs"=>15,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            
            ['id_product'=>34,"costs"=>22,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/06/2022 00:00:00')],
            ['id_product'=>44,"costs"=>20,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '15/10/2022 00:00:00')],
            ['id_product'=>24,"costs"=>22,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '02/01/2021 00:00:00')],
            ['id_product'=>44,"costs"=>52,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '04/01/2021 00:00:00')],
            ['id_product'=>86,"costs"=>22,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '10/01/2021 00:00:00')],
            ['id_product'=>82,"costs"=>52,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '11/01/2021 00:00:00')],
            ['id_product'=>12,"costs"=>42,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/01/2021 00:00:00')],
            ['id_product'=>34,"costs"=>37,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '11/02/2023 00:00:00')],
            ['id_product'=>14,"costs"=>25,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '13/02/2023 00:00:00')],
            ['id_product'=>46,"costs"=>26,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '14/02/2023 00:00:00')],
            ['id_product'=>46,"costs"=>66,'quantity'=>6,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '14/04/2023 00:00:00')],
            ['id_product'=>45,"costs"=>22,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            
            ['id_product'=>28,"costs"=>18,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/05/2022 00:00:00')],
            ['id_product'=>45,"costs"=>24,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/07/2022 00:00:00')],
            ['id_product'=>85,"costs"=>120,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>86,"costs"=>27,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/03/2022 00:00:00')],
            ['id_product'=>36,"costs"=>25,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/07/2022 00:00:00')],
            ['id_product'=>16,"costs"=>25,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
            
            ['id_product'=>47,"costs"=>52,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '15/02/2022 00:00:00')],
            ['id_product'=>77,"costs"=>63,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/08/2022 00:00:00')],
            ['id_product'=>87,"costs"=>14,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            
            ['id_product'=>38,"costs"=>20,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/02/2022 00:00:00')],
            ['id_product'=>68,"costs"=>70,'quantity'=>5,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '01/12/2022 00:00:00')],
            ['id_product'=>78,"costs"=>50,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/03/2023 00:00:00')],
            
            ['id_product'=>35,"costs"=>23,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/06/2022 00:00:00')],
            ['id_product'=>65,"costs"=>72,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/11/2022 00:00:00')],
            ['id_product'=>85,"costs"=>22,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/04/2023 00:00:00')],
        
            ['id_product'=>36,"costs"=>70,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '25/04/2022 00:00:00')],
            ['id_product'=>34,"costs"=>50,'quantity'=>4,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/10/2022 00:00:00')],
            ['id_product'=>31,"costs"=>20,'quantity'=>2,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/02/2023 00:00:00')],
            ['id_product'=>3,"costs"=>70,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '12/05/2023 00:00:00')],
            ['id_product'=>3,"costs"=>30,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '22/05/2023 00:00:00')],
            ['id_product'=>3,"costs"=>60,'quantity'=>1,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '24/05/2023 00:00:00')],
            ['id_product'=>3,"costs"=>30,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '11/06/2023 00:00:00')],
            ['id_product'=>3,"costs"=>20,'quantity'=>3,'created_at' => Carbon::createFromFormat('d/m/Y H:i:s', '17/06/2023 00:00:00')],
            
        ];
        try {
            foreach($expenses as $ex){
                DB::table('expense')->insert($ex);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
