<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class insert_order extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orders=[
            ['order_code'=>'user_0919941037_0','id_user'=>1,'cus_name'=>'Cat Tuong','cus_address'=>'94 Nguyen The Truyen, Phường Tân Sơn Nhì, Quận Tân Phú, TP Hồ Chí Mình','cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','status'=>'Paid','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00')],
            ['order_code'=>'user_0919941037_1','id_user'=>1,'cus_name'=>'Cat Tuong','cus_address'=>'135 Trần Hưng Đạo, Phường Cầu Ông Lãnh, Quận 1, TP Hồ Chí Mình','cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','status'=>'Paid','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00')],
            ['order_code'=>'user_1234568_0','id_user'=>3,'cus_name'=>'Taylor','cus_address'=>'10 Đường gì đấy, Xã Lai Uyên, Huyện Bàu Bàng, Bình Dương','cus_phone'=>'0919941039','cus_email'=>'cattuongw2018@gmail.com','method'=>'cod','status'=>'Paid','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/12/2021 00:00:00')],
            ['order_code'=>'user_1234568_1','id_user'=>3,'cus_name'=>'Taylor','cus_address'=>'31 Đường gì đấy, Xã Minh Tân, Huyện Phú Xuyên, Thành Phố Hà Nội','cus_phone'=>'0919941039','cus_email'=>'cattuongw2018@gmail.com','method'=>'cod','status'=>'Paid','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/02/2022 00:00:00')],
            ['order_code'=>'user_0919941037_2','id_user'=>1,'cus_name'=>'Cát Tường','cus_address'=>'F18 Đường số 1, Xã Thái Bình, Huyện Châu Thành, Tây Ninh','cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','status'=>'Paid','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/05/2022 00:00:00')],
            ['order_code'=>'user_1234568_2','id_user'=>3,'cus_name'=>'JJ','cus_address'=>'21 Đường, Xã Thạnh Trị, Huyện Thạnh Trị, Tỉnh Sóc Trăng','cus_phone'=>'09166613131','cus_email'=>'iris01092k@gmail.com','method'=>'cod','status'=>'Paid','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/09/2022 00:00:00')],
            ['order_code'=>'user_0919941037_3','id_user'=>1,'cus_name'=>'Tuong','cus_address'=>'34B Đường, Xã Trà Thanh, Huyện Tây Trà, Tỉnh Quảng Ngãi','cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','status'=>'Not yet','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2023 00:00:00')],
            ['order_code'=>'user_0919941037_4','id_user'=>1,'cus_name'=>'Boom','cus_address'=>'21, Xã Bình Hòa Bắc, Huyện Đức Huệ, Tỉnh Long An','cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'credit','status'=>'Not yet','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00')],
            ['order_code'=>'user_1234568_3','id_user'=>3,'cus_name'=>'Minh','cus_address'=>'33 Đường, Xã Việt Tiến, Huyện Bảo Yên, Tỉnh Lào Cai','cus_phone'=>'09166613131','cus_email'=>'iris01092k@gmail.com','method'=>'cod','status'=>'Not yet','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00')],
            ['order_code'=>'user_1234568_4','id_user'=>3,'cus_name'=>'Huệ','cus_address'=>'Trên núi, Xã Mô Rai, Huyện Sa Thầy, Tỉnh Kon Tum','cus_phone'=>'09166232323','cus_email'=>'iris5202402@gmail.com','method'=>'credit','status'=>'Paid','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00')],
        ];
        try{
            foreach($orders as $order){
                DB::table('orders')->insert($order);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
