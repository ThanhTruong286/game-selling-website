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
            ['name' => 'Truong','email' => 'caot43069@gmail.com', 'password' => Hash::make('123')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'goku.jpg','roles'=> 0,'phone' => 123456789],
            ['name' => 'Thanh','email' => 'thanht43069@gmail.com', 'password' => Hash::make('456')/*tao mat khau la 123 va ma hoa bang Hash */,'image' => 'vegeta.jpg','roles'=>1, 'phone' => 123]
        ];

        DB::table('users')->insert($data);

    }
}
