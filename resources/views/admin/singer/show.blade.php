@extends("admin.layouts.app")
@section('css')

@endsection
@section('script')
    @parent
@endsection
@section('content')
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">查看歌手</h3>
        </div>
        <div class="panel-body">

            <form action="{{url('/admin/singer')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group" style="width: 267px; margin-bottom: 20px;">
                    <span class="input-group-addon">姓名：</span>
                    <input class="form-control" placeholder="Name" type="text" name="name" value="{{$list->name}}" style="width:200px;" disabled="disabled">
                </div>

                <div class="" style="margin-bottom: 20px;">
                    <img src="{{url('/upload/feedback/'.$list->img)}}" width="300" height="300">

                </div>


                <div class="" style="margin-bottom: 20px;">
                    <textarea class="form-control" placeholder="简介" rows="4" name="desc" disabled="disabled">{{$list->desc}}</textarea>

                </div>



            </form>

        </div>
    </div>

@endsection