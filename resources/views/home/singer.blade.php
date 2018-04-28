<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Insert title here</title>
<link rel="stylesheet" href="{{url('homestyle/bootstrap-3.3.5-dist/dist/css/bootstrap.min.css')}}">
<script src="{{url('homestyle/jquery-3.1.1/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('homestyle/bootstrap-3.3.5-dist/dist/js/bootstrap.min.js')}}"></script>

<style>
	body {
    padding-right:0!important;
	}
	.top{width:100%; height:89px;}
	.top_body{width:920px; height:59px; margin:15px auto; }
	.navbar-nav{margin-left:160px;}
	.input-group{width:400px; padding-top:15px;padding-left:80px; float:left}
	.right ul li{list-style:none; display:block; float:left; line-height:64px; padding-left:30px;}
	.right a{ text-decoration:none; color:#666; font-size:14px;}
	.right a:hover{ color:#F00;}
	.btn{margin-top:14px; margin-left:12px; float:left}
	
	.shenti{height:500px; width:1170px;margin:auto;font-size:14px; font-family: "微软雅黑";}
	.shenti .l{width:150px;float:left; margin-right:50px;}
	.shenti .l .nav{margin-bottom:25px;}
	.hover{background: #85d2f2!important;}
	.shenti .l ul li a:hover{background: #85d2f2!important;}
	.shenti .r{float:left; width:960px; height:400px;}
	.r .list{list-style:none; display:block; float:left; width:220px;  margin-left:15px; margin-top:5px;padding-left:0px;}
	.r .list a{text-decoration:none;}
	.r .list li img:hover{box-shadow:0 0 10px 5px #87CEEB;}
	
	.footer{width:100%;  background-color:#000;}
	.footer .link{margin:0 auto; width:1090px; height:49px;}
	.footer a{display:block; line-height:49px; text-decoration:none;float:left; margin-left:20px; color:#b1b3b9;}
	.footer a:hover{color:#376DFB;}
	.footer span{display:block; float:left; line-height:49px; margin-left:10px;color: #b1b3b9;}
	.footer .copyright{ height:112px; padding-top:1px; border-top:0.5px solid #3d424a;padding-top:45px;}
	.footer .copyright p{color: #b1b3b9; text-align:center; line-height:30px; font-size:14px;}
	.back-top{width:83px; height:138px; background:#eee; position:fixed;bottom:100px; right:9%;line-height:50px; cursor:pointer; background:url(/homestyle/images/sprite.png) -111px -5px no-repeat; display:none; z-index:10;}
	.back-top:hover{width:83px; height:138px; background:#eee; position:fixed;bottom:100px; right:9%;line-height:50px; cursor:pointer; background:url(/homestyle/images/sprite.png) 0px 0px no-repeat;}
</style>
</head>
<body>
<!--top start-->
<div class="top" name="top">
	<div class="top_body">
		<div class="logo"style="float: left;">
			<a href='首页.html'><img src="images/logo.PNG" height="59px"></a>
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
        <div style="padding-top:22px; float:right">
        	<!--<button class="btn btn-info">登录</button>-->
            <!--<button class="btn btn-danger">注册</button>-->
            <a href=""><span class="glyphicon glyphicon-log-in"></span> 登&nbsp;录</a>
            <a href=""><span class="glyphicon glyphicon-user"></span> 注&nbsp;册</a>
        </div>
	</div>
</div>
<!--end top-->
<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div>
			<ul class="nav navbar-nav nav-pills">
			 	<li><a href="首页.html">首页</a></li>
			 	<li class="active"><a href="singer1.html">歌手</a></li>
			 	<li><a href="music.html">歌曲</a></li>
			 	<li><a href="#">呵呵</a></li>
			 </ul>
		</div>
	</div>
</nav>
   
   
    <div class="shenti">
    	<div class="l">
	    	<ul class="nav nav-pills nav-stacked">
	    		<li><a class="hover" href="#">华语歌手</a></li>
	    		<li><a href="#">港台列表</a></li>
	    		
	    	</ul>
	    	<ul class="nav nav-pills nav-stacked">
	    		<li><a href="#">日本列表</a></li>
	    		<li><a href="#">美国列表</a></li>
	    		<li><a href="#">英国列表</a></li>
	    	</ul>
	    </div>
    	<div class="r">
    		<ul class="list">
    			<li><a href="singer_info.html"><img src="/homestyle/images/xue1.jpg" width="220" height="175"></a></li>
    			<a href="#"><span class="text-success" style="font-size:16px;">薛之谦</span></a>
    		</ul>
    		<ul class="list">
    			<li><a href="#"><img src="/homestyle/images/zhou1.jpg" width="220" height="175"></a></li>
    			<a href="#"><span class="text-success" style="font-size:16px;">薛之谦</span></a>
    		</ul>
    		<ul class="list">
    			<li><a href="#"><img src="/homestyle/images/zhou1.jpg" width="220" height="175"></a></li>
    			<a href="#"><span class="text-success" style="font-size:16px;">薛之谦</span></a>
    		</ul>
    		<ul class="list">
    			<li><a href="#"><img src="/homestyle/images/zhou1.jpg" width="220" height="175"></a></li>
    			<a href="#"><span class="text-success" style="font-size:16px;">薛之谦</span></a>
    		</ul>
    		<ul class="list">
    			<li><a href="#"><img src="/homestyle/images/zhou1.jpg" width="220" height="175"></a></li>
    			
    		</ul>
    		<ul class="list">
    			<li><a href="#"><img src="/homestyle/images/zhou1.jpg" width="220" height="175"></a></li>
    			
    		</ul>
    		<ul class="list">
    			<li><a href="#"><img src="/homestyle/images/zhou1.jpg" width="220" height="175"></a></li>
    			
    		</ul>
    		<ul class="list">
    			<li><a href="#"><img src="/homestyle/images/zhou1.jpg" width="220" height="175"></a></li>
    			
    		</ul>
    	</div>
    	
    </div>

	<div class="footer">
		<div class="copyright">
			<p>Copyright&nbsp;&nbsp;&copy;&nbsp;&nbsp;2004-2017 KuGou-Inc.All Rights Reserved  </p>
		</div>
	</div>	
    <a href="#top"><div class="back-top"></div></a>
</body>
<script type="text/javascript" src="singer/jquery-3.1.1/jquery-3.1.1.min.js"></script>
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
	
	
</script>
</html>