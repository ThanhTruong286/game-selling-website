<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create data that will be insert to product table
        $data = [
            ['name' => 'The Walking Dead SS1','price' => 20,'description' => 'TWD GOTY Edition','categories_id' => 1,'image' => 'twdss1.png','slug' => 'horror','created_at' => now(),'updated_at' => now()],
            ['name' => 'The Walking Dead SS2','price' => 29.99,'description' => 'TWDSS2 Gold Edition','categories_id' => 1,'image' => 'twdss2.png','slug' => 'horror','created_at' => now(),'updated_at' => now()],
            ['name' => 'The Walking Dead New Frontier','price' => 39,'description' => 'TWDSS3 Bundle','categories_id' => 1,'image' => 'twdss3.png','slug' => 'horror','created_at' => now(),'updated_at' => now()],
            ['name' => 'The Walking Dead Final Season','price' => 50,'description' => 'TWD Final Edition','categories_id' => 1,'image' => 'twdss4.png','slug' => 'horror','created_at' => now(),'updated_at' => now()]
        ];
        //insert data to db
        DB::table('products')->insert($data);
    }
}
