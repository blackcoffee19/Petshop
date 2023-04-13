<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(
            [insert_user::class,
            insert_type_products::class,
            insert_breed::class,
            insert_products::class,
            insert_coupon::class,
            insert_favourites::class,
            insert_comments::class,
            insert_likecomment::class,
            insert_order::class,
            insert_message::class,
            insert_groupmessage::class,
            insert_banner::class,
            insert_slide::class,
            insert_cart::class,
            insert_news::class
        ]);
    }
}
