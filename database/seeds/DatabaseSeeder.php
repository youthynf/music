<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(SingerTableSeeder::class);
        $this->call(AlbumTableSeeder::class);
        $this->call(MusicTableSeeder::class);
        $this->call(SingerMusicTableSeeder::class);
    }
}
