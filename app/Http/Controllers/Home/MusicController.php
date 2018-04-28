<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Music;
use Redirect;

class MusicController extends Controller
{
   public function index(){
//       $lists=Music::join('singer_music','music.id','=','singer_music.m_id')->
//              join('singer','singer_music.s_id','=','singer.s_id')->
//              join('album','singer.s_id','=','album.s_id')->
//
//            ;
       $lists = Music::join('singer_music','music.id','=','singer_music.m_id')
           ->join('singer','singer_music.s_id','=','singer.id')
           ->leftJoin('album','music.a_id','=','album.id')

           ->whereNull('music.deleted_at')
           ->whereNull('album.deleted_at')
           ->whereNull('singer.deleted_at')
           ->whereNull('singer_music.deleted_at')

          ->select('*','singer.name as s_name','music.name as m_name','album.name as a_name','music.id as m_id','music.img as m_img','album.img as a_img')->get();

      return view('home.music')->with('lists',$lists);
   }
    public function show($id){
        $list=Music::join('singer_music','music.id','=','singer_music.m_id')
            ->join('singer','singer_music.s_id','=','singer.id')
            ->leftJoin('album','music.a_id','=','album.id')

            ->whereNull('music.deleted_at')
            ->whereNull('album.deleted_at')
            ->whereNull('singer.deleted_at')
            ->whereNull('singer_music.deleted_at')->select('*','singer.name as s_name','album.name as a_name','music.name as m_name','music.img as m_img')->find($id);
            //$con = html_entity_decode($list->lrc);
           $con = str_replace('[', "<p>", $list->lrc);
           $con = html_entity_decode($con);
        return view('home.music_detail')->with(['list'=>$list,'con'=>$con]);
    }

    public function searchermusic(Request $request){
      // echo $request->music_name;
       $lists = Music::join('singer_music','music.id','=','singer_music.m_id')
           ->join('singer','singer_music.s_id','=','singer.id')
           ->leftJoin('album','music.a_id','=','album.id')

           ->whereNull('music.deleted_at')
           ->whereNull('album.deleted_at')
           ->whereNull('singer.deleted_at')
           ->whereNull('singer_music.deleted_at')
           ->where('music.name','like','%'.$request->music_name.'%');
       $lists = $lists->select('*','singer.name as s_name','music.name as m_name','album.name as a_name','music.id as m_id','music.img as m_img','album.img as a_img')->get();
       return view('home.music')->with('lists',$lists);
    }
}
