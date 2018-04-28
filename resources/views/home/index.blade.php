@extends("home.layouts.app")
@section('title')
    首页
@endsection
@section('css')
@endsection
@section('script')
@parent
@endsection
@section('content') 

    <div class="daohang">
        <div class="banner">
            <ul>
                <li class="show"><a href="http://www.kugou.com/shop/product/kugouproduct/index.html?mm_gxbid=1_1323482_621dc6654f27932b7379cf4dac6555c3" style="background:url(/homestyle/images/nav1.jpg) no-repeat center top "></a></li>
                <li class="show" style="opacity:0;"><a href="http://fanxing.kugou.com/1239263" style="background:url(/homestyle/images/nav2.jpg) no-repeat center top "></a></li>
                <li class="show" style="opacity:0;"><a href="#" style="background:url(/homestyle/images/nav3.jpg) no-repeat center top  "></a></li>
            </ul>
            <div class="btn">
                <ul>
                    <li class="select"></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="shenti">
        <div class="content">
            <div class="songlist">
                <div class="list-title">
                    <span class="text-info">精选歌曲</span>
                </div>
                <div class="song">
                    <div class="Big" style="position: relative;width: 325px;height: 325px;">
                        <a href="music/1"><img src="/homestyle/images/xue1.jpg" width="325" height="325"></a>
                        <p style="position: relative; bottom: 30px;width:325px;height: 30px; background: rgba(0,0,0,.5);color: white;line-height: 30px;">&nbsp;&nbsp;薛之谦-演员&nbsp;&gt;</p>
                    </div>
                    <div class="Small">
                        <a href="{{url('/music/5')}}"><img src="/homestyle/images/song2.jpg" width="150" height="156"></a>
                    </div>
                    <div class="Small">
                        <a href="{{url('/music/4')}}"><img src="/homestyle/images/song3.jpg" width="150" height="156"></a>
                    </div>
                    <div class="Small">
                        <a href="{{url('/music/4')}}"><img src="/homestyle/images/song4.jpg" width="150" height="156"></a>
                    </div>
                    <div class="Small">
                        <a href="{{url('/music/5')}}"><img src="/homestyle/images/song5.jpg" width="150" height="156"></a>
                    </div>
                </div>
            </div>
            <div class="hotsonglist">
                <div class="list-title">
                    <span class="text-danger">热门歌曲</span>
                </div>
                <div class="hotitem">
                    <a href="{{url('/music/6')}}"><img src="/upload/img/149985279322.jpg" width="320" height="98"></a>
                </div>
                <div class="hotitem">
                    <a href="{{url('/music/7')}}"><img src="/upload/img/149985296078.jpg" width="320" height="98"></a>
                </div>
                <div class="hotitem">
                    <a href="{{url('/music/8')}}"><img src="/upload/img/149985305151.jpg" width="320" height="98"></a>
                </div>
                
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
window.onload=function(){
    document.getElementById("sy").setAttribute('class','active');
}
</script>