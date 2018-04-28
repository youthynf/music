@extends("admin.layouts.app")
@section('css')

@endsection
@section('script')
<script type="text/javascript">
	window.onload=function(){
		document.getElementById("indexbar").setAttribute('class','active');
		document.getElementById("singerbar").setAttribute('class','');
		document.getElementById("albumbar").setAttribute('class','');
		document.getElementById("userbar").setAttribute('class','');
		document.getElementById("musicbar").setAttribute('class','');
	}
</script>
@parent
@endsection
@section('content')
<div class="panel">
	<div class="panel-body no-padding">

		<div class="profile-middle">
			<!-- PROFILE HEADER -->
			<div class="profile-header">
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					{!! implode('<br>', $errors->all()) !!}
				</div>
				@endif
				<div class="overlay"></div>
				<div class="profile-main">
					<img  @if(Auth::user()->avatar == null)src="/upload/avatar/user.jpg" @else src="{{Auth::user()->avatar}}"@endif class="img-circle" alt="Avatar" width="100" height="100">
					<h3 class="name">{{Auth::user()->nickname}}</h3>
					<span class="online-status status-available">管理员</span>
				</div>
				<div class="profile-stat">
					<div class="row">
						<div class="col-md-4 stat-item">
							45 <span>Projects</span>
						</div>
						<div class="col-md-4 stat-item">
							15 <span>Awards</span>
						</div>
						<div class="col-md-4 stat-item">
							2174 <span>Points</span>
						</div>
					</div>
				</div>
			</div>
			<!-- END PROFILE HEADER -->
			<!-- PROFILE DETAIL -->
			<div class="profile-detail">
				<div class="profile-info">
					<h4 class="heading">基本信息</h4>
					<ul class="list-unstyled list-justify">
						<li>性别 <span>@if($user->gender==0)男@else 女@endif</span></li>
						<li>手机号码 <span>@if($user->phone==null)无@else {{$user->phone}}@endif</span></li>
						<li>电子邮箱 <span>{{$user->email}}</span></li>
						<li>个性签名<span>@if($user->desc==null)主人很懒，什么都没留下~@else {{$user->desc}} @endif</span></li>
					</ul>
				</div>
				<div class="profile-info">
					<h4 class="heading">社交媒体</h4>
					<ul class="list-inline social-icons">
						<li><a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" class="google-plus-bg"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#" class="github-bg"><i class="fa fa-github"></i></a></li>
					</ul>
				</div>
				
				<div class="text-center"><a href="{{url('admin/personal/'.Auth::user()->id)}}/edit" class="btn btn-primary">编辑信息</a></div>
			</div>
			<!-- END PROFILE DETAIL -->
		</div>
	</div>
</div>
@endsection