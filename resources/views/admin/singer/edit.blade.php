@extends("admin.layouts.app")
@section('css')

@endsection
@section('script')
    @parent
@endsection
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">编辑歌手</h3>
        </div>
        <div class="panel-body">

            <form action="{{url('/admin/singer/'.$list->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" value="PUT" name="_method">
                {{ csrf_field() }}


                <input class="form-control" placeholder="Name" type="text" name="name" value="{{$list->name}}">
                <br>
                <img src="{{url('/upload/feedback/'.$list->img)}}" width="300" height="300">
                <input name="img" type="file" src="{{url('/upload/feedback/'.$list->img)}}"></td>
                <br>
                <textarea class="form-control" placeholder="简介" rows="4" name="desc">{{$list->desc}}</textarea>
                <br>
                <div class="input-group">
                    <span class="input-group-btn"><button class="btn btn-primary" type="button">取消</button></span>
                    <span class="input-group-btn" style="text-align: right"><button class="btn btn-primary" type="submit">修改</button></span>
                </div>
            </form>

        </div>
    </div>

@endsection