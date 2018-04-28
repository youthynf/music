<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function adminlogin(){
        return view('admin/login');
    }

    public function adminlogincheck(Request $request){
        $this->validate($request, [
            'name' => [
                'required',
                'max:30',               
            'password'=>'required'
            ], 
        ]); 
        $user = User::where('name',$request->name)->first();

        //???????û????
        if(empty($user)){
            return Redirect::back()->withError("???????ڣ?");
        }
        $id = $user->id;
        $password = $request->password;
        if(Auth::attempt(['id' => $id,'type'=>'1','password' => $password])){ //?֤??????         
            return redirect('/admin/home');
        }else {
            return Redirect::back()->withError("error");
        }
    }

    //????ǳ?
    public function logoutadmin()
    {
        //$this->guard()->logout();
        Auth::logout();
        return redirect('/admin/login');
    }
}
