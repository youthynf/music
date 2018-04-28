@extends("home.layouts.app")
@section('title')
    歌手列表
@endsection
@section('css')
<style>
	.shenti{height:500px; width:1170px;margin:auto;font-size:14px; font-family: "微软雅黑";}
	.shenti .l{width:150px;float:left; margin-right:50px;}
	.shenti .l .nav{margin-bottom:25px;}
	.hover{background: #85d2f2!important;}
	.shenti .l ul li a:hover{background: #85d2f2!important;}
	.shenti .r{float:left; width:960px; height:400px;position: relative;overflow: scroll;overflow-x: hidden;}
	.r .list{list-style:none; display:block; float:left; width:220px;  margin-left:15px; margin-top:5px;padding-left:0px;}
	.r .list a{text-decoration:none;}
	.r .list li img:hover{box-shadow:0 0 10px 5px #87CEEB;}
</style>
@endsection
@section('script')
@parent
@endsection
@section('content') 
<div class="shenti">
   <div class="l">
      <ul class="nav nav-pills nav-stacked">
        <li><a class="hover" href="#">歌手列表</a></li>
<!--         <li><a class="hover" href="#">华语歌手</a></li>
         <li><a href="#">港台列表</a></li>
     -->
 </ul>
<!--	    	<ul class="nav nav-pills nav-stacked">
	    		<li><a href="#">日本列表</a></li>
	    		<li><a href="#">美国列表</a></li>
	    		<li><a href="#">英国列表</a></li>
	    	</ul>
        -->
    </div>

    <div class="r">
      
        @foreach($lists as $singer)
        <ul class="list">
          <li><a href="{{url('/singer/'.$singer->id)}}"><img src="{{url('/upload/feedback/').'/'.$singer->img}}" width="220" height="175"></a></li>
          <a href="#"><span class="text-success" style="font-size:16px;">{{$singer->name}}</span></a>   
        </ul>
      @endforeach
      
      
</div>

</div>
@endsection
<script type="text/javascript">
window.onload=function(){
    document.getElementById("gs").setAttribute('class','active');
}
</script>