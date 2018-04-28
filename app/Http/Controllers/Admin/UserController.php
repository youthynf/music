<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use App\User;
use IQuery;
use Redirect;


class UserController extends Controller
{

    //列表页
	public function index(Request $request)
	{
		 $lists = User::where('type', '=', 0);
		 $lists = $lists->select(
		 	'user.*'
		 )->orderBy('user.id','asc')->paginate(10);
		return view('admin.user.user')->with(['lists'=>$lists]);
	}

    //查看单条信息
    public function show($id) {
        $user = User::find($id);
        return view('admin.user.user_detail')->with(['user'=>$user]);
    }

    //单条删除
    public function destroy($id)
    {
        if (User::destroy($id)) {
            return Redirect::back()->with('status','删除成功');
        }
        return Redirect::back()->withErrors('删除失败');
    }

    //批量删除
    public function dels(Request $request)
    {
        $ids = explode(',', $request->ids);
    	foreach ($ids as $id) {
    		if (!$this->del($id)) {
    			return Redirect::back()->withErrors('批量删除失败');
    		}
    	}
    	return Redirect::back()->with('status','批量删除成功');
    }

 
}
