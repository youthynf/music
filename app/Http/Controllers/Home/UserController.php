<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use Redirect;

class UserController extends Controller
{
    //获取用户信息
    public function index(){
    	$user = User::find(Auth::user()->id);
    	return view('home.user.userinfo')->with(['user'=>$user]);
    }

    //保存用户信息
    public function store(Request $request){
    	//
    }

    //更新用户信息
    public function update(Request $request){
    	$this->validate($request, [
    		'nickname' => [
    		'required',
    		'max:30',               
    		], 
    		]);
    	$id = Auth::user()->id;
    	$model = User::find($id);
    	$oldavatar = $model->avatar;
    	//接收数据 加入model
    	$model->setRawAttributes($request->only(['nickname','gender']));
    	$avatar = $request->file('avatar');
        if($request->hasFile('avatar')){
        	if(!empty($oldavatar)){
        		$oldavatar = 'public'.$oldavatar;
				$re = Storage::delete($oldavatar);
        	}
            $extension = $avatar->getClientOriginalExtension();
            $distinationpath = User::AVATAR;
            $filename = time().rand(1,99).'.'.$extension;
            $check = $avatar->move($distinationpath,$filename);
            $model->avatar = '/upload/avatar/'.$filename;
        }
        $model->phone = $request->phone;
        $model->desc = $request->desc;
    	if ($model->save()) {
    		return Redirect::to('home/info')->withErrors('保存成功');
    	}
    	return Redirect::back()->withErrors('保存失败');
    }

    //更新用户密码
    public function modifypwd($id){
        $user = User::find($id);
        return view('admin.personal.modifypwd')->with(['user'=>$user]);
    }

    //更新用户密码
    public function updatepwd(Request $request, $id){
        $this->validate($request, [
            'name'=>'required',
            'oldpassword' => 'required',              
            'newpassword'=>'required',
            'comfirmpassword'=>'required',
        ]);
        $newpassword = $request->newpassword;
        $comfirmpassword = $request->comfirmpassword;
        if(strcmp($newpassword, $comfirmpassword)!=0){
            return back()->withInput()->withErrors("前后密码设置不一致");
        }
        //判断用户名是否输入正确
        if(strcmp($request->name, Auth::user()->name)!=0){
            return Redirect::back()->withErrors("用户名输入有误！");
        }
        $password = $request->oldpassword;
        $user = Auth::user();
        if(Auth::attempt(['id' => $id,'password' => $password])){ //判断密码是否匹配         
            $user->password = bcrypt($request->input('newpassword'));
            if($user->save()){
                return redirect('/home/info')->withErrors('修改成功!');

            }else{
                return back()->withInput()->withErrors("密码修改失败！");//$10$UGr3obVW4e1oWJeRACAVcu2RytNdqKfN4lQIzmKINWIrUpV5qN5Ri
           }
        }else {
            return Redirect::back()->withErrors("用户名或密码输入有误！");
        }
    }
}
