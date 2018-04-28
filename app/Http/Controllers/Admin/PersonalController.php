<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\User;
use Redirect;

class PersonalController extends Controller
{
    //显示个人信息
	public function index(){
		return view('admin.test');
	}

	public function edit($id){
		$user = User::find($id);
		return view('admin.personal.personal_edit')->with(['user'=>$user]);
	}

   	//更新管理员信息
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
			return Redirect::to('/admin/home')->withErrors('保存成功');
		}
		return Redirect::back()->withErrors('保存失败');
	}

   	//更新管理员密码
	public function modifypwd($id){
		$user = User::find($id);
		return view('admin.personal.modifypwd')->with(['user'=>$user]);
	}

	public function updatepwd(Request $request,$id){
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
        		return redirect('admin/home')->withErrors("修改成功");
        	}else{
        		return back()->withInput()->withErrors("密码修改失败！");//$10$UGr3obVW4e1oWJeRACAVcu2RytNdqKfN4lQIzmKINWIrUpV5qN5Ri
        	}
        }else {
        	return Redirect::back()->withErrors("用户名或密码输入有误！");
        }
    }
}
