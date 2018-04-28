<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMusicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('music', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->comment('音乐名称');
            $table->string('img',255)->comment('音乐图片')->nullable();
            $table->string('source',255)->comment('音乐资源路径');
            $table->string('language',20)->comment('音乐语种');
            $table->string('desc',255)->comment('歌曲描述')->nullable();
            $table->text('lrc')->comment('歌词')->nullable();
            $table->integer('a_id')->comment('专辑id');
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
        Schema::dropIfExists('music');
    }
}
