<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('products')->insert([
            'name' => 'Laptop MSI',
            'price' => 10000000,
            'description' => 'Laptop MSI description',
            'slug' => 'lap-top',
            'image' => 'laptop1.png',
            'user_id' => 'user_1',
            'category_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'name' => 'Laptop Asus',
            'price' => 20000000,
            'description' => 'Laptop Asus description',
            'slug' => 'lap-top',
            'image' => 'laptop2.png',
            'user_id' => 'user_1',
            'category_id' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'name' => 'iPhone 14 Pro Max',
            'price' => 30000000,
            'description' => 'iPhone 14 Pro Max description',
            'slug' => 'dien-thoai',
            'image' => 'dt1.png',
            'user_id' => 'user_1',
            'category_id' => '4',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('products')->insert([
            'name' => 'Tai Nghe MSI',
            'price' => 10000000,
            'description' => 'Tai Nghe MSI description',
            'slug' => 'tai-nghe',
            'image' => 'tainghe1.png',
            'user_id' => 'user_1',
            'category_id' => '3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        //insert table Category
        DB::table('categories')->insert([
            'name' => 'Laptop',
            'image' => 'laptop1.png',
            'slug' => 'lap-top',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'Camera',
            'image' => 'camera1.png',
            'slug' => 'camera',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'Headphone',
            'image' => 'tainghe1.png',
            'slug' => 'tai-nghe',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('categories')->insert([
            'name' => 'Phone',
            'image' => 'dt1.png',
            'slug' => 'dien-thoai',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
