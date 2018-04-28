<?php

use Illuminate\Database\Seeder;
use Illuminate\Datebase\Eloquent\Model;

class SingerMusicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('singer_music')->insert([
        	'id' => '1',
        	's_id' => '1',
        	'm_id' => '1',
        	'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('singer_music')->insert([
        	'id' => '2',
        	's_id' => '1',
        	'm_id' => '2',
        	'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('singer_music')->insert([
        	'id' => '3',
        	's_id' => '1',
        	'm_id' => '3',
        	'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('singer_music')->insert([
        	'id' => '4',
        	's_id' => '1',
        	'm_id' => '4',
        	'created_at' => date("Y-m-d H:i:s")
        ]);

        DB::table('singer_music')->insert([
        	'id' => '5',
        	's_id' => '2',
        	'm_id' => '5',
        	'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('singer_music')->insert([
        	'id' => '6',
        	's_id' => '2',
        	'm_id' => '6',
        	'created_at' => date("Y-m-d H:i:s")
        ]);
        DB::table('singer_music')->insert([
        	'id' => '7',
        	's_id' => '2',
        	'm_id' => '7',
        	'created_at' => date("Y-m-d H:i:s")
        ]);

    }
}
