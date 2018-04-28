<!doctype html>
<html lang="en">

<head>
	<title>Profile | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	
	<script src="{{url('/homestyle/jquery-3.1.1/jquery-3.1.1.min.js')}}"></script>
	<script src="{{url('/homestyle/bootstrap-3.3.5-dist/dist/js/bootstrap.min.js')}}"></script>
	<!-- VENDOR CSS -->
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
	<style type="text/css">
		body {
			padding-right:0!important;
		}
		.top{width:100%; height:89px;}
		.top_body{width:920px; height:59px; margin:15px auto; }
		.navbar-nav{margin-left:160px;}
		.input-group{width:400px; padding-top:15px;padding-left:80px; float:left}
		.right ul li{list-style:none; display:block; float:left; line-height:64px; padding-left:30px;}
		.right a{text-decoration:none; color:#666; font-size:14px;}
		.right a:hover{ color:#F00;}


		.daohang{height:445px; width:100%;margin:auto;}
		.banner{ width:100%; height:445px; position:relative;margin:-10px 0px 0 -40px;}
		.banner ul li{display:block;}
		.banner ul li a{ width:100%; height:445px;display:block;}
		.banner ul .show{ width:100%; height:445px; position:absolute;}
		.banner .btn{height:30px; position:absolute; left:44%; bottom:8px; z-index:2;}
		.banner .btn ul li{ list-style:none; float:left; margin-left:5px; background:url("/homestyle/images/btn1.png") no-repeat; width:16px; height:16px;}
		.banner .btn ul .select{background:url("/homestyle/images/btn2.png") no-repeat;}

		.footer{width:100%; height:112px; background-color:#000;}
		.footer .link{margin:0 auto; width:1090px; height:49px;}
		.footer a{display:block; line-height:49px; text-decoration:none;float:left; margin-left:20px; color:#b1b3b9;}
		.footer a:hover{color:#376DFB;}
		.footer span{display:block; float:left; line-height:49px; margin-left:10px;color: #b1b3b9;}
		.footer .copyright{  padding-top:1px; border-top:0.5px solid #3d424a;padding-top:45px;}
		.footer .copyright p{color: #b1b3b9; text-align:center; line-height:30px; font-size:14px;}
	</style>
</head>
<body>
	<div class="top" name="top">
		<div class="top_body">
			<div class="logo"style="float: left;">
				<a href="{{url('/home')}}"><img src="/homestyle/images/logo.PNG" height="59px"></a>
			</div>
			<div class="input-group">
				<input type="text" class="form-control">
				<a href="#" class=" input-group-addon"><span class="glyphicon glyphicon-search"></span></a>
			</div>
			
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
				<li><a href="{{url('/home')}}">首页</a></li>
				<li><a href="{{url('/singer')}}">歌手</a></li>
				<li><a href="{{url('/music')}}">歌曲</a></li>
				
			</ul>
		</div>
	</div>
</nav>
<!-- WRAPPER -->
<script type="text/javascript">
	function imgPreview(fileDom){
        //判断是否支持FileReader
        if (window.FileReader) {
        	var reader = new FileReader();
        } else {
        	alert("您的设备不支持图片预览功能，如需该功能请升级您的设备！");
        }

        //获取文件
        var file = fileDom.files[0];
        var imageType = /^image\//;
        //是否是图片
        if (!imageType.test(file.type)) {
        	alert("请选择图片！");
        	return;
        }
        if(file.size > 1024 * 1024 * 2) {
        	alert('图片大小不能超过 2MB!');
        	return;
        }
        //读取完成
        reader.onload = function(e) {
            //获取图片dom
            var img = document.getElementById("preview");
            //图片路径设置为读取的图片
            img.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
</script>
<div id="wrapper">
	<!-- MAIN -->
	<div class="main" style="width: calc(75%);padding-top: 1px;left: -150px;background:#fff;">
		<!-- MAIN CONTENT -->
		<div class="main-content" style="padding: 5px 150px 28px 150px;">
			<div class="container-fluid">
				<div class="panel panel-profile">
				    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
					<div class="clearfix">
						<!-- RIGHT COLUMN -->
						<div class="profile-right" style="width:85%;min-height: 300px;padding: 15px 50px 15px 1px;margin: 15px 50px 15px 1px">
							<h4 class="heading">用户信息</h4>
							<!-- TABBED CONTENT -->
							<div class="custom-tabs-line tabs-line-bottom left-aligned">
								<ul class="nav" role="tablist">
									<li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">个人资料</a></li>
									<li><a href="#tab-bottom-left2" role="tab" data-toggle="tab">修改信息</a></li>
									<li><a href="#tab-bottom-left3" role="tab" data-toggle="tab">修改密码</a></li>
								</ul>
							</div>
							<div class="tab-content">
								<div class="tab-pane fade in active" id="tab-bottom-left1">
									<div class="panel">
										<div class="panel-body">
											<div class="profile-main" style="float: right">
												<img id="preview" @if($user->avatar == null)src="/upload/avatar/user.png" @else src="{{$user->avatar}}" @endif class="img-circle" alt="Avatar" style="width: 50px;height: 50px; position: relative; top:10px; left: -20px">
											</div>
											用户名：<p style="font-weight: 700">{{$user->name}}</p>
											<br>
											昵称：<p style="font-weight: 700">{{$user->nickname}}</p>
											<br>
											E-mail：<p style="font-weight: 700">{{$user->email}}</p>
											<br>
											性别：<p style="font-weight: 700">@if($user->gender == 0) 男 @else 女 @endif</p>
											<br>
											手机号码：<p style="font-weight: 700">@if($user->phone == null) 无 @else {{$user->phone}} @endif</p>
											<br>
											<div id="panel-scrolling-demo" class="panel">
												个性签名：
												@if($user->desc == null)
												<div class="panel-body">
													<p style="font-weight: 700">主人很懒，什么都没留下~</p>
												</div>
												@else
												<div class="panel-body">
													<p style="font-weight: 700">{{$user->desc}}</p>
												</div>
												@endif
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="tab-bottom-left3">
									<form action="{{url('/home/modifypwd/'.$user->id)}}" method="POST" name="passwordform" >
										{{ csrf_field() }}
									<div class="panel">
										<div class="panel-body">
											用户名：<input class="form-control" placeholder="用户名" type="text"  name="name" required>
											<br>
											原密码：<input class="form-control" placeholder="原密码" type="password" name="oldpassword" required>
											<br>
											新密码：<input class="form-control" placeholder="新密码" type="password" name="newpassword" required>
											<br>
											确认密码：<input class="form-control" placeholder="确认密码" type="password" name="comfirmpassword" required>
											<br>
											<div class="input-group">
												<span class="input-group-btn"><button class="btn btn-primary" type="submit">保存修改</button></span>
											</div>
										</div>
									</div>
									</form>
								</div>
								<div class="tab-pane fade" id="tab-bottom-left2">
									<form action="{{url('/home/info/'.$user->id)}}" method="POST" name="infoform" enctype="multipart/form-data">
										{{ csrf_field() }}
										<input type="hidden" value="PUT" name="_method">
										<div class="panel">
											<div class="panel-body">
												<div class="profile-main" style="float: right">
													<img id="preview" @if($user->avatar == null)src="/upload/avatar/user.png" @else src="{{$user->avatar}}" @endif class="img-circle" alt="Avatar" style="width: 50px;height: 50px; position: relative;left: 20px">
													<br>
													<a href="javascript:;" class="file">点击更换头像
														<input type="file" name="avatar" id="" name="file" onchange="imgPreview(this)" multiple accept="image/*">
													</a>
												</div>
												<br>
												<br>
												用户名：<p style="font-weight: 700">{{$user->name}}</p>
												<br>
												注册邮箱：<p style="font-weight: 700">{{$user->email}}</p>
												<br>
												昵称：<input class="form-control" placeholder="Name" type="text" value="{{$user->nickname}}" name="nickname" required>
												<br>

												性别：
												<label class="fancy-radio">
													<input name="gender" value="0" type="radio" @if($user->gender == 0) checked @endif>
													<span><i></i>男</span>
												</label>
												<label class="fancy-radio">
													<input name="gender" value="1" type="radio" @if($user->gender == 1) checked @endif>
													<span><i></i>女</span>
												</label>
												<br>
												手机号码：<input class="form-control" placeholder="phone" type="text" value="{{$user->phone}}" name="phone">
												<br>
												个性签名：<textarea class="form-control" placeholder="描述" rows="4" name="desc">{{$user->desc}}</textarea>
												<br>
												<div class="input-group">
													<span class="input-group-btn"><button class="btn btn-primary" type="submit">保存修改</button></span>
												</div>
											</div>
										</form>
									</div>

								</div>
								<!-- END TABBED CONTENT -->
							</div>
							<!-- END RIGHT COLUMN -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
	</div>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->
<div class="footer" style="float: left">
	<div class="copyright">
		<p>Copyright&nbsp;&nbsp;&copy;&nbsp;&nbsp;2004-2017 KuGou-Inc.All Rights Reserved  </p>
	</div>
</div>
<script src="assets/vendor/jquery/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="assets/scripts/klorofil-common.js"></script>
</body>

</html>
