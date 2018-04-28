<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use App\Music;
use App\Album;
use App\Singer;
use App\SingerMusic;
use Redirect;


class MusicController extends Controller
{
    //显示音乐列表
	public function index(Request $request)
	{
        //return 123;
		$lists = Music::orderBy('music.id')->paginate(1);
        $lists = $this->indexData();
        $lists = $lists->select('music.*','album.name as album_name','singer.id as singer_id','singer.name as singer_name')->orderBy('music.id')->paginate(5);
		return view('admin.music.music')->with(['lists'=>$lists]);
	}


	//获取数据
	public function indexData(){
        // $query = Worker::select('workers.name_and_surname', 'workers.id', 'workers.location','company_saved_cv.worker_id')
        // ->leftJoin('company_saved_cv', function($leftJoin)use($company_id)
        // {
        //     $leftJoin->on('workers.id', '=', 'company_saved_cv.worker_id');
        //     $leftJoin->on(DB::raw('company_saved_cv.company_id'), DB::raw('='),DB::raw("'".$company_id."'"));


        // })
        //select('music.*','album.name as album_name','singer.s_id as singer_id','singer.name as singer_name')
        $lists = Music::join('singer_music','music.id','=','singer_music.m_id')
        ->join('singer','singer_music.s_id','=','singer.id')
        ->leftJoin('album','music.a_id','=','album.id')
        ->whereNull('music.deleted_at')
        ->whereNull('album.deleted_at')
        ->whereNull('singer.deleted_at')
        ->whereNull('singer_music.deleted_at');

		// $lists = Music::join('album','music.id','=','album.a_id')
		// ->join('singer_music','music.id','=','singer_music.m_id')
		// ->join('singer','singer_music.s_id','=','singer.s_id')
		// ->whereNull('music.deleted_at')
		// ->whereNull('album.deleted_at')
		// ->whereNull('singer.deleted_at')
		// ->whereNull('singer_music.deleted_at');

		return $lists;
	}

    //查看单条信息
	public function show($id)
	{ 
		$music = Music::find($id);
        return view('admin.music.music_show')->with(['music'=>$music]);
	}

    //数据创建
	public function create()
	{
        $albums = Album::orderBy('id','asc')->get();
        $singers = Singer::orderBy('id','asc')->get();
        return view('admin.music.music_create')->with(['albums'=>$albums,'singers'=>$singers]);
	}

    //保存新建数据
	public function store(Request $request)
	{
		return $this->StoreOrUpdate($request);
	}

    //编辑数据
	public function edit($id)
	{
		// $data = Article::find($id);
		// $lists = ArticleCategory::select('id','name')->get();
		// return view(config('app.theme').'.admin.article.list_edit')->with(['data' => $data, 'lists' => $lists]);
        $albums = Album::orderBy('id','asc')->get();
        $singers = Singer::orderBy('id','asc')->get();
        $lists = $this->indexData();
        $lists = $lists->where('music.id','=',$id)->select('music.*','album.name as album_name','singer.id as singer_id','singer.name as singer_name')->first();
        return view('admin.music.music_edit')->with(['data'=>$lists,'albums'=>$albums,'singers'=>$singers]);
	}

    //编辑保存
	public function update(Request $request, $id)
	{
		return $this->StoreOrUpdate($request, $id);
	}

    //单条删除
	public function destroy($id)
	{
        $model = Music::find($id);
        $oldimg = $model->img;
        $oldmusic = $model->source;
        if(!empty($oldimg)){
            $re = Storage::delete($oldimg);
        }
        if(!empty($oldmusic)){
            $res = Storage::delete($oldmusic);
        }
        $singer_music = SingerMusic::where('m_id',$id)->first();
        if(!SingerMusic::destroy($singer_music->id)){
            return Redirect::back()->withErrors('删除失败');
        }
        if(Music::destroy($id))
            return Redirect::back()->withErrors('删除成功');
        return Redirect::back()->withErrors('删除失败');
	}

    //保存方法
    public function StoreOrUpdate(Request $request, $id = -1)
    {
    	if($id == -1){
        $this->validate($request, [
    		'name' => [
    		'required',
    		'max:30',               
    		], 
    		's_id'=>'required',
            'source' => 'required',
    		]);
        }else{
             $this->validate($request, [
            'name' => [
            'required',
            'max:30',               
            ], 
            's_id'=>'required',
            ]);
        }

    	if ($id == -1) {
    		$model = new Music;
            $oldimg = '';
            $oldmusic = '';
    	} else {
    		$model = Music::find($id);
            $oldimg = $model->img;
            $oldmusic = $model->source;
    	}
        //获取歌曲的歌手id
        $singer_id = $request->s_id;
        //接收数据 加入model
        $lrc = $request->lrc;
        
    	$model->setRawAttributes($request->only(['name','a_id','desc','language']));

        //上传图片
        $img = $request->file('img');
        if($request->hasFile('img')){
            $extension = $img->getClientOriginalExtension();
            $distinationpath = Music::IMG;
            $filename = time().rand(1,99).'.'.$extension;
            $check = $img->move($distinationpath,$filename);
            $model->img = '/upload/img/'.$filename;
        }
           
        //音乐上传    
        $music = $request->file('source');
        if($request->hasFile('source')){
            $Extension = $music->getClientOriginalExtension();
            $distinationpath = Music::MUSIC;
            $filename = time().rand(1,99).'.'.$Extension;
            $check = $music->move($distinationpath,$filename);
            $model->source = '/upload/music/'.$filename;
        }
        $model->lrc = $lrc;
        if(!empty($oldimg)){
            $re = Storage::delete($oldimg);
        }
        if(!empty($oldmusic)){
            $res = Storage::delete($oldmusic);
        }
        //音乐新建成功后写进singer_music表
    	if ($model->save()) {
            if($id == -1){
               $singer_music = new SingerMusic;
               $singer_music->m_id = $model->id;
               $singer_music->s_id = $singer_id;
            }else {
               $singer_music = SingerMusic::where('m_id',$id)->first();
               $singer_music->m_id = $id;
               $singer_music->s_id = $singer_id;
            }
            if(!$singer_music->save()){
                 return Redirect::back()->withErrors('写入关联表出错！');
             }
    		return Redirect::to('admin/music')->with('status', '保存成功');
    	}
    	return Redirect::back()->withErrors('保存失败');
    }

}
