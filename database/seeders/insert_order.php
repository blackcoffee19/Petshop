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
            ['order_code'=>'USR1_0','id_user'=>1,'cus_name'=>'Cat Tuong','cus_address'=>'94 Nguyen The Truyen, Phường Tân Sơn Nhì, Quận Tân Phú, TP Hồ Chí Mình','shipping_fee'=>1,'cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','code_coupon'=>'NEW92MEETU','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/02/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '21/02/2021 00:00:00')],
            ['order_code'=>'USR1_1','id_user'=>1,'cus_name'=>'Cat Tuong','cus_address'=>'135 Trần Hưng Đạo, Phường Cầu Ông Lãnh, Quận 1, TP Hồ Chí Mình','shipping_fee'=>1,'cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '19/12/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '21/12/2021 00:00:00')],
            ['order_code'=>'USR3_0','id_user'=>3,'cus_name'=>'Taylor','cus_address'=>'10 Đường gì đấy, Xã Lai Uyên, Huyện Bàu Bàng, Bình Dương','shipping_fee'=>2,'cus_phone'=>'0919941039','cus_email'=>'cattuongw2018@gmail.com','method'=>'cod','code_coupon'=>'WED13','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '22/12/2021 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '25/12/2021 00:00:00')],
            ['order_code'=>'USR3_1','id_user'=>3,'cus_name'=>'Taylor','cus_address'=>'31 Đường gì đấy, Xã Minh Tân, Huyện Phú Xuyên, Thành Phố Hà Nội','shipping_fee'=>3.4,'cus_phone'=>'0919941039','cus_email'=>'cattuongw2018@gmail.com','method'=>'cod','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/02/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '25/02/2022 00:00:00')],
            ['order_code'=>'USR1_2','id_user'=>1,'cus_name'=>'Cát Tường','cus_address'=>'F18 Đường số 1, Xã Thái Bình, Huyện Châu Thành, Tây Ninh','shipping_fee'=>2,'cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '22/05/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '25/05/2022 00:00:00')],
            ['order_code'=>'USR3_2','id_user'=>3,'cus_name'=>'JJ','cus_address'=>'21 Đường, Xã Thạnh Trị, Huyện Thạnh Trị, Tỉnh Sóc Trăng','shipping_fee'=>3.2,'cus_phone'=>'09166613131','cus_email'=>'iris01092k@gmail.com','method'=>'cod','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/09/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '15/09/2022 00:00:00')],
            ['order_code'=>'USR1_3','id_user'=>1,'cus_name'=>'Tuong','cus_address'=>'34B Đường, Xã Trà Thanh, Huyện Tây Trà, Tỉnh Quảng Ngãi','shipping_fee'=>3,'cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','code_coupon'=>'VAL24','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/02/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/02/2023 00:00:00')],
            ['order_code'=>'USR1_4','id_user'=>1,'cus_name'=>'Boom','cus_address'=>'21, Xã Bình Hòa Bắc, Huyện Đức Huệ, Tỉnh Long An','shipping_fee'=>2,'cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'credit','code_coupon'=>'SPR2023','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '01/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '05/03/2023 00:00:00')],
            ['order_code'=>'USR3_3','id_user'=>3,'cus_name'=>'Minh','cus_address'=>'33 Đường, Xã Việt Tiến, Huyện Bảo Yên, Tỉnh Lào Cai','shipping_fee'=>3.2,'cus_phone'=>'09166613131','cus_email'=>'iris01092k@gmail.com','method'=>'cod','code_coupon'=>'SPR2023','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '05/03/2023 00:00:00')],
            ['order_code'=>'USR3_4','id_user'=>3,'cus_name'=>'Huệ','cus_address'=>'Trên núi, Xã Mô Rai, Huyện Sa Thầy, Tỉnh Kon Tum','shipping_fee'=>0,'cus_phone'=>'09166232323','cus_email'=>'iris5202402@gmail.com','method'=>'credit','code_coupon'=>'FREESHIP','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '07/03/2023 00:00:00')],
            ['order_code'=>'USR5_0','id_user'=>5,'cus_name'=>'Wednesday','cus_address'=>'Hell, Phường Tân Sơn Nhì, Quận Tân Phú, TP Hồ Chí Mình','shipping_fee'=>1,'cus_phone'=>'09166666666','cus_email'=>'wednesday@gmail.com','method'=>'cod','code_coupon'=>"NEW92MEETU",'status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '23/11/2022 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '26/11/2022 00:00:00')],
            ['order_code'=>'GUT_0','cus_name'=>'MAi','cus_address'=>'Trong Hang, Xã Mô Rai, Huyện Sa Thầy, Tỉnh Kon Tum','shipping_fee'=>3.2,'cus_phone'=>'09166232323','cus_email'=>'didi01092k@gmail.com','method'=>'cod','code_coupon'=>'PET2023','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '02/04/2023 00:00:00')],
            ['order_code'=>'GUT_1','cus_name'=>'Chi','cus_address'=>'33 Đường, Xã Việt Tiến, Huyện Bảo Yên, Tỉnh Lào Cai','shipping_fee'=>3.5,'cus_phone'=>'09166232323','cus_email'=>'didi01092k@gmail.com','method'=>'cod','code_coupon'=>'PET2023','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '30/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s', '03/04/2023 00:00:00')],
            ['order_code'=>'USR6_0','id_user'=>6,'cus_name'=>'Mel','cus_address'=>'13 Hell, Xã Minh Tân, Huyện Phú Xuyên, Thành Phố Hà Nội','shipping_fee'=>3.5,'cus_phone'=>'091231312','cus_email'=>'melanie@gmail.com','method'=>'cod','code_coupon'=>'NEW92MEETU','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '31/03/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '03/04/2023 00:00:00')],
            
            ['order_code'=>'USR4_0','id_user'=>4,'cus_name'=>'Emme','cus_address'=>'Love Wednesday, Phường Tân Sơn Nhì, Quận Tân Phú, TP Hồ Chí Mình','shipping_fee'=>1,'cus_phone'=>'091231312','cus_email'=>'enid@gmail.com','method'=>'cod','code_coupon'=>'NEW92MEETU','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '02/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '06/04/2023 00:00:00')],
            ['order_code'=>'USR5_1','id_user'=>5,'cus_name'=>'Jenna','cus_address'=>'Love Enid, Phường Tân Sơn Nhì, Quận Tân Phú, TP Hồ Chí Mình','shipping_fee'=>1,'cus_phone'=>'0912312323','cus_email'=>'wednesday@gmail.com','method'=>'cod','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '02/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '04/04/2023 00:00:00')],
            ['order_code'=>'USR6_1','id_user'=>6,'cus_name'=>'Cry Baby','cus_address'=>'PORTALS, Xã Thái Bình, Huyện Châu Thành, TP Tây Ninh','shipping_fee'=>0,'cus_phone'=>'01287312323','cus_email'=>'crybaby@gmail.com','method'=>'credit','code_coupon'=>'FREESHIP','status'=>'finished','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '09/04/2023 01:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '12/04/2023 00:00:00')],
            
            ['order_code'=>'USR1_5','id_user'=>1,'cus_name'=>'Tuong','cus_address'=>'21, Xã Bình Hòa Bắc, Huyện Đức Huệ, Tỉnh Long An','shipping_fee'=>2,'cus_phone'=>'0919941037','cus_email'=>'cattuongw2000@gmail.com','method'=>'cod','code_coupon'=>'SPR2023','status'=>'delivery','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
            ['order_code'=>'USR3_5','id_user'=>3,'cus_name'=>'Thu','cus_address'=>'Trên núi, Xã Mô Rai, Huyện Sa Thầy, Tỉnh Kon Tum','shipping_fee'=>3,'cus_phone'=>'09166232323','cus_email'=>'iris5202402@gmail.com','method'=>'cod','status'=>'delivery','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
           
            ['order_code'=>'GUT_2','cus_name'=>'Chi','cus_address'=>'Trên núi, Xã Mô Rai, Huyện Sa Thầy, Tỉnh Kon Tum','shipping_fee'=>3,'cus_phone'=>'0123878899','cus_email'=>'boom@gmail.com','method'=>'cod','status'=>'transaction failed','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '08/04/2023 00:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
            
            
            ['order_code'=>'USR4_1','id_user'=>4,'cus_name'=>'Emma','cus_address'=>'21, Xã Bình Hòa Bắc, Huyện Đức Huệ, Tỉnh Long An','shipping_fee'=>2,'cus_phone'=>'0919940929','cus_email'=>'emma@gmail.com','method'=>'cod','code_coupon'=>'SPR2023','status'=>'unconfimred','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 00:00:00')],
            ['order_code'=>'USR6_2','id_user'=>6,'cus_name'=>'Cry Baby','cus_address'=>'PORTALS, Xã Thái Bình, Huyện Châu Thành, TP Tây Ninh','shipping_fee'=>0,'cus_phone'=>'01238712323','cus_email'=>'crybaby@gmail.com','method'=>'credit','code_coupon'=>'FREESHIP','status'=>'unconfimred','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 09:00:00')],
            ['order_code'=>'USR5_2','id_user'=>5,'cus_name'=>'Jenna','cus_address'=>'PORTALS, Xã Thái Bình, Huyện Châu Thành, TP Tây Ninh','shipping_fee'=>2,'cus_phone'=>'01238712323','cus_email'=>'wednesday@gmail.com','method'=>'credit','status'=>'unconfimred','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '10/04/2023 04:00:00')],
            ['order_code'=>'GUT_3','cus_name'=>'OwO','cus_address'=>'PORTALS, Xã Thái Bình, Huyện Châu Thành, TP Tây Ninh','shipping_fee'=>0,'cus_phone'=>'01238712323','cus_email'=>'silence@gmail.com','method'=>'cod','code_coupon'=>'FREESHIP','status'=>'cancel','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '09/04/2023 04:00:00'),'updated_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '09/04/2023 06:00:00')],
            ['order_code'=>'GUT_4','cus_name'=>'Saria','cus_address'=>'Rhode Island, Xã Thái Bình, Huyện Châu Thành, TP Tây Ninh','shipping_fee'=>0,'cus_phone'=>'012387127683','cus_email'=>'saria@gmail.com','method'=>'credit','code_coupon'=>'FREESHIP','status'=>'unconfimred','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '11/04/2023 09:33:00')],
            ['order_code'=>'GUT_5','cus_name'=>'Lappland','cus_address'=>'Rhode Island, Xã Thái Bình, Huyện Châu Thành, TP Tây Ninh','shipping_fee'=>0,'cus_phone'=>'01238732398','cus_email'=>'iris01092k@gmail.com','method'=>'credit','code_coupon'=>'FREESHIP','status'=>'unconfimred','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','11/04/2023 09:33:00')],
            ['order_code'=>'GUT_6','cus_name'=>'Surtr','cus_address'=>'Rhode Island, Xã Thái Bình, Huyện Châu Thành, TP Tây Ninh','shipping_fee'=>0,'cus_phone'=>'01238232823','cus_email'=>'cattuong2018@gmail.com','method'=>'cod','code_coupon'=>'FREESHIP','status'=>'unconfimred','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '11/04/2023 09:33:00')],
            ['order_code'=>'GUT_7','cus_name'=>'Silence','cus_address'=>'Rhode Island, Xã Thái Bình, Huyện Châu Thành, TP Tây Ninh','shipping_fee'=>0,'cus_phone'=>'01238232823','cus_email'=>'cattuong2018@gmail.com','method'=>'cod','code_coupon'=>'FREESHIP','status'=>'unconfimred','created_at'=>Carbon::createFromFormat('d/m/Y H:i:s',  '11/04/2023 09:33:00')],
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
