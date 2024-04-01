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
        $insertData = [
            ['name'=>'Laptop MSI','price'=>1000000,'description'=>'Laptop MSI description','slug'=>'lap-top','image'=>'laptop1.png','user_id'=>'user_1','category_id'=>'1','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Laptop DELL','price'=>2000000,'description'=>'Laptop DELL description','slug'=>'lap-top','image'=>'laptop2.png','user_id'=>'user_1','category_id'=>'1','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Laptop ASUS','price'=>3000000,'description'=>'Laptop ASUS description','slug'=>'lap-top','image'=>'laptop3.png','user_id'=>'user_1','category_id'=>'1','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Laptop MSI','price'=>1000000,'description'=>'Laptop MSI description','slug'=>'lap-top','image'=>'laptop1.png','user_id'=>'user_1','category_id'=>'1','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Camera Sony','price'=>1000000,'description'=>'Camera Sony description','slug'=>'camera','image'=>'camera1.png','user_id'=>'user_1','category_id'=>'2','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Camera KBVISION.','price'=>1000000,'description'=>'Camera KBVISION. description','slug'=>'camera','image'=>'camera2.png','user_id'=>'user_1','category_id'=>'2','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Headphone MSI','price'=>1000000,'description'=>'Headphone MSI description','slug'=>'tai-nghe','image'=>'tainghe1.png','user_id'=>'user_1','category_id'=>'3','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'Headphone Sony','price'=>1000000,'description'=>'Headphone Sony description','slug'=>'tai-nghe','image'=>'tainghe2.png','user_id'=>'user_1','category_id'=>'3','created_at'=>now(),'updated_at'=>now()],
            ['name'=>'iPhone 14','price'=>1000000,'description'=>'iPhone 14 description','slug'=>'dien-thoai','image'=>'dt1.png','user_id'=>'user_1','category_id'=>'4','created_at'=>now(),'updated_at'=>now()]
        ];

        //insert vao database
        DB::table('products')->insert($insertData);
    }
}
