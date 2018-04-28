<!DOCTYPE html>
<html lang="en"><head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title')</title>
<link rel="stylesheet" href="{{url('/homestyle/bootstrap-3.3.5-dist/dist/css/bootstrap.min.css')}}">
<script src="{{url('/homestyle/jquery-3.1.1/jquery-3.1.1.min.js')}}"></script>
<script src="{{url('/homestyle/bootstrap-3.3.5-dist/dist/js/bootstrap.min.js')}}"></script>

<style>
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

    .shenti{width:100%; height:440px; }
    .shenti .content{width:1000px; height:390px; margin:40px auto; }
    .shenti .content .songlist{width:650px; height:390px; float:left;}
    .shenti .content .songlist .Big{float:left;}
    .shenti .content .songlist .Big:hover{box-shadow:0 0 10px 5px #fe476A;}
    .shenti .content .songlist .Small{float:left; margin:0 5px 10px 5px;}
    .shenti .content .songlist .Small:hover{box-shadow:0 0 10px 5px #00bfff;}
    .shenti .content .list-title{height:30px; line-height:55px;padding-bottom: 60px; font-size:18px}
    .shenti .content .hotsonglist{width:320px; height:385px;float:left;margin-left:25px;}
    .shenti .content .hotsonglist .hotitem{width:320px; height:98px; border:1px solid red; margin-top:10px;}

    .footer{width:100%; height:112px; background-color:#000;}
    .footer .link{margin:0 auto; width:1090px; height:49px;}
    .footer a{display:block; line-height:49px; text-decoration:none;float:left; margin-left:20px; color:#b1b3b9;}
    .footer a:hover{color:#376DFB;}
    .footer span{display:block; float:left; line-height:49px; margin-left:10px;color: #b1b3b9;}
    .footer .copyright{  padding-top:1px; border-top:0.5px solid #3d424a;padding-top:45px;}
    .footer .copyright p{color: #b1b3b9; text-align:center; line-height:30px; font-size:14px;}
    .back-top{width:83px; height:138px; background:#eee; position:fixed;bottom:100px; right:9%;line-height:50px; cursor:pointer; background:url(/homestyle/images/sprite.png) -111px -5px no-repeat; display:none; z-index:10;}
    .back-top:hover{width:83px; height:138px; background:#eee; position:fixed;bottom:100px; right:9%;line-height:50px; cursor:pointer; background:url(/homestyle/images/sprite.png) 0px 0px no-repeat;}
</style>
    @yield('css')
    
    <!-- Scripts -->
    @yield('script')
</head>
<body>
<!--top start-->
@include("home.layouts.header")
<!--top end-->
        @yield('content')
@include('home.layouts.footer')
    <a href="#top"><div class="back-top"></div></a>
</body>
<script type="text/javascript" src="{{url("js/jquery-1.10.2.js")}}"></script>
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
    
    var count=1;
    var player = null;
    $(function(){
        $(".show").eq(0).css({"z-index":1,"opacity":1});
        $(".btn").find("li").mouseover(function(){
            $(this).addClass("select").siblings().removeClass("select");
            $(".show").css({"z-index":0,"opacity":0});
            $(".show").eq($(this).index()).css({"z-index":1}).fadeTo(800,1);
            count = $(this).index()+1;
            clearInterval(player);
        }).mouseout(function(){
            auto_banner();
        });
        auto_banner();
    });
    function auto_banner(){
        player = setInterval(function(){
            if(count>2){
                count = 2;
            }
            $(".show").css({"z-index":0,"opacity":0});
            $(".show").eq(count).css({"z-index":1}).fadeTo(800,1);
            $(".btn").find("li").removeClass("select");
            $(".btn").find("li").eq(count).addClass("select");
            if(count == 2){
                count = 0;
            }
            else {
                count ++;
            }
        },2000);
    }

    
        $("#serach_music").click(function(){
            //alert(0);
            document.getElementById("searchform").submit();    
        })
    
</script>
</html>