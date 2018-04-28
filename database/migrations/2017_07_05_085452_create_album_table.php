<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('album', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->comment('专辑名称');
            $table->string('img',255)->comment('专辑图片')->nullable();
            $table->string('desc',255)->comment('描述')->nullable();
            $table->integer('s_id')->comment('歌手id');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('album');
    }
}
