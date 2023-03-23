<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class insert_products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=[
            ['product_name'=>"Mino",'id_breed'=>1,'status'=>'abandoned dog','weight'=>2.4,'gender'=>1,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>10,'image'=>'husky1.png', 'food'=>'beef','rating'=>4,'description'=>"This dog so friendly",'sale'=>10,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Akko",'id_breed'=>1,'status'=>'abandoned dog','weight'=>3.4,'gender'=>2,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'husky2.png', 'food'=>'meat','rating'=>5,'description'=>"This dog so stupid",'sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/12/2022 00:00:00')],
            ['product_name'=>"Mimi",'id_breed'=>1,'status'=>'lost dog','weight'=>3.0,'gender'=>1,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'husky3.png', 'food'=>'pate','rating'=>4,'description'=>"Some text",'sale'=>10,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/12/2022 00:00:00')],
            ['product_name'=>"Aka",'id_breed'=>1,'status'=>'abandoned dog','weight'=>2.4,'gender'=>2,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'husky4.png', 'food'=>'dog food','rating'=>5,'description'=>'Some text of this dog','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/12/2022 00:00:00')],
            ['product_name'=>"Ichi's puppy",'id_breed'=>1,'status'=>'puppy','weight'=>0.7,'gender'=>2,'age'=>1,'sold'=>2,'quantity'=>1,'per_price'=>23,'image'=>'husky5.jpg', 'food'=>'chicken','rating'=>4,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Kiki",'id_breed'=>1,'status'=>'abandoned dog','weight'=>0.9,'gender'=>1,'age'=>3,'sold'=>0,'quantity'=>1,'per_price'=>19,'image'=>'husky6.jpg', 'food'=>'meat,pizza','rating'=>5,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/12/2022 00:00:00')],
            ['product_name'=>"Haha",'id_breed'=>1,'status'=>'lost dog','weight'=>2.4,'gender'=>2,'age'=>4,'sold'=>0,'quantity'=>1,'per_price'=>22,'image'=>'husky7.jpeg', 'food'=>'meat','rating'=>5,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Ado's puppies",'id_breed'=>1,'status'=>'puppy','weight'=>0.8,'gender'=>3,'age'=>5,'sold'=>1,'quantity'=>5,'per_price'=>20,'image'=>'husky8.jpg', 'food'=>'chicken','rating'=>3,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Koko",'id_breed'=>1,'status'=>'lost dog','weight'=>1.6,'gender'=>2,'age'=>6,'sold'=>0,'quantity'=>1,'per_price'=>17,'image'=>'husky9.jpg', 'food'=>'beef','rating'=>4,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/03/2023 00:00:00')],
            ['product_name'=>"Ame's puppies",'id_breed'=>1,'status'=>'puppy','weight'=>3.6,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>3,'per_price'=>22,'image'=>'husky10.jpg', 'food'=>'meat,rice','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/02/2023 00:00:00')],
            ['product_name'=>"Mimi",'id_breed'=>8,'status'=>'lost cat','weight'=>5.6,'gender'=>2,'age'=>8,'sold'=>0,'quantity'=>1,'per_price'=>10,'image'=>'american1.jpg','food'=>'chicken, beef','rating'=>5,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ['product_name'=>"Kitty",'id_breed'=>8,'status'=>'kitten','weight'=>2.5,'gender'=>1,'age'=>1,'sold'=>2,'quantity'=>1,'per_price'=>16,'image'=>'american2.jpg','food'=>'snack','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Nie",'id_breed'=>8,'status'=>'abandoned cat','weight'=>1.9,'gender'=>1,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>8,'image'=>'american3.jpeg','food'=>'meat','rating'=>4,'description'=>'Some more description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/02/2023 00:00:00')],
            ['product_name'=>"Koko",'id_breed'=>8,'status'=>'lost cat','weight'=>5.4,'gender'=>3,'age'=>6,'sold'=>0,'quantity'=>2,'per_price'=>13,'image'=>'american4.jpeg','food'=>'beef','rating'=>3,'description'=>'Some description','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/11/2022 00:00:00')],
            ['product_name'=>"Saw",'id_breed'=>8,'status'=>'kitten','weight'=>1.4,'gender'=>1,'age'=>1,'sold'=>3,'quantity'=>1,'per_price'=>10,'image'=>'american4.jpeg','food'=>'fish','rating'=>5,'description'=>'Some description','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/10/2022 00:00:00')],
            ['product_name'=>"Query",'id_breed'=>8,'status'=>'lost cat','weight'=>2.3,'gender'=>2,'age'=>8,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'american5.jpg','food'=>'meat,tomatoes','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/02/2023 00:00:00')],
            ['product_name'=>"Query's kittens",'id_breed'=>8,'status'=>'kitten','weight'=>1.56,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>3,'per_price'=>17,'image'=>'american6.jpeg','food'=>'meat','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/01/2023 00:00:00')],
            ['product_name'=>"Pop",'id_breed'=>3,'status'=>'puppy','weight'=>3.55,'gender'=>1,'age'=>1,'sold'=>2,'quantity'=>1,'per_price'=>19,'image'=>'becgie1.jpg','food'=>'beef','rating'=>5,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Nope",'id_breed'=>3,'status'=>'puppy','weight'=>1.4,'gender'=>2,'age'=>1,'sold'=>0,'quantity'=>1,'per_price'=>19,'image'=>'becgie2.jpg','food'=>'potate,chicken','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"KK",'id_breed'=>3,'status'=>'lost dog','weight'=>5.4,'gender'=>1,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>14,'image'=>'becgie3.jpeg','food'=>'rice,meat','rating'=>4,'description'=>'Some description','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/05/2022 00:00:00')],
            ['product_name'=>"Dou-Dip",'id_breed'=>3,'status'=>'abandoned dog','weight'=>1.4,'gender'=>3,'age'=>12,'sold'=>0,'quantity'=>2,'per_price'=>14,'image'=>'becgie4.jpg','food'=>'rice, chicken','rating'=>3,'description'=>'Some description','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/06/2022 00:00:00')],
            ['product_name'=>"Max",'id_breed'=>3,'status'=>'abandoned dog','weight'=>3.4,'gender'=>1,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>10,'image'=>'becgie5.jpg','food'=>'meat, rice','rating'=>5,'description'=>'Some description','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/09/2022 00:00:00')],
            ['product_name'=>"Lou",'id_breed'=>3,'status'=>'lost dog','weight'=>2.5,'gender'=>2,'age'=>5,'sold'=>0,'quantity'=>1,'per_price'=>17,'image'=>'becgie6.jpeg','food'=>'dog food','rating'=>4,'description'=>'Some description','sale'=>10,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/10/2022 00:00:00')],
            ['product_name'=>"Greed",'id_breed'=>11,'status'=>'n/a','weight'=>2.84,'gender'=>1,'age'=>5,'sold'=>0,'quantity'=>1,'per_price'=>18,'image'=>'betta1.jpeg','food'=>'meat,bean','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"White/Blue",'id_breed'=>11,'status'=>'n/a','weight'=>1.0,'gender'=>2,'age'=>3,'sold'=>0,'quantity'=>1,'per_price'=>17,'image'=>'betta2.jpeg','food'=>'chicken','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/03/2023 00:00:00')],
            ['product_name'=>"White/Red",'id_breed'=>11,'status'=>'n/a','weight'=>1.0,'gender'=>2,'age'=>4,'sold'=>0,'quantity'=>1,'per_price'=>19,'image'=>'betta3.jpg','food'=>'meat','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Blue",'id_breed'=>11,'status'=>'n/a','weight'=>2.0,'gender'=>1,'age'=>2,'sold'=>0,'quantity'=>1,'per_price'=>19,'image'=>'betta4.png','food'=>'cat food','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/01/2023 00:00:00')],
            ['product_name'=>"Red",'id_breed'=>11,'status'=>'n/a','weight'=>2.1,'gender'=>1,'age'=>3,'sold'=>0,'quantity'=>1,'per_price'=>18,'image'=>'betta5.jpeg','food'=>'rice','rating'=>2,'description'=>'Some text','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/06/2022 00:00:00')],
            ['product_name'=>"Lime",'id_breed'=>11,'status'=>'n/a','weight'=>1.5,'gender'=>2,'age'=>3,'sold'=>0,'quantity'=>1,'per_price'=>19,'image'=>'betta6.jpeg','food'=>'fish','rating'=>3,'description'=>'Some text','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/05/2022 00:00:00')],
            ['product_name'=>"Lili",'id_breed'=>2,'status'=>'abandoned dog','weight'=>2.1,'gender'=>2,'age'=>8,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'corgi1.jpeg','food'=>'potato, chicken','rating'=>4,'description'=>'Some text','sale'=>10,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/11/2022 00:00:00')],
            ['product_name'=>"Popy",'id_breed'=>2,'status'=>'puppy','weight'=>3.5,'gender'=>2,'age'=>8,'sold'=>3,'quantity'=>1,'per_price'=>20,'image'=>'corgi2.jpg','food'=>'meat','rating'=>4,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Xixi",'id_breed'=>2,'status'=>'puppy','weight'=>5.4,'gender'=>2,'age'=>8,'sold'=>2,'quantity'=>2,'per_price'=>20,'image'=>'corgi3.jpg','food'=>'beef','rating'=>3,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"GG",'id_breed'=>2,'status'=>'lost dog','weight'=>7.4,'gender'=>2,'age'=>8,'sold'=>0,'quantity'=>1,'per_price'=>13,'image'=>'corgi4.png','food'=>'meat','rating'=>3,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/02/2023 00:00:00')],
            ['product_name'=>"Yasou",'id_breed'=>2,'status'=>'lost dog','weight'=>3.5,'gender'=>2,'age'=>8,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'corgi5.png','food'=>'beef','rating'=>4,'description'=>'Some description','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/11/2022 00:00:00')],
            ['product_name'=>"Hou",'id_breed'=>2,'status'=>'abandoned dog','weight'=>2.8,'gender'=>2,'age'=>8,'sold'=>0,'quantity'=>1,'per_price'=>15,'image'=>'corgi6.webp','food'=>'meat','rating'=>4,'description'=>'Some description','sale'=>50,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/12/2022 00:00:00')],
            ['product_name'=>"Goldfisk",'id_breed'=>9,'status'=>'n/a','weight'=>3.5,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>13,'per_price'=>4,'image'=>'goldfish1.jpg','food'=>'chicken','rating'=>3,'description'=>'Some description','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','21/12/2022 00:00:00')],
            ['product_name'=>"Ghostfish",'id_breed'=>9,'status'=>'n/a','weight'=>2.6,'gender'=>3,'age'=>2,'sold'=>4,'quantity'=>12,'per_price'=>3,'image'=>'goldfish2.jpeg','food'=>'pizza','rating'=>4,'description'=>'Some description','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','25/11/2022 00:00:00')],
            ['product_name'=>"Gofisk",'id_breed'=>9,'status'=>'n/a','weight'=>6.6,'gender'=>3,'age'=>3,'sold'=>2,'quantity'=>10,'per_price'=>3,'image'=>'goldfish3.jpg','food'=>'hambourger','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Aufish",'id_breed'=>9,'status'=>'n/a','weight'=>2.4,'gender'=>3,'age'=>4,'sold'=>3,'quantity'=>9,'per_price'=>1,'image'=>'goldfish4.jpg','food'=>'sandwich','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/02/2023 00:00:00')],
            ['product_name'=>"Sakura",'id_breed'=>10,'status'=>'n/a','weight'=>4.4,'gender'=>3,'age'=>2,'sold'=>3,'quantity'=>2,'per_price'=>28,'image'=>'koi1.jpg','food'=>'cheese,salad','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/01/2023 00:00:00')],
            ['product_name'=>"Normie",'id_breed'=>10,'status'=>'n/a','weight'=>2.7,'gender'=>3,'age'=>1,'sold'=>7,'quantity'=>12,'per_price'=>25,'image'=>'koi2.jpg','food'=>'bread,ham','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','01/03/2023 00:00:00')],
            ['product_name'=>"Rock",'id_breed'=>10,'status'=>'n/a','weight'=>0.4,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>3,'per_price'=>26,'image'=>'koi3.jpg','food'=>'flowers','rating'=>3,'description'=>'Some description','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','24/12/2022 00:00:00')],
            ['product_name'=>"Lutus",'id_breed'=>10,'status'=>'n/a','weight'=>4.4,'gender'=>3,'age'=>4,'sold'=>3,'quantity'=>10,'per_price'=>25,'image'=>'koi4.jpg','food'=>'mushroom','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Milk Tea",'id_breed'=>10,'status'=>'n/a','weight'=>3.4,'gender'=>3,'age'=>3,'sold'=>0,'quantity'=>1,'per_price'=>4,'image'=>'koi5.png','food'=>'meat','rating'=>5,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Dragon",'id_breed'=>10,'status'=>'n/a','weight'=>7.3,'gender'=>3,'age'=>1,'sold'=>4,'quantity'=>2,'per_price'=>29,'image'=>'koi6.jpg','food'=>'bean,salad','rating'=>3,'description'=>'Some description','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/11/2022 00:00:00')],
            ['product_name'=>"Nunu",'id_breed'=>5,'status'=>'lost cat','weight'=>2.6,'gender'=>2,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'persian1.jpg','food'=>'noodle','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Sam",'id_breed'=>5,'status'=>'abandoned cat','weight'=>4.3,'gender'=>1,'age'=>8,'sold'=>2,'quantity'=>1,'per_price'=>10,'image'=>'persian2.jpeg','food'=>'eggs','rating'=>4,'description'=>'Some description','sale'=>10,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/01/2023 00:00:00')],
            ['product_name'=>"Kitties",'id_breed'=>5,'status'=>'kitten','weight'=>2.5,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>5,'per_price'=>18,'image'=>'persian3.jpg','food'=>'potatoes,corn','rating'=>3,'description'=>'Some description','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/03/2022 00:00:00')],
            ['product_name'=>"Sion",'id_breed'=>5,'status'=>'lost cat','weight'=>2.5,'gender'=>2,'age'=>6,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'persian4.jpg','food'=>'carry','rating'=>4,'description'=>'Some description','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/02/2023 00:00:00')],
            ['product_name'=>"Month",'id_breed'=>4,'status'=>'abandoned dog','weight'=>2.4,'gender'=>2,'age'=>4,'sold'=>2,'quantity'=>1,'per_price'=>15,'image'=>'rottweiler1.jpg','food'=>'bread','rating'=>3,'description'=>'Some text','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','19/12/2022 00:00:00')],
            ['product_name'=>"Puppies",'id_breed'=>4,'status'=>'puppy','weight'=>7.6,'gender'=>2,'age'=>4,'sold'=>2,'quantity'=>1,'per_price'=>17,'image'=>'rottweiler2.jpg','food'=>'noodle','rating'=>4,'description'=>'Some text2','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"LOL",'id_breed'=>4,'status'=>'lost dog','weight'=>4.3,'gender'=>2,'age'=>4,'sold'=>2,'quantity'=>1,'per_price'=>16,'image'=>'rottweiler3.jpg','food'=>'cheese','rating'=>4,'description'=>'Some description','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2022 00:00:00')],
            ['product_name'=>"Lmao",'id_breed'=>4,'status'=>'puppy','weight'=>2.4,'gender'=>2,'age'=>4,'sold'=>2,'quantity'=>1,'per_price'=>17,'image'=>'rottweiler4.jpg','food'=>'beefteak','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Puppies",'id_breed'=>4,'status'=>'puppy','weight'=>4.2,'gender'=>2,'age'=>4,'sold'=>2,'quantity'=>1,'per_price'=>16,'image'=>'rottweiler5.jpg','food'=>'pizza','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Ubuntu",'id_breed'=>4,'status'=>'lost dog','weight'=>1.4,'gender'=>2,'age'=>4,'sold'=>2,'quantity'=>1,'per_price'=>15,'image'=>'rottweiler6.jpg','food'=>'tofu,hamburger','rating'=>3,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','14/03/2023 00:00:00')],
            ['product_name'=>"Kali",'id_breed'=>16,'status'=>'n/a','weight'=>2.6,'gender'=>3,'age'=>2,'sold'=>2,'quantity'=>1,'per_price'=>5,'image'=>'scorpion1.jpg','food'=>'sandwich','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/01/2023 00:00:00')],
            ['product_name'=>"Sha",'id_breed'=>16,'status'=>'n/a','weight'=>6.2,'gender'=>3,'age'=>1,'sold'=>0,'quantity'=>5,'per_price'=>5,'image'=>'scorpion2.webp','food'=>'bread,salad','rating'=>3,'description'=>'Some description','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2022 00:00:00')],
            ['product_name'=>"Ron",'id_breed'=>16,'status'=>'n/a','weight'=>4.6,'gender'=>3,'age'=>2,'sold'=>1,'quantity'=>4,'per_price'=>5,'image'=>'scorpion3.png','food'=>'bread','rating'=>4,'description'=>'Some description','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','23/12/2022 00:00:00')],
            ['product_name'=>"June",'id_breed'=>16,'status'=>'n/a','weight'=>2.9,'gender'=>3,'age'=>1,'sold'=>0,'quantity'=>4,'per_price'=>5,'image'=>'scorpion4.jpg','food'=>'eggs','rating'=>5,'description'=>'Some description','sale'=>50,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','02/09/2022 00:00:00')],
            ['product_name'=>"White Teeths",'id_breed'=>12,'status'=>'n/a','weight'=>899.0,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>2,'per_price'=>35,'image'=>'shark1.jpg','food'=>'chicken','rating'=>3,'description'=>'Some description','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2021 00:00:00')],
            ['product_name'=>"Mako",'id_breed'=>12,'status'=>'n/a','weight'=>546.0,'gender'=>3,'age'=>2,'sold'=>1,'quantity'=>3,'per_price'=>33,'image'=>'shark2.jpeg','food'=>'beef','rating'=>3,'description'=>'Some description','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/02/2022 00:00:00')],
            ['product_name'=>"Hunter",'id_breed'=>12,'status'=>'n/a','weight'=>444.4,'gender'=>3,'age'=>3,'sold'=>2,'quantity'=>4,'per_price'=>34,'image'=>'shark3.jpeg','food'=>'eggs','rating'=>5,'description'=>'Some description','sale'=>10,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','10/03/2023 00:00:00')],
            ['product_name'=>"Tiger",'id_breed'=>12,'status'=>'n/a','weight'=>263.4,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>2,'per_price'=>33,'image'=>'shark4.jpg','food'=>'pizza','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Hammer",'id_breed'=>12,'status'=>'n/a','weight'=>277.4,'gender'=>3,'age'=>2,'sold'=>3,'quantity'=>3,'per_price'=>35,'image'=>'shark5.jpg','food'=>'rice, salad','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/02/2023 00:00:00')],
            ['product_name'=>"Stars",'id_breed'=>12,'status'=>'n/a','weight'=>242.4,'gender'=>3,'age'=>4,'sold'=>4,'quantity'=>4,'per_price'=>38,'image'=>'shark6.png','food'=>'beef','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Urgly",'id_breed'=>12,'status'=>'n/a','weight'=>23.4,'gender'=>3,'age'=>5,'sold'=>2,'quantity'=>5,'per_price'=>30,'image'=>'shark7.jpg','food'=>'chicken','rating'=>3,'description'=>'Some description','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','11/10/2020 00:00:00')],
            ['product_name'=>"Megalodon",'id_breed'=>12,'status'=>'n/a','weight'=>199002999.4,'gender'=>3,'age'=>100,'sold'=>0,'quantity'=>1,'per_price'=>999,'image'=>'shark7.png','food'=>'beef','rating'=>3,'description'=>'Some description','sale'=>2,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/12/2012 00:00:00')],
            ['product_name'=>"Batman",'id_breed'=>6,'status'=>'lost cat','weight'=>3.4,'gender'=>2,'age'=>12,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'siamese1.jpg','food'=>'chicken','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Mouse",'id_breed'=>6,'status'=>'abandoned cat','weight'=>6.4,'gender'=>1,'age'=>10,'sold'=>0,'quantity'=>1,'per_price'=>12,'image'=>'siamese2.jpg','food'=>'chicken, beef','rating'=>4,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/12/2022 00:00:00')],
            ['product_name'=>"Siamese Kitties",'id_breed'=>6,'status'=>'kitten','weight'=>1.4,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>5,'per_price'=>14,'image'=>'siamese3.jpg','food'=>'pizza','rating'=>3,'description'=>'Some text','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2022 00:00:00')],
            ['product_name'=>"Leaf",'id_breed'=>15,'status'=>'n/a','weight'=>4.4,'gender'=>3,'age'=>2,'sold'=>1,'quantity'=>3,'per_price'=>7,'image'=>'snake1.jpg','food'=>'rice','rating'=>3,'description'=>'Some text','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2021 00:00:00')],
            ['product_name'=>"Black",'id_breed'=>15,'status'=>'n/a','weight'=>8.4,'gender'=>3,'age'=>1,'sold'=>1,'quantity'=>4,'per_price'=>6,'image'=>'snake2.jpg','food'=>'meat','rating'=>5,'description'=>'Some text','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/09/2022 00:00:00')],
            ['product_name'=>"Ocean",'id_breed'=>15,'status'=>'n/a','weight'=>7.4,'gender'=>3,'age'=>2,'sold'=>1,'quantity'=>5,'per_price'=>12,'image'=>'snake3.jpg','food'=>'eggs','rating'=>4,'description'=>'Some text','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/03/2022 00:00:00')],
            ['product_name'=>"Cobra",'id_breed'=>15,'status'=>'n/a','weight'=>6.4,'gender'=>3,'age'=>1,'sold'=>0,'quantity'=>3,'per_price'=>8,'image'=>'snake4.jpg','food'=>'meat','rating'=>3,'description'=>'Some text','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/12/2021 00:00:00')],
            ['product_name'=>"Fire",'id_breed'=>15,'status'=>'n/a','weight'=>4.4,'gender'=>3,'age'=>2,'sold'=>0,'quantity'=>2,'per_price'=>11,'image'=>'snake5.jpg','food'=>'corn','rating'=>4,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','11/03/2023 00:00:00')],
            ['product_name'=>"Python",'id_breed'=>15,'status'=>'n/a','weight'=>10.4,'gender'=>3,'age'=>3,'sold'=>4,'quantity'=>3,'per_price'=>10,'image'=>'snake6.jpg','food'=>'bread','rating'=>4,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Bungarus",'id_breed'=>15,'status'=>'n/a','weight'=>24.4,'gender'=>3,'age'=>1,'sold'=>0,'quantity'=>4,'per_price'=>10,'image'=>'snake7.jpg','food'=>'hambuger','rating'=>3,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Ringed krait",'id_breed'=>15,'status'=>'n/a','weight'=>0.4,'gender'=>3,'age'=>1,'sold'=>0,'quantity'=>4,'per_price'=>10,'image'=>'snake8.jpg','food'=>'sandwich','rating'=>3,'description'=>'Some text','sale'=>10,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/12/2022 00:00:00')],
            ['product_name'=>"Pander",'id_breed'=>7,'status'=>'lost cat','weight'=>3.4,'gender'=>2,'age'=>4,'sold'=>1,'quantity'=>2,'per_price'=>22,'image'=>'sokoke1.jpg','food'=>'salad, biscuit','rating'=>4,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"WTF",'id_breed'=>7,'status'=>'kitten','weight'=>1.4,'gender'=>1,'age'=>3,'sold'=>1,'quantity'=>1,'per_price'=>22,'image'=>'sokoke2.jpg','food'=>'cookie','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"ASP",'id_breed'=>7,'status'=>'kitten','weight'=>1.7,'gender'=>3,'age'=>1,'sold'=>2,'quantity'=>1,'per_price'=>24,'image'=>'sokoke3.jpg','food'=>'soup,eggs','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Jsop",'id_breed'=>7,'status'=>'kitten','weight'=>0.9,'gender'=>3,'age'=>1,'sold'=>0,'quantity'=>4,'per_price'=>24,'image'=>'sokoke4.jpg','food'=>'meat','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Doge",'id_breed'=>7,'status'=>'kitten','weight'=>0.9,'gender'=>1,'age'=>1,'sold'=>0,'quantity'=>1,'per_price'=>24,'image'=>'sokoke5.jpg','food'=>'chicken','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Moon",'id_breed'=>7,'status'=>'lost cat','weight'=>3.4,'gender'=>2,'age'=>5,'sold'=>0,'quantity'=>1,'per_price'=>20,'image'=>'sokoke6.jpg','food'=>'beef,chicken','rating'=>3,'description'=>'Some description','sale'=>10,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/12/2022 00:00:00')],
            ['product_name'=>"Fur",'id_breed'=>14,'status'=>'n/a','weight'=>3.4,'gender'=>3,'age'=>2,'sold'=>1,'quantity'=>4,'per_price'=>17,'image'=>'tarantula1.jpg','food'=>'flies,pubs','rating'=>3,'description'=>'Some description','sale'=>10,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','29/10/2022 00:00:00')],
            ['product_name'=>"Spiderman",'id_breed'=>14,'status'=>'n/a','weight'=>6.4,'gender'=>3,'age'=>3,'sold'=>2,'quantity'=>5,'per_price'=>17,'image'=>'tarantula2.png','food'=>'flies,pubs','rating'=>4,'description'=>'Some description','sale'=>20,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/12/2022 00:00:00')],
            ['product_name'=>"Beaty",'id_breed'=>14,'status'=>'n/a','weight'=>3.4,'gender'=>3,'age'=>4,'sold'=>0,'quantity'=>4,'per_price'=>18,'image'=>'tarantula3.jpeg','food'=>'flies,pubs','rating'=>5,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','22/02/2023 00:00:00')],
            ['product_name'=>"Monser",'id_breed'=>14,'status'=>'n/a','weight'=>1.4,'gender'=>3,'age'=>2,'sold'=>0,'quantity'=>6,'per_price'=>17,'image'=>'tarantula4.jpg','food'=>'flies,pubs','rating'=>4,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')],
            ['product_name'=>"Vampire",'id_breed'=>14,'status'=>'n/a','weight'=>3.4,'gender'=>3,'age'=>4,'sold'=>1,'quantity'=>2,'per_price'=>18,'image'=>'tarantula5.jpg','food'=>'flies,pugs','rating'=>3,'description'=>'Some description','sale'=>0,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','12/03/2023 00:00:00')],
            ['product_name'=>"Cat",'id_breed'=>14,'status'=>'n/a','weight'=>1.4,'gender'=>3,'age'=>5,'sold'=>1,'quantity'=>3,'per_price'=>17,'image'=>'tarantula6.jpg','food'=>'flies,pugs','rating'=>4,'description'=>'Some description','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/12/2022 00:00:00')],
            ['product_name'=>"Kimono",'id_breed'=>13,'status'=>'n/a','weight'=>0.4,'gender'=>3,'age'=>6,'sold'=>5,'quantity'=>3,'per_price'=>27,'image'=>'komodo1.jpeg','food'=>'meat, chicken','rating'=>3,'description'=>'Some description','sale'=>30,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2021 00:00:00')],
            ['product_name'=>"KoKo",'id_breed'=>13,'status'=>'n/a','weight'=>3.4,'gender'=>3,'age'=>4,'sold'=>1,'quantity'=>2,'per_price'=>28,'image'=>'komodo2.jpg','food'=>'beef','rating'=>4,'description'=>'Some text','sale'=>40,'created_at'=>Carbon::createFromFormat('d/m/Y H:i:s','20/11/2020 00:00:00')],
            ['product_name'=>"Mio",'id_breed'=>13,'status'=>'n/a','weight'=>13.4,'gender'=>3,'age'=>6,'sold'=>1,'quantity'=>2,'per_price'=>27,'image'=>'komodo3.jpg','food'=>'rice, eggs','rating'=>5,'description'=>'Some text','sale'=>0,'created_at'=>Carbon::now()->format('Y-m-d H:i:s')]
        ];
        try{
            foreach($products as $product){
                DB::table('products')->insert($product);
            }
        }catch(\Throwable $tb){
            echo $tb;
        }
    }
}