<?php

namespace Database\Seeders;
use Illuminate\Support\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class insert_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users= [
            ['name'=>'Cát Tường','gender'=>2,'email'=>'cattuongw2000@gmail.com','dob'=>'2000-09-01','phone_number'=>919941037,'password'=>Hash::make(123456),'image'=>'w-1.jpg','admin'=>1,'position'=>"Deverloper",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'admin','gender'=>1,'email'=>'admin@gmail.com','phone_number'=>1234569,'password'=>Hash::make(123456),'admin'=>1,'admin'=>1,'position'=>"CEO",'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'guest','gender'=>1,'email'=>'guest@gmail.com','phone_number'=>1234568,'password'=>Hash::make(123456),'admin'=>0,'admin'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Emma Myers','gender'=>2,'email'=>'enid@gmail.com','phone_number'=>12345600,'password'=>Hash::make(123456),'admin'=>0,'image'=>'emma.jpg','position'=>'Account Manager','admin'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Jenna Ortega','gender'=>2,'email'=>'wednesday@gmail.com','phone_number'=>12345211,'password'=>Hash::make(123456),'admin'=>0,'image'=>'jenna.jpg','admin'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'Melanie Martinez','gender'=>3,'email'=>'crybaby@gmail.com','phone_number'=>1234568,'password'=>Hash::make(123456),'admin'=>0,'image'=>'mel.jpg','admin'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
        ];
        try{
            foreach($users as $user){
                DB::table('users')->insert($user);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}
