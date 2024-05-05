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
            ['name' => 'The Walking Dead SS1','price' => 140000,'description' => 'A five-part adventure horror series set in the same universe as Robert Kirkman’s award-winning comic book series.','categories_id' => 1,'image' => 'twdss1.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>1000,'sale'=>30,'old_price'=>200000,'banner'=>false],

            ['name' => 'The Walking Dead SS2','price' => 210000,'description' => 'The Walking Dead: Season Two continues the story of Clementine, a young girl orphaned by the undead apocalypse. Left to fend for herself, she has been forced to learn how to survive in a world gone mad.','categories_id' => 1,'image' => 'twdss2.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>1100,'sale'=>30,'old_price'=>300000,'banner'=>false],

            ['name' => 'The Walking Dead New Frontier','price' => 210000,'description' => 'After society was ripped apart by undead hands, pockets of civilization emerge from the chaos. But at what cost? Can the living be trusted on this new frontier?','categories_id' => 1,'image' => 'twdss3.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>900,'sale'=>30,'old_price'=>300000,'banner'=>false],

            ['name' => 'The Walking Dead Final Season','price' => 350000,'description' => 'A secluded school might finally be Clementine’s chance for a home, but protecting it will mean sacrifice.','categories_id' => 1,'image' => 'twdss4.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>800,'sale'=>30,'old_price'=>500000,'banner'=>false],

            ['name' => 'Counter-Strike','price' => 0.0,'description' => "Counter-Strike on Steam. Play the world's number 1 online action game. Engage in an incredibly realistic brand of terrorist warfare in this wildly popular team-based game. Ally with teammates to complete strategic missions",'categories_id' => 3,'image' => 'csgo.jpg','slug' => 'fps','created_at' => now(),'updated_at' => now(),'total_play_time'=>100000,'sale'=>0,'old_price'=>0.0,'banner'=>false],

            ['name' => 'League of Legends','price' => 0.0,'description' => 'League of Legends is a team-based strategy game where two teams of five powerful champions face off to destroy the other’s base. Choose from over 140 champions to make epic plays, secure kills, and take down towers as you battle your way to victory.','categories_id' => 2,'image' => 'lol.png','slug' => 'action','created_at' => now(),'updated_at' => now(),'total_play_time'=>1000100,'sale'=>0,'old_price'=>0.0,'banner'=>false],

            ['name' => 'Resident Evil 2','price' => 729000,'description' => 'A deadly virus engulfs the residents of Raccoon City in September of 1998, plunging the city into chaos as flesh eating zombies roam the streets for survivors','categories_id' => 1,'image' => 're2.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>100000,'sale'=>50,'old_price'=>1000000,'banner'=>false],

            ['name' => 'Outlast 2','price' => 575000,'description' => 'Outlast 2 introduces you to Sullivan Knoth and his followers, who left our wicked world behind to give birth to Temple Gate, a town, deep in the wilderness and hidden from civilization. Knoth and his flock are preparing for the tribulations of the end of times and you’re right in the thick of it.','categories_id' => 1,'image' => 'ol2.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>100800,'sale'=>67,'old_price'=>900000,'banner'=>false],

            ['name' => 'Resident Evil 4','price' => 925000,'description' => 'Survival is just the beginning. Six years have passed since the biological disaster in Raccoon City. Leon S. Kennedy, one of the survivors, tracks the presidents kidnapped daughter to a secluded European village, where there is something terribly wrong with the locals.','categories_id' => 1,'image' => 're4.png','slug' => 'horror','created_at' => now(),'updated_at' => now(),'total_play_time'=>2300800,'sale'=>0,'old_price'=>925000,'banner'=>true],

            ['name' => 'God Of War','price' => 1159000,'description' => 'In God of War, players control Kratos, a Spartan warrior who is sent by the Greek gods to kill Ares, the god of war. As the story progresses, Kratos is revealed to be Ares former servant, who had been tricked into killing his own family and is haunted by terrible nightmares.','categories_id' => 2,'image' => 'gow.jpg','slug' => 'action','created_at' => now(),'updated_at' => now(),'total_play_time'=>100800,'sale'=>0,'old_price'=>1159000,'banner'=>false],

            ['name' => 'Sekiro','price' => 645000,'description' => 'Game of the Year - The Game Awards 2019 Best Action Game of 2019 - IGN Carve your own clever path to vengeance in the award winning adventure from developer FromSoftware, creators of Bloodborne and the Dark Souls series. Take Revenge. Restore Your Honor. Kill Ingeniously','categories_id' => 2,'image' => 'sekiro.jpg','slug' => 'action','created_at' => now(),'updated_at' => now(),'total_play_time'=>300800,'sale'=>50,'old_price'=>1290000,'banner'=>false],

            ['name' => 'Valorant','price' => 0,'description' => 'Valorant is an online multiplayer computer game, produced by Riot Games. It is a first-person shooter game, consisting of two teams of five, where one team attacks and the other defends. Players control characters known as agents, who all have different abilities to use during gameplay.','categories_id' => 3,'image' => 'valorant.jpg','slug' => 'fps','created_at' => now(),'updated_at' => now(),'total_play_time'=>300800,'sale'=>0,'old_price'=>0,'banner'=>false],

            ['name' => 'PUBG','price' => 0,'description' => 'PUBG: Battlegrounds là một trò chơi điện tử hành động, sinh tồn, nhiều người chơi trực tuyến do Krafton Inc. - tập đoàn phát triển game có trụ sở chính được đặt tại thành phố Seongnam, Hàn Quốc thiết kế, phát triển và phát hành.','categories_id' => 3,'image' => 'pubg.jpg','slug' => 'fps','created_at' => now(),'updated_at' => now(),'total_play_time'=>10000,'sale'=>0,'old_price'=>0,'banner'=>false],

            ['name' => 'Tomb Raider','price' => 247500,'description' => 'Tomb Raider explores the intense origin story of Lara Croft and her ascent from a young woman to a hardened survivor.','categories_id' => 2,'image' => 'tombraider.jpg','slug' => 'action','created_at' => now(),'updated_at' => now(),'total_play_time'=>2000,'sale'=>0,'old_price'=>247500,'banner'=>false],

            ['name' => 'Rise Of The Tomb Raider','price' => 495000,'description' => 'Rise of the Tomb Raider: 20 Year Celebration includes the base game and Season Pass featuring all-new content. Explore Croft Manor in the new “Blood Ties” story, then defend it against a zombie invasion in “Lara’s Nightmare”.','categories_id' => 2,'image' => 'riseofthetombraider.jpg','slug' => 'action','created_at' => now(),'updated_at' => now(),'total_play_time'=>2000,'sale'=>0,'old_price'=>495000,'banner'=>false],
        ];
        //insert data to db
        DB::table('products')->insert($data);
    }
}
