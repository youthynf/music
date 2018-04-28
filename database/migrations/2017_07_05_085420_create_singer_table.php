<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('singer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->comment('歌手名字');
            $table->string('img',255)->comment('歌手图片')->nullable();
            $table->text('desc')->comment('歌手简介')->nullable();
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
        Schema::dropIfExists('singer');
    }
}
