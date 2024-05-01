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
        //create data that will be insert to product table
        $data = [
            ['name' => 'The Walking Dead SS1','price' => 140000,'description' => 'TWD GOTY Edition','categories_id' => 1,'image' => 'twdss1.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>1000,'sale'=>30,'old_price'=>200000],
            ['name' => 'The Walking Dead SS2','price' => 210000,'description' => 'TWDSS2 Gold Edition','categories_id' => 1,'image' => 'twdss2.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>1100,'sale'=>30,'old_price'=>300000],
            ['name' => 'The Walking Dead New Frontier','price' => 210000,'description' => 'TWDSS3 Bundle','categories_id' => 1,'image' => 'twdss3.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>900,'sale'=>30,'old_price'=>300000],
            ['name' => 'The Walking Dead Final Season','price' => 350000,'description' => 'TWD Final Edition','categories_id' => 1,'image' => 'twdss4.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>800,'sale'=>30,'old_price'=>500000],

            ['name' => 'Counter-Strike','price' => 0.0,'description' => 'Bắt đầu chơi trò chơi hành động số 1 của thế giới. Tham gia vào các thương hiệu thực của chiến tranh khủng bố trong trò chơi theo đội nhóm cực kì nổi tiếng này','categories_id' => 3,'image' => 'csgo.jpg','slug' => 'fps','created_at' => now(),'updated_at' => now(),'total_play_time'=>100000,'sale'=>0,'old_price'=>0.0],
            ['name' => 'League of Legends','price' => 0.0,'description' => 'Liên Minh Huyền Thoại là một trò chơi đồng đội với hơn 140 vị tướng để người chơi thoải mái lựa chọn. Hãy chơi miễn phí ngay!','categories_id' => 1,'image' => 'lol.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>1000100,'sale'=>0,'old_price'=>0.0],
            ['name' => 'Resident Evil 2','price' => 729000,'description' => 'A deadly virus engulfs the residents of Raccoon City in September of 1998, plunging the city into chaos as flesh eating zombies roam the streets for survivors','categories_id' => 1,'image' => 're2.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>100000,'sale'=>50,'old_price'=>1000000],

            ['name' => 'Outlast 2','price' => 575000,'description' => 'Outlast 2 introduces you to Sullivan Knoth and his followers, who left our wicked world behind to give birth to Temple Gate, a town, deep in the wilderness and hidden from civilization. Knoth and his flock are preparing for the tribulations of the end of times and you’re right in the thick of it.','categories_id' => 1,'image' => 'ol2.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>100800,'sale'=>67,'old_price'=>900000],

            ['name' => 'Resident Evil 4','price' => 925000,'description' => 'Survival is just the beginning. Six years have passed since the biological disaster in Raccoon City. Leon S. Kennedy, one of the survivors, tracks the presidents kidnapped daughter to a secluded European village, where there is something terribly wrong with the locals.','categories_id' => 1,'image' => 're4.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>2300800,'sale'=>0,'old_price'=>925000],

            ['name' => 'God Of War','price' => 1159000,'description' => 'In God of War, players control Kratos, a Spartan warrior who is sent by the Greek gods to kill Ares, the god of war. As the story progresses, Kratos is revealed to be Ares former servant, who had been tricked into killing his own family and is haunted by terrible nightmares.','categories_id' => 2,'image' => 'gow.jpg','slug' => 'action','created_at' => now(),'updated_at' => now(),'total_play_time'=>100800,'sale'=>0,'old_price'=>1159000],

            ['name' => 'Sekiro','price' => 645000,'description' => 'Game of the Year - The Game Awards 2019 Best Action Game of 2019 - IGN Carve your own clever path to vengeance in the award winning adventure from developer FromSoftware, creators of Bloodborne and the Dark Souls series. Take Revenge. Restore Your Honor. Kill Ingeniously','categories_id' => 2,'image' => 'sekiro.jpg','slug' => 'action','created_at' => now(),'updated_at' => now(),'total_play_time'=>300800,'sale'=>50,'old_price'=>1290000],
            
        ];
        //insert data to db
        DB::table('products')->insert($data);
    }
}
