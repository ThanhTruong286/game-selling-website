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
            ['name' => 'Horror','slug'=>'horror','image' => 'horror.jpg','created_at' => now(),'updated_at' => now()],
            ['name' => 'Action','slug'=>'action','image' => 'action.jpg','created_at' => now(),'updated_at' => now()],
            ['name' => 'FPS','slug'=>'fps','image' => 'fps.jpg','created_at' => now(),'updated_at' => now()],
        ];
        DB::table('categories')->insert($data);
    }
}
