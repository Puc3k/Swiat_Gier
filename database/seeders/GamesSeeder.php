<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        DB::table('games')->truncate();


        for($j = 0; $j<1;$j++) {
            $games = [];
            for ($i = 0; $i < 100; $i++) {
                $games[] = [
                    'title' => $faker->words($faker->numberBetween(1, 3), true),
                    'description' => $faker->sentence,
                    'publisher' => $faker->randomElement(['Atari', 'EA', 'Ubisoft', 'Sega', 'Sony', 'Nintendo', 'Blizzard']),
                    'genre_id' => $faker->numberBetween(1, 5),
                    'score'=> $faker->numberBetween(1,100),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }
        DB::table('games')->insert($games);

//        for($i = 0; $i < 100; $i++)
//        {
//            DB::table('games')->insert([
//                'title'=> $faker->words($faker->numberBetween(1,3), true),
//                'description' => $faker->sentence,
//                'publisher' => $faker->randomElement(['Atari','EA','Ubisoft','Sega','Sony','Nintendo','Blizzard']),
//                'genre_id' => $faker->numberBetween(1,5),
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ]);
//        }
    }
}
