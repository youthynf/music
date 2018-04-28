<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Album;
use App\Singer;
use App\Music;
use Illuminate\Support\Facades\Redirect;
class AlbumController extends Controller
{
    //显示专辑列表
    public function index(){
        $lists=Album::join('singer','album.s_id','=','singer.id')
        ->select('album.name as a_name','singer.name as s_name','album.img as a_img','album.desc as a_desc','album.id as album_id')
        ->paginate(5);

        return view('admin.album.index')->with('lists',$lists);
    }

    //
    public function create(){

        return view("admin.album.create");
    }

    public function store(Request $request){

        return $this->storeOrUpdate($request);

    }
    public function edit($id){
        $lists=Album::join('singer','album.s_id','=','singer.id')->where('album.id',$id)
            ->select('album.name as a_name','singer.name as s_name','album.img as a_img','album.desc as a_desc','album.id as album_id')
            ->paginate(5);



        return view('admin.album.edit')->with('lists',$lists);
    }
    public function destroy($id){

        if(Album::where('id',$id)->delete()){
            $musics = Music::where('a_id',$id)->get();
            foreach ($musics as $music) {
                $music->a_id = null;
                $music->save();
            }
            return redirect('admin/album/');
        }
        return 0;

    }
    public function update(Request $request,$id){

        return $this->storeOrUpdate($request,$id);
    }
    public function storeOrUpdate(Request $request,$id=-1){



        $this->validate($request, [
            'name' => 'required|max:30',
            'img'=>'max:255',
            'desc'=>'max:255',
            's_name'=> 'required|max:30',
        ]);
        $file=$request->file('img');
        $destinationPath = 'upload/feedback';
        $allowed_extensions = ['png', 'gif', 'jpg'];
        $name=$request->name;

        $desc=$request->desc;
        if(!$file){
            $fileName=0;
        }else {
            if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                return ['error' => 'you only upload PNG,GIF,JPG photo'];
            }
            $extension = $file->getClientOriginalExtension();

            $fileName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $fileName);
            //$filepath = asset($destinationPath, $fileName);
        }
        $issetSinger=Singer::where('name',$request->s_name)->count();
        if(!$issetSinger&&$id==-1) {
             return redirect('admin/album/create')->with('status',"歌手不存在，请创建歌手");;
        }
        if(!$issetSinger&&$id!=-1) {
            return redirect('admin/album/'.$id.'/edit')->with('status',"歌手不存在，请创建歌手");;
        }
        $Singer_id=Singer::where('name',$request->s_name)->value('id');

        if($id==-1){
            $Album=new Album;
            $Album->name=$name;
            $Album->img=$fileName;
            $Album->desc=$desc;
            $Album->s_id=$Singer_id;
            $Album->save();
        }
        else{
            Album::where('id',$id)->update(['name'=>$name,'img'=>$fileName,'desc'=>$desc,'s_id'=>$Singer_id]);
        }




        $lists=Singer::paginate(5);

        return redirect('admin/album/')->with('lists',$lists);
    }
}
