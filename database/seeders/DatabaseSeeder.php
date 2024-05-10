<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        //use another seeder
        $this->call([
            ProductSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            GallerySeeder::class,
            ReivewSeeder::class,
            VoucherTypeSeeder::class,
            VoucherSeeder::class,
        ]);
    }
}
