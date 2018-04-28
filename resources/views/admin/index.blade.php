<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Insert title here</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script src="jquery-3.1.1/jquery-3.1.1.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>

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

        .shenti{height:500px; width:1170px;margin:auto; border:1px solid red;}

        .footer{width:100%; height:289px; background-color:#000;}
        .footer .link{margin:0 auto; width:1090px; height:49px;}
        .footer a{display:block; line-height:49px; text-decoration:none;float:left; margin-left:20px; color:#b1b3b9;}
        .footer a:hover{color:#376DFB;}
        .footer span{display:block; float:left; line-height:49px; margin-left:10px;color: #b1b3b9;}
        .footer .copyright{ height:195px; padding-top:1px; border-top:0.5px solid #3d424a;padding-top:45px;}
        .footer .copyright p{color: #b1b3b9; text-align:center; line-height:30px; font-size:14px;}
        .back-top{width:83px; height:138px; background:#eee; position:fixed;bottom:285px; right:9%;line-height:50px; cursor:pointer; background:url(images/sprite.png) -111px -5px no-repeat; display:none;}
        .back-top:hover{width:83px; height:138px; background:#eee; position:fixed;bottom:285px; right:9%;line-height:50px; cursor:pointer; background:url(images/sprite.png) 0px 0px no-repeat;}
    </style>
</head>
<body>
<!--top start-->
<div class="top">
    <div class="top_body">
        <div class="logo"style="float: left;">
            <a href="#"><img src="images/logo.PNG" height="59px"></a>
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
            @if(Auth::check())
                <a href="">{{Auth::user()->nickname}}&nbsp;你好</a>
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


    <!--start登录的弹框-->

    <!--登陆弹框end-->

    <!--start注册弹框-->

    <!--注册弹框end-->
</div>
<!--end top-->
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div>
            <ul class="nav navbar-nav nav-pills">
                <li class="active"><a href="#">首页</a></li>
                <li><a href="#">网站</a></li>
                <li><a href="#">分享</a></li>
                <li><a href="#">呵呵</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="shenti">

</div>

<div class="footer">
    <div class="link">
        <a href="#">关于酷狗</a><span>|</span>
        <a href="#">广告服务</a><span>|</span>
        <a href="#">版权指引</a><span>|</span>
        <a href="#">隐私政策</a><span>|</span>
        <a href="#">用户服务协议</a><span>|</span>
        <a href="#">推广合作</a><span>|</span>
        <a href="#">酷狗音乐人</a><span>|</span>
        <a href="#">酷狗音乐推</a><span>|</span>
        <a href="#">招聘信息</a><span>|</span>
        <a href="#">客服中心</a><span>|</span>
        <a href="#">用户提升计划</a><span>|</span>
    </div>
    <div class="copyright">
        <p>我们致力于推动网络正版音乐发展，相关版权合作请联系copyrights@kugou.com</p>
        <p>信息网络传播视听节目许可证 1910564 增值电信业务经营许可证粤B2-20060339 &nbsp;&nbsp;&nbsp;</p>
        <p>广播电视节目制作经营许可证（粤）字第01270号&nbsp;&nbsp;&nbsp;&nbsp;营业性演出许可证穗天演440106026</p>
        <p>穗公网监备案证第44010650010167&nbsp;&nbsp;&nbsp;&nbsp;互联网药品信息服务资格证编号（粤）-非经营性-2012-0018</p>
        <p>Copyright&nbsp;&nbsp;&copy;&nbsp;&nbsp;2004-2017 KuGou-Inc.All Rights Reserved  </p>
    </div>
</div>
<div class="back-top"></div>
</body>
<script type="text/javascript" src="jquery-3.1.1/jquery-3.1.1.min.js"></script>
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

    $(document).ready(function() {
        $(".btn-info").click(function(){
            //alert("hello");

        })
    });
</script>
</html>