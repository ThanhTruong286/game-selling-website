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
            ['name' => 'Faker','email' => 'thanht43069@gmail.com', 'password' => Hash::make('123')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'faker.jpg','roles'=> 1,'phone' => 123123123,'fullname'=>'Lee Sang-Hyeok','province'=>'Seoul','district'=>'Gangseo','ward'=>'No Info','address'=>'No Info','birthday'=>'1996-05-07','description'=>'G.O.A.T of LoL'],
            ['name' => 'Messi','email' => 'messi2406@gmail.com', 'password' => Hash::make('123')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'messi.jpg','roles'=> 1,'phone' => 723468324,'fullname'=>'Lionel Andrés Messi Cuccittini','province'=>'Rosario, Santa Fe','district'=>'No Info','ward'=>'No Info','address'=>'No Info','birthday'=>'1987-06-24','description'=>'G.O.A.T of Football'],
            ['name' => 'Richa','email' => 'richa123@gmail.com', 'password' => Hash::make('123')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'richa.jpg','roles'=> 1,'phone' => 768123,'fullname'=>'Park Ri Cha','province'=>'Mân Đàn','district'=>'Perez','ward'=>'Sunday the king plays','address'=>'Morroco','birthday'=>'1985-02-15','description'=>'If Of All Time'],
            ['name' => 'Zoro','email' => 'zoro@gmail.com', 'password' => Hash::make('123')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'zoro.jpg','roles'=> 1,'phone' => 123214,'fullname'=>'Zoro Mù Đường','province'=>'No Info','district'=>'No Info','ward'=>'No Info','address'=>'No Info','birthday'=>'1985-02-15','description'=>'Không Ai Có Thể Lạc Trên Một Con Đường Thẳng (Trừ Tui)'],
            ['name' => 'Jack','email' => 'jack@gmail.com', 'password' => Hash::make('123')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'jack.jpg','roles'=> 1,'phone' => 345525,'fullname'=>'Trùm Bỏ Con','province'=>'No Info','district'=>'No Info','ward'=>'No Info','address'=>'No Info','birthday'=>'1985-02-15','description'=>'Chắc Gì Đã Là Con Tui !!!'],
        ];

        DB::table('users')->insert($data);

    }
}
