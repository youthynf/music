
<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>歌手详情</title>

<!-- <link rel="stylesheet" type="text/css" href="{{url('homestyle/css/scroll.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('homestyle/css/xiami.css')}}">
<link rel="stylesheet" href="{{url('homestyle/bootstrap-3.3.5-dist/dist/css/bootstrap.css')}}"> -->

<!-- <script type="text/javascript" src="{{url('homestyle/js/jquery-1.10.2.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/canvas.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/mousewheel.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/scroll.js')}}"></script>
<script src="{{url('homestyle/bootstrap-3.3.5-dist/dist/js/bootstrap.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/xiami1.js')}}"></script> -->
<link rel="stylesheet" type="text/css" href="{{url('dist/css/scroll.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('dist/css/xiami.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('dist/css/bootstrap.css')}}">

    <script type="text/javascript" src="{{url('js/jquery-1.10.2.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{url('js/canvas.js')}}"></script>
    <script type="text/javascript" src="{{url('js/mousewheel.js')}}"></script>
    <script type="text/javascript" src="{{url('js/scroll.js')}}"></script>
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
    </style>
<style>
	
	
	.shenti{height:570px; width:1170px;margin:auto; font-size:14px; font-family: "微软雅黑";}
	.shenti .information{width:785px; height:120px;margin-left:8%; float:left;position: relative;}
	.shenti .information img{display:block; float:left;}
	.intro{ padding:2px 0 0 30px;height: 122px; width: 571px; float:left; overflow:hidden;}
	.shenti .song{ width:1000px; height:374px; margin:20px auto; position:relative;z-index:1;}
	.shenti .song ul li{list-style:none; font-size:14px; font-family:"微软雅黑";height:25; line-height:25px; float:none; margin-top:5px;}
	.shenti .song ul li a{text-decoration:none; color:#000; display:block;}
	.shenti .song ul li a:hover{background:#85CFFC}
	.shenti .song audio{margin-top:20px; width: 400px;position: absolute;bottom:6px;left:22%; display:none;}
	.shenti .showmore{position: absolute;right:2px; top:-7px; cursor: pointer;}
	.shenti .more{
		width:314px; height:253px;position:absolute;right:-250px;top:16px;overflow:scroll; border-radius: 1px;overflow-x: hidden;
		background-color: #fff;box-shadow: 0px 0px 30px #000; display:none;z-index:2;
	}

	
	.footer{width:100%; height:289px; background-color:#000;}
	.footer .link{margin:0 auto; width:1090px; height:49px;}
	.footer a{display:block; line-height:49px; text-decoration:none;float:left; margin-left:20px; color:#b1b3b9;}
	.footer a:hover{color:#376DFB;}
	.footer span{display:block; float:left; line-height:49px; margin-left:10px;color: #b1b3b9;}
	.footer .copyright{ height:195px; padding-top:1px; border-top:0.5px solid #3d424a;padding-top:45px;}
	.footer .copyright p{color: #b1b3b9; text-align:center; line-height:30px; font-size:14px;}
	.back-top{width:83px; height:138px; background:#eee; position:fixed;bottom:100px; right:9%;line-height:50px; cursor:pointer; background:url(/homestyle/images/sprite.png) -111px -5px no-repeat; display:none; z-index:10;}
	.back-top:hover{width:83px; height:138px; background:#eee; position:fixed;bottom:100px; right:9%;line-height:50px; cursor:pointer; background:url(/homestyle/images/sprite.png) 0px 0px no-repeat;}
	
	.control a:hover{cursor: pointer;text-decoration: none;
	</style>
</head>
<body>
	<!--top start-->
	<div class="top" name="top">
		<div class="top_body">
			<div class="logo"style="float: left;">
				<a href='首页.html'><img src="/homestyle/images/logo.PNG" height="59px"></a>
			</div>
			<div class="input-group"	>
				<input type="text" class="form-control">
				<a href="#" class=" input-group-addon"><span class="glyphicon glyphicon-search"></span></a>
			</div>
			<!-- <div class="right">
				<ul>
					<li><a target="_blank" href="#">客服中心</a></li>
					<li><a target="_blank" href="#">招贤纳士</a></li>
					<li><a target="_blank" href="#">会员中心</a></li>
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
<!--end top-->
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div>
			<ul class="nav navbar-nav nav-pills">
				<li><a href="{{url('/home')}}">首页</a></li>
				<li class="active"><a href="{{url('/singer')}}">歌手</a></li>
				<li><a href="{{url('/music')}}">歌曲</a></li>
			</ul>
		</div>
	</div>
</nav>


<div class="shenti">
 	<div class="backsinger" style="margin-bottom:20px; margin-left: 94px;">
		我的位置 >
		<a href="{{url('/singer')}}" title="歌手">歌手</a>
		> 
		<span>{{$singer->name}}</span>
	</div> 
	<div class="information">
		<img alt="" height="120" width="142" src="../upload/feedback/{{$singer->img}}">
		<div class="intro">
			<h4>{{$singer->name}}</h4>
			<span>{{$singer->desc}}</span>

		</div>
		<em class="showmore">查看更多<span class="caret"></span></em>
		<div class="more">

			{{$singer->desc}}
			
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="mainWrap" style="padding: 0px 320px 0 70px; height:300px;">
		<div class="leftBar">
			<div class="cellectList"></div>
			<audio id="audio" src="http://zjdx1.sc.chinaz.com/Files/DownLoad/sound1/201507/6065.mp3"></audio>			
		</div>
		<div class="mainBody">
			<div class="playHd">
				<div class="phInner">
					<div class="col">歌曲(50)</div>
					<div class="col">所属专辑</div>

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
									<input class="checkIn" type="checkbox" select="0" style="margin-bottom:10px;">
								</div>
								<div class="start" >
									<em sonN="{{++$k}}" son="{{url($list->img)}}" a_img="{{url('/upload/feedback/').'/'.$list->a_img}}" song_resource="{{url($list->source)}}" s_lrc="{{$list->lrc}}">{{$k}}</em>
								</div>
								<div class="songBd">
									<div class="col colsn">{{$list->name}}</div>
									<div class="col colcn">{{$list->album_name}}</div>
								</div>
								<div class="control">
									<a href="{{url('/music/'.$list->id)}}" class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
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
					
					
					<!-- <div class="uiItem">
						<a href="#" class="itIcon itJin">添加到精选集</a>
					</div> -->
					

				</div>
			</div>
		</div>
		<div class="mainOuther">
			<div class="albumCover" style="margin-bottom:20px; height:100px;">
				<a href="#">
					<img src="/homestyle/images/2.jpg" id="canvas1" width="100" height="100">
				</a>
			</div>
			<div class="albumSale">
				<a href="#" class="asA">
					<img src="">
				</a>
			</div>
			<div id="lyr"></div>
		</div>
	</div>
</div>


</div>
<div class="bottom" style="height:70px;">
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

<a href="#top"><div class="back-top"></div></a>	

</body>

<script type="text/javascript">
	$(window).scroll(function(){
		var th = $(window).scrollTop();
		if(th>80){
			//alert("hello");	
			$(".back-top").fadeIn();
		}	
		else{
			$(".back-top").fadeOut();
		}
	})
	
	function stopPropagation(e){
		var ev = e||window.event;
		if (ev.stopPropagation) {
			ev.stopPropagation();
		}
		else if (window.event) {
            window.event.cancelBubble = true;//兼容IE
        }

    }
    $(".showmore").click(function (e) {
    	$(".more").toggle();
    	stopPropagation(e);
    });
    $(document).bind('click', function () {
    	$(".more").hide();
    });
    $(".more").click(function (e) {
    	stopPropagation(e);
    });

     /*function movename(){
    	var b = ;
    	alert(b);
    	 //alert($("#one").val());
    	 var a = $("#heas").attr("value");
    	 //alert(a);
    	 $("#mus").prop("src",a);
    	 //alert(0);
    	}*/

    </script>
    </html>