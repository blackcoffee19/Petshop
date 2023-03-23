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
            ['name'=>'Cát Tường','gender'=>2,'address'=>'','email'=>'cattuongw2000@gmail.com','dob'=>'2000-09-01','phone_number'=>919941037,'password'=>Hash::make(123456),'image'=>'w-1.jpg','admin'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'admin','gender'=>1,'address'=>'','email'=>'admin@gmail.com','phone_number'=>1234569,'password'=>Hash::make(123456),'admin'=>1,'image'=>'','admin'=>1,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['name'=>'guest','gender'=>1,'address'=>'','email'=>'guest@gmail.com','phone_number'=>1234568,'password'=>Hash::make(123456),'admin'=>0,'image'=>'','admin'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
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
