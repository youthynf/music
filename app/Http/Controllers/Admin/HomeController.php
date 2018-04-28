<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function index(){
    	$user = User::find(Auth::user()->id);
    	return view('admin.test')->with(['user'=>$user]);
    }
}
