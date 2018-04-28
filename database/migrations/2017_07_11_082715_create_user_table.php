 <?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30)->comment('用户名')->unique();
            $table->string('nickname',30)->comment('昵称');
            $table->string('email',30)->unique();
            $table->string('password',255)->comment('密码');
            $table->string('avatar',255)->nullable()->comment('头像');
            $table->string('gender')->default(0)->comment('性别(0男、1女)');
            $table->string('type')->default(0)->comment('用户类型');
            $table->string('phone',30)->nullable()->commit('手机号码');
            $table->string('address',255)->nullable()->commit('地址');
            $table->string('desc',255)->nullable()->commit('描述');
            $table->string('website',255)->nullable()->commit('个人网站');
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
