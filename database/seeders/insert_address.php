<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class insert_address extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $addresses = [
            ['id_user'=>4,'receiver'=>"Emma Myers","address"=>"10 Đường gì đấy","ward"=> "Xã Tân Hưng","district"=> "Huyện Bàu Bàng",'ward_id'=>440806,"province"=> "Bình Dương",'province_id'=>205,"district_id"=>3132,"phone"=>"01901919123","email"=>'cattuongw2000@gmail.com','default'=>true],
            ['id_user'=>5,'receiver'=>"Jenna Ortega","address"=>"34B Đường 1","ward"=>"Xã Trà Thanh","district"=>"Huyện Tây Trà",'ward_id'=>351406, "province"=>"Quảng Ngãi",'province_id'=>242,"district_id"=>2222,"phone"=>"01901919123","email"=>'didi01092k@gmail.com'],
            ['id_user'=>4,'receiver'=>"Allison Myers","address"=>"33 Đường","ward"=> "Xã Việt Tiến", "district"=> "Huyện Bảo Yên",'ward_id'=>80714, "province"=>"Lào Cai",'province_id'=>269,"phone"=>"01901919123","district_id"=>1891,"email"=>'cattuongw2018@gmail.com'],
            ['id_user'=>6,'receiver'=>"Melanie Martinez",'address'=>"135 Trần Hưng Đạo", "ward"=>"phường Cầu Ông Lãnh","district" =>"Quận 1",'ward_id'=>20104,"province"=> "Hồ Chí Minh",'province_id'=>202,'phone'=>"0919941037","district_id"=>1442,'email'=>"cattuongw2000@gmail.com",'default'=>true],
            ['id_user'=>5,'receiver'=>"Ortega",'address'=>"12 Le Van Sy", "ward"=>"Phường 5", "district" =>"Quận 3","province" =>"Hồ Chí Minh",'ward_id'=>20305,'phone'=>"09219221124",'province_id'=>202,'email'=>"cattuongw2018@gmail.com","district_id"=>1444,'default'=>true]
        ];
        try {
            foreach($addresses as $add){
                DB::table('address')->insert($add);
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
