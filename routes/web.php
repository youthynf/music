<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('admin.index');
// });

Auth::routes();
Route::get('/','HomeController@index');
Route::get('/home', 'HomeController@index');
//Route::get('/home', 'HomeController@index')->nasme('home');
Route::resource('/singer', 'Admin\SingerMusicController');
//Route::get('/singer_info', 'Admin\SingerMusicController@index');

//后台管理登录
Route::get('/admin/login','Auth\LoginController@adminlogin');
Route::post('/admin/login','Auth\LoginController@adminlogincheck');
Route::get('/admin/logout','Auth\LoginController@logoutadmin');


/********************** 游客 ***************************/
	//歌手详情
	Route::resource('/singer','Home\SingerController');
	//音乐详情
    Route::resource('/music','Home\MusicController');
    //音乐搜素
    Route::get('/search','Home\MusicController@searchermusic');


/********************** user - 普通用户 ***************************/
Route::group(['namespace'=>'Home','prefix'=>'home','middleware'=>['auth']],function(){
	//用户个人信息修改
	// Route::get('/info','');
	// Route::post('/info','');
	Route::resource('/info','UserController');
	Route::post('/modifypwd/{id}','UserController@updatepwd');

// //歌手详情
// 	//Route::resource('/singer','SingerController');
//     Route::resource('/music','MusicController');

	//

});



/********************** Admin - 管理员 ***************************/
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>['auth','userRole:admin']],function(){
// Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
	
	Route::get('/home','HomeController@index');
	//用户管理
	Route::resource('/userinfo','UserController');

	//歌手管理
	Route::resource('/singer','SingerController');

	//专辑管理
	Route::resource('/album','AlbumController');

	//个人信息管理
	Route::resource('/personal','PersonalController');
	Route::get('/modifypwd/{id}','PersonalController@modifypwd');
	Route::post('/modifypwd/{id}','PersonalController@updatepwd');

	//音乐管理
	Route::resource('/music','MusicController');
});