<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //du lieu truyen vao
        $data = [
            ['name' => 'Laptop','image' => 'laptop1.png', 'slug' => 'lap-top', 'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Camera','image' => 'camera1.png', 'slug' => 'camera', 'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Headphone','image' => 'tainghe1.png', 'slug' => 'tai-nghe', 'created_at'=>now(),'updated_at'=>now()],
            ['name' => 'Phone','image' => 'dt1.png', 'slug' => 'dien-thoai', 'created_at'=>now(),'updated_at'=>now()],
        ];

        //insert du lieu
        DB::table('categories')->insert($data);
    }
}
