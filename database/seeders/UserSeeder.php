<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Truong','email' => 'caot43069@gmail.com', 'password' => Hash::make('123')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'goku.jpg','roles'=> 0,'phone' => 123456789,'fullname'=>'Cao Thanh Truong','province'=>'Ho Chi Minh city','district'=>'Quan 9','ward'=>'Phuoc Long B','address'=>'Duong Xuan Quynh','birthday'=>'2004-06-28','description'=>'Hoang De Shurima'
            ],
            ['name' => 'Faker','email' => 'thanht43069@gmail.com', 'password' => Hash::make('123')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'faker.jpg','roles'=> 1,'phone' => 123123123,'fullname'=>'Lee Sang-Hyeok','province'=>'Busan','district'=>'Quan 9','ward'=>'Phuoc Long B','address'=>'Duong Xuan Quynh','birthday'=>'1996-05-07','description'=>'G.O.A.T of LoL'
        ],
        ];

        DB::table('users')->insert($data);

    }
}
