<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Music;
use App\Album;
use App\Singer;
use App\SingerMusic;
use Redirect;

class SingerController extends Controller
{
    //歌手目录页
	public function index(){
        $lists = Singer::orderBy('singer.id','asc')->get();        
        return view('home.singer.singer_category')->with(['lists'=>$lists]);
    }

    public function indexData() {
    	
    }

    //歌手详情页
    public function show($id) {
        $singer = Singer::find($id);
        $lists = Music::join('singer_music','music.id','=','singer_music.m_id')
        ->join('singer','singer_music.s_id','=', 'singer.id')
        ->leftJoin('album','music.a_id','=','album.id')
        ->whereNull('music.deleted_at')
        ->whereNull('album.deleted_at')
        ->whereNull('singer.deleted_at')
        ->whereNull('singer_music.deleted_at');
        $lists = $lists->select('music.*','album.name as album_name','album.img as a_img','singer.img as s_img','singer.id as singer_id','singer.name as singer_name')->where('singer.id','=',$id)->get();
        return view('home.singer.singer_info')->with(['singer'=>$singer, 'lists'=>$lists]);
    }
}
