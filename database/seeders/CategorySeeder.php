<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Horror','image' => 'horror.jpg','created_at' => now(),'updated_at' => now()],
            ['name' => 'Action','image' => 'action.jpg','created_at' => now(),'updated_at' => now()],
            ['name' => 'FPS','image' => 'fps.jpg','created_at' => now(),'updated_at' => now()],
        ];
        DB::table('categories')->insert($data);
    }
}
