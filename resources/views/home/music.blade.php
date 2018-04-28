<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>音乐列表</title>

    <link rel="stylesheet" type="text/css" href="{{url('dist/css/scroll.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('dist/css/xiami.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('dist/css/bootstrap.css')}}">

    <script type="text/javascript" src="{{url('js/jquery-1.10.2.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{url('js/scroll.js')}}"></script>
    <script type="text/javascript" src="{{url('js/canvas.js')}}"></script>
    <script type="text/javascript" src="{{url('js/mousewheel.js')}}"></script>

    <script type="text/javascript" src="{{url('js/xiami.js')}}"></script>
    <script type="text/javascript" src="{{url('dist/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{url("js/test.js")}}"></script>
    <style>
        body {
            padding-right:0!important;
        }
        .top{width:100%; height:89px;}
        .top_body{width:935px; height:59px; margin:15px auto; }
        .navbar-nav{margin-left:160px;}
        .input-group{width:400px; padding-top:15px;padding-left:80px; float:left}
        .right ul li{list-style:none; display:block; float:left; line-height:64px; padding-left:30px;}
        .right a{ text-decoration:none; color:#666; font-size:14px;}
        .right a:hover{ color:#F00;}
        .btn{margin-top:14px; margin-left:12px; float:left}
        .control a:hover{cursor: pointer;text-decoration: none; }
        .footer{display: none;}
    </style>
</head>
<div class="top" name="top">
    <div class="top_body">
        <div class="logo"style="float: left;">
            <a href="{{url('/home')}}"><img src="/homestyle/images/logo.PNG" height="59px"></a>
        </div>
        <form action="{{url('/search')}}" method="get" name="searchform" id="searchform">
        <div class="input-group">
            <input type="text" class="form-control" name="music_name" placeholder="输入音乐名称">
            <a id="serach_music" href="#" class=" input-group-addon"><span class="glyphicon glyphicon-search"></span></a>
        </div>
        </form>
        <!-- <div class="right">
            <ul>
                <li><a target="_blank" href="#">客服12中心</a></li>
                <li><a target="_blank" href="#">招贤12纳士</a></li>
                <li><a target="_blank" href="#">会员12中心</a></li>
            </ul>
        </div> -->
        <div style="padding-top:22px; float:right">
            @if(Auth::check())
                <a href="{{url('/home/info')}}">{{Auth::user()->nickname}}&nbsp;</a>你好
               <!--   <a  href="{{route('logout')}}"><span class="glyphicon glyphicon-log-in"></span> 退&nbsp;出</a>-->
               <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
            @else
            <a  href="{{url("login")}}" ><span class="glyphicon glyphicon-user"></span> 登&nbsp;录</a>
            <a  href="{{url('register')}}"><span class="glyphicon glyphicon-log-in"></span> 注&nbsp;册</a>
           @endif
        </div>
    </div>

</div>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div>
            <ul class="nav navbar-nav nav-pills">
                <li id="sy"><a href="{{url('/home')}}">首页</a></li>
                <li id="gs"><a href="{{url('/singer')}}">歌手</a></li>
                <li id="gq" class="active"><a href="{{url('/music')}}">歌曲</a></li>
             </ul>
        </div>
    </div>
</nav>



<div class="playerMain">
    <div class="middle">
        <div class="mainWrap">
            <div class="leftBar">
                <div class="cellectList"></div>
                <audio id="audio" src="http://zjdx1.sc.chinaz.com/Files/DownLoad/sound1/201507/6065.mp3"></audio>
            </div>
            <div class="mainBody">
                <div class="playHd">
                    <div class="phInner">
                        <div class="col">歌曲(50)</div>
                        <div class="col">演唱者</div>
                        <div class="col">专辑</div>
                    </div>
                </div>
                <div class="playBd">
                    <div class="scrollView">
                        <!-- <div class="scroll"></div> -->
                        <ul class="songUL" >
                            @foreach($lists as $k=> $list)
                            <li class="songList">
                                <div class="songLMain">
                                    <div class="check">
                                        <input class="checkIn" type="checkbox" select="0" style="margin-bottom: 5px;">
                                    </div>
                                    <div class="start" >
                                        <em sonN="{{++$k }}" son="{{url($list->m_img)}}" a_img="{{url('/upload/feedback/').'/'.$list->a_img}}"
                                            song_resource="{{url($list->source)}}" s_lrc="{{$list->lrc}}">{{$k}}</em>

                                    </div>
                                    <div class="songBd">
                                        <div class="col colsn">{{$list->m_name}}</div>
                                        <div class="col colcn">{{$list->s_name}}</div>
                                        <div class="col">{{$list->a_name}}</div>
                                    </div>
                                    <div class="control">
                                        <a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;"href="{{url('/music/'.$list->m_id)}}">查看</a>
                                    </div>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                <div class="playFt">
                    <div class="track">
                        <div class="uiCheck">
                            <input class="checkAll" type="checkbox" select="0">
                        </div>
                        <div class="uiItem">
                            <a href="javascript:void(0)" class="itIcon itDele">删除</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mainOuther">
                <div class="albumCover">
                    歌曲
                    <a href="#">
                        <img src="upload/feedback/70X58PICSpZ.png" id="canvas1" width="150" height="150">
                    </a>
                </div>
                <div class="albumSale">

                       专辑 <img src="upload/feedback/114102F923410L.png" width="100" height="50" id="canvas2">

                </div>
                 <div id="lyr" ></div> 
            </div>
        </div>
    </div>
    <div class="bottom">
        <div class="playerWrap">
            <div class="playerCon">
                <a href="#" class="pbtn prevBtn"></a>
                <a href="#" class="pbtn playBtn" isplay="0"></a>
                <a href="#" class="pbtn nextBtn"></a>
                <a href="#" class="mode"></a>
            </div>
            <div class="playInfo">
                <div class="trackInfo">
                    <a href="#" class="songName">漂洋过海来看你(Live)</a>
                    -
                    <a href="#" class="songPlayer">刘明湘</a>

                </div>
                <div class="playerLength">
                    <div class="position">00:00</div>
                    <div class="progress" style="background: #89beb2">
                        <div class="pro1"></div>
                        <div class="pro2">
                            <a href="#" class="dian"></a>
                        </div>
                    </div>
                    <div class="duration">03:35</div>
                </div>
            </div>
            <div class="vol">

                <div class="volm">
                    <div class="volSpeaker"></div>
                    <div class="volControl">
                        <a href="#" class="dian2"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
// window.onload=function(){
//     document.getElementById("gq").setAttribute('class','active');
// }
</script>
