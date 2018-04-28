<?php

use Illuminate\Database\Seeder;
use Illuminate\Datebase\Eloquent\Model;

class AlbumTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('album')->insert([
        	'id' => '1',
        	'name' => '初学者',
        	'img' => 'GWFnmSJsdY.jpg',
        	'desc' => '薛之谦的专辑',
        	's_id' => '1',
        	'created_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('album')->insert([
        	'id' => '2',
        	'name' => '十一月的萧邦',
        	'img' => 'dpr1FHYLbp.jpg',
        	'desc' => '周杰伦的专辑',
        	's_id' => '2',
        	'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
