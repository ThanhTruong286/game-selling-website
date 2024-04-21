<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['name'=>'img1','image'=>'cs1.jpg','product_id'=>5],
            ['name'=>'img2','image'=>'cs2.jpg','product_id'=>5],
            ['name'=>'img3','image'=>'cs3.jpg','product_id'=>5],
            ['name'=>'img4','image'=>'cs4.jpg','product_id'=>5],
            ['name'=>'img5','image'=>'cs5.jpg','product_id'=>5],
        ];
        DB::table('gallery')->insert($data);
    }
}
