<?php

namespace Database\Seeders;

use App\Models\Developers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name'=>'CapCom','user_id'=>2],
            ['name'=>'TellTale','user_id'=>2],
            ['name'=>'Riot','user_id'=>1],
            ['name'=>'Red Barrels','user_id'=>1],
            ['name'=>'Crystal Dynamics','user_id'=>1],
            ['name'=>'Sony','user_id'=>1],
        ];
        DB::table('developers')->insert($data);
    }
}
