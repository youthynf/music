<html>
<head>
<title>歌曲</title>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="{{url('homestyle/css/scroll.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('homestyle/css/xiami.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('homestyle/bootstrap-3.3.5-dist/dist/css/bootstrap.css')}}">

<script type="text/javascript" src="{{url('homestyle/js/jquery-1.10.2.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/canvas.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/mousewheel.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/scroll.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/js/xiami.js')}}"></script>
<script type="text/javascript" src="{{url('homestyle/bootstrap-3.3.5-dist/dist/js/bootstrap.js')}}"></script>
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
</head>
<body>
	<!--模糊画布-->
	
	<div class="playerMain">
		
    <div class="top">
    <div class="top_body">
		<div class="logo"style="float: left;">
			<a href='首页.html'><img src="/homestyle/images/logo.PNG" height="59px"></a>
		</div>
		<div class="input-group"	>
			<input type="text" class="form-control">
			<a href="#" class=" input-group-addon"><span class="glyphicon glyphicon-search"></span></a>
		</div>
        <div class="right">
			<ul>
				<li><a target="_blank" href="#">客服中心</a></li>
				<li><a target="_blank" href="#">招贤纳士</a></li>
				<li><a target="_blank" href="#">会员中心</a></li>
			</ul>
		</div>
        <div style="padding-top:22px; float:right;margin-right: 15px;">
        	<!--<button class="btn btn-info">登录</button>-->
            <!--<button class="btn btn-danger">注册</button>-->
            <a href=""><span class="glyphicon glyphicon-log-in"></span> 登&nbsp;录</a>
            <a href=""><span class="glyphicon glyphicon-user"></span> 注&nbsp;册</a>
        </div>
   	</div>
	</div>
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div>
			<ul class="nav navbar-nav nav-pills">
			 	<li><a href="首页.html">首页</a></li>
			 	<li><a href="singer1.html">歌手</a></li>
			 	<li class="active"><a href="#">歌曲</a></li>
			 	<li><a href="#">呵呵</a></li>
			 </ul>
		</div>
	</div>
</nav>   
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
							<ul class="songUL">
								<li class="songList">
									<div class="songLMain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start" >
											<em sonN="1">1</em>
										</div>
										<div class="songBd">
											<div class="col colsn">盛夏光年</div>
											<div class="col colcn">陈冰</div>
											<div class="col">好声音第三季</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>									
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start" >
											<em sonN="2">2</em>
										</div>
										<div class="songBd">
											<div class="col colsn">漂洋过海来看你(Live)</div>
											<div class="col colcn">刘明湘</div>
											<div class="col">好声音第三季</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="3">3</em>
										</div>
										<div class="songBd">
											<div class="col colsn">Autobots Reunite</div>
											<div class="col colcn">Steve Jablonsky</div>
											<div class="col">《变形金刚4：绝迹重生》</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="4">4</em>
										</div>
										<div class="songBd">
											<div class="col colsn">Halo</div>
											<div class="col colcn">Martin</div>
											<div class="col">Halo Legends:</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="5">5</em>
										</div>
										<div class="songBd">
											<div class="col colsn">Pearl White Story</div>
											<div class="col colcn">S.E.N.S</div>
											<div class="col">君に届け 2ND SEASON </div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="6">6</em>
										</div>
										<div class="songBd">
											<div class="col colsn">break the sword of justice</div>
											<div class="col colcn">梶浦由記</div>
											<div class="col">NHKアニメーショ</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="7">7</em>
										</div>
										<div class="songBd">
											<div class="col colsn">The children</div>
											<div class="col colcn">Ramin Djawadi</div>
											<div class="col">《权力的游戏第四季》</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="8">8</em>
										</div>
										<div class="songBd">
											<div class="col colsn">Pacific Rim</div>
											<div class="col colcn">Ramin Djawadi</div>
											<div class="col">《环太平洋》</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="9">9</em>
										</div>
										<div class="songBd">
											<div class="col colsn">四つ葉のクローバー</div>
											<div class="col colcn">林有三</div>
											<div class="col">ハチミツとクロ</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="10">10</em>
										</div>
										<div class="songBd">
											<div class="col colsn">Icarus</div>
											<div class="col colcn">Ivan Torrent</div>
											<div class="col">Icarus</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList">
									<div class="songLmain">
										<div class="check">
											<input class="checkIn" type="checkbox" select="0">
										</div>
										<div class="start">
											<em sonN="11">11</em>
										</div>
										<div class="songBd">
											<div class="col colsn">th3 awak3n1ng</div>
											<div class="col colcn">Ivan Torrent</div>
											<div class="col">Icarus</div>
										</div>
										<div class="control">
											<a class="glyphicon glyphicon-search" style="color:#87CEFA; margin-top:12px;">查看</a>
										</div>
									</div>
								</li>
								<li class="songList"></li>
							</ul>
						</div>
					</div>
					<div class="playFt">
						<div class="track">
							<div class="uiCheck">
								<input class="checkAll" type="checkbox" select="0">
							</div>
							<div class="uiItem">
								<a href="#" class="itIcon itDele">删除</a>
							</div>
							<div class="uiItem">
								<a href="#" class="itIcon itShou">收藏</a>
							</div>
							<div class="uiItem">
								<a href="#" class="itIcon itJin">添加到精选集</a>
							</div>
							<div class="uiItem">
								<a href="#" class="itIcon itMore">更多</a>
							</div>
						</div>
					</div>
				</div>
				<div class="mainOuther">
					<div class="albumCover">
						<a href="#">
							<img src="homestyle/images/2.jpg" id="canvas1">
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
						<div class="progress">
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

</body>
</html>