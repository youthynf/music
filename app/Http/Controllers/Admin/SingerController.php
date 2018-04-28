<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Singer;
use App\SingerMusic;
use Redirect;

class SingerController extends Controller
{
    //
    public function index(){
        $lists=Singer::paginate(5);

        return view('admin.singer.index')->with('lists',$lists);
    }
    public function create(){

        return view("admin.singer.create");
    }

    public function store(Request $request){

     return $this->storeOrUpdate($request);
    }
    public function edit($id){

       $list=Singer::where('id',$id)->first();
        return view('admin.singer.edit')->with('list',$list);
    }
    public function show($id){
        $list=Singer::where('id',$id)->first();
        return view('admin.singer.show')->with('list',$list);
    }

    public function destroy($id){
        //查看数据库中是否含有该歌手的音乐，有不能删除
       $singer_music = SingerMusic::where('s_id',$id)->get();
       if(count($singer_music)>0){
            return Redirect::back()->withErrors("音乐库中含有歌手音乐，不能删除");
       }
       if(Singer::destroy($id)){
         return Redirect::back()->withErrors('status','删除成功');
       }
         return Redirect::back()->withErrors('删除失败');

    }
    public function update(Request $request,$id){
      return $this->storeOrUpdate($request,$id);

    }
    public function storeOrUpdate(Request $request,$id=-1){



        $this->validate($request, [
            'name' => 'required|max:30',
            'img'=>'max:255',
            // 'desc'=>'max:255',

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


            if($id==-1){
            $Singer=new Singer;
                $Singer->name=$name;
                $Singer->img=$fileName;
                $Singer->desc=$desc;

                $Singer->save();
            }
            else{
            Singer::where('id',$id)->update(['name'=>$name,'img'=>$fileName,'desc'=>$desc]);
            }




        $lists=Singer::paginate(5);

        return redirect('admin/singer/')->with('lists',$lists);
   }
}
