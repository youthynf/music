<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        // factory('App\User', 50)->create();
        
        //管理员
        $check = User::where('name','admin')->first();
        if (empty($check)) {
            $user = new User;
            $user->name = 'admin';
            $user->nickname = "helloword";
            $user->email = 'admin@qq.com';
            $user->password = bcrypt(888888);
            $user->gender = 0;
            $user->type = 1;
            $user->save();
        }

        //会员
        $check = User::where('name','user')->first();
        if (empty($check)) {
            $user = new User;
            $user->name = 'user';
            $user->nickname = "hello";
            $user->email = 'user@qq.com';
            $user->password = bcrypt(888888);
            $user->gender = 0;
            $user->type = 0;
            $user->save();
        }

        $check = User::where('name','user')->first();
        if (empty($check)) {
            $user = new User;
            $user->name = 'user2';
            $user->nickname = "world";
            $user->email = 'world@qq.com';
            $user->password = bcrypt(888888);
            $user->gender = 0;
            $user->type = 0;
            $user->save();
        }
    }
}
