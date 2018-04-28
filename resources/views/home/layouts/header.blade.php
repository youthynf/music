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
                <li id="gq"><a href="{{url('/music')}}">歌曲</a></li>
             </ul>
        </div>
    </div>
</nav>