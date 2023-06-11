<?php

namespace Database\Seeders;

use DateTimeZone;
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
            ['name'=>'Cát Tường','email'=>'cattuongw2000@gmail.com','phone'=>"0919941037",'password'=>Hash::make(123456),'image'=>'w-1.jpg','admin'=>1,'created_at'=>Carbon::createFromDate(2023,1,1)],
            ['name'=>'admin','email'=>'admin@gmail.com','phone'=>"0123456789",'password'=>Hash::make(123456),'admin'=>1,'created_at'=>Carbon::createFromDate(2023,1,1)],
            ['name'=>'Tingyun','email'=>'guest@gmail.com','phone'=>"0123456788",'password'=>Hash::make(123456),'image'=>"tingyn.webp",'admin'=>2,'created_at'=>Carbon::createFromDate(2023,1,1)],
            ['name'=>'Emma Myers','email'=>'enid@gmail.com','phone'=>"0123456787",'password'=>Hash::make(123456),'image'=>'emma.jpg','created_at'=>Carbon::createFromDate(2023,1,1)],
            ['name'=>'Jenna Ortega','email'=>'wednesday@gmail.com','phone'=>"0123456786",'password'=>Hash::make(123456),'image'=>'jenna.jpg','created_at'=>Carbon::createFromDate(2023,1,1)],
            ['name'=>'Melanie Martinez','email'=>'crybaby@gmail.com','phone'=>"0123456785",'password'=>Hash::make(123456),'image'=>'mel.jpg','created_at'=>Carbon::createFromDate(2023,1,1)],
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
