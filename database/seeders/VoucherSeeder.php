<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['content'=>'Voucher Giam 50% Cho Khach Moi','type'=>'%','value'=>50],
            ['content'=>'Voucher Giam 100K','type'=>'VND','value'=>100],
            ['content'=>'Free Ship','type'=>'Free Ship','value'=>0],
        ];
        DB::table('voucher')->insert($data);
    }
}
