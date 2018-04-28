@extends('home.layouts.app')
@section('title')
    音乐详情
@endsection
@section('css')
@endsection
@section('script')
@endsection
@section('content');
<head>
    <script src="{{url('/homestyle/jquery-3.1.1/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('/homestyle/bootstrap-3.3.5-dist/dist/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{url('/admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('/admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('/admin/assets/vendor/linearicons/style.css')}}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{url('/admin/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{url('/admin/assets/css/choosefile.css')}}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{url('/admin/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{url('/admin/assets/img/favicon.png')}}">
    <link rel="stylesheet" href="{{url('/homestyle/bootstrap-3.3.5-dist/dist/css/bootstrap.min.css')}}">
</head>
<style>
    .navbar-nav{margin-left: 160px;}
    
</style>
<div id="wrapper">
    <!-- MAIN -->
    <div class="main" style="width: calc(70%);padding: 10px 150px 1px 1px;margin: 0px auto;left: -120px">
        <!-- MAIN CONTENT -->
        <div class="main-content" style="padding: 10px auto;">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left" style="width: 25%;background-color: #FFF;">
                            <div class="profile-header">
                                <div class="profile-main" style="background-image: url('.');position: relative;top: 100px">
                                    <img src="{{url($list->m_img)}}" class="img-circle" alt="Avatar" style="width: 150px;height: 150px">
                                    <br>

                                </div>
                            </div>
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right" style="width: 75%;min-height: 800px;padding-top: 15px;padding-left: 30px">
                            <p style="font-weight: 800;font-size: 30px"><img src="{{url('songImage/song.png')}}" style="width: 60px;height: 25px">{{$list->m_name}}</p>
                            <div class="panel-body">
                                歌手：<a href="{{url('/singer/'.$list->s_id)}}" style="font-weight: 700;font-size: 13px">{{$list->s_name}}</a>
                                <br>
                                <br>
                                所属专辑：<a href="javascript:void(0)" style="font-weight: 700;font-size: 13px">{{$list->a_name}}</a>
                                <br>
                                <br>
                                <!-- <p class="demo-button">
                                    <button type="button" class="btn btn-primary"><i class="fa fa-refresh"></i> 播放</button>
                                    <button type="button" class="btn btn-primary"><i class="fa fa fa-plus-square"></i> 添加到播放列表</button>
                                    <button type="button" class="btn btn-default"><i class="fa fa-plus-square"></i> 收藏 </button>
                                    <button type="button" class="btn btn-info"><i class="fa fa-download"></i> 下载</button>
                                </p> -->
                                <br>
                                <audio  src="{{$list->source}}"  width="300" height="75" controls="controls"></audio>
                                <div>
                                   {!! $con !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- RIGHT CONTENT -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN -->
    <div class="clearfix"></div>
</div>


@endsection
