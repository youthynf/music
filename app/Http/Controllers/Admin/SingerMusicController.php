<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Music;
use App\Album;
use App\Singer;
use App\SingerMusic;
use Redirect;

class SingerMusicController extends Controller
{
    //歌手目录页
	public function index(){
        $lists = Singer::select('singer.*')->orderBy('singer.name','asc')->paginate(12);
        return view('home.singer_category')->with(['lists'=>$lists]);
    }

    public function indexData() {
    	
    }

    //歌手详情页
    public function show($id) {
    	//$singer = Singer::find($id);
    	//$lists = $this->indexData();
		//$lists = $lists->select('singer.*','album.name as album_name', 'music.name as music_name');
         //$singer = Singer::find($id);
        //$lists = Singer::find($id);
        $singer = Singer::find($id);
        $lists = Music::join('singer_music','music.id','=','singer_music.m_id')
        ->join('singer','singer_music.s_id','=', 'singer.id')
        ->leftJoin('album','music.a_id','=','album.a_id')
        ->whereNull('music.deleted_at')
        ->whereNull('album.deleted_at')
        ->whereNull('singer.deleted_at')
        ->whereNull('singer_music.deleted_at');
        $lists = $lists->select('music.*','album.name as album_name','singer.id as singer_id','singer.name as singer_name')->get();
        return view('home.singer_info')->with(['singer'=>$singer, 'lists'=>$lists]);
    }

    
}
