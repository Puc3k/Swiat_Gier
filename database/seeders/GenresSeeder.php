<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->truncate();

        DB::table('genres')->insert([
            ['name'=> 'RPG','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name'=> 'Adventure','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name'=> 'FPS','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name'=> 'Sim','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
            ['name'=> 'Sport','created_at'=>Carbon::now(),'updated_at'=>Carbon::now()],
        ]);



    }
}
