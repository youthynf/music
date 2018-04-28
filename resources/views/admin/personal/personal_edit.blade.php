@extends("admin.layouts.app")
@section('css')
@endsection
@section('script')
@include('UEditor::head');
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
<!-- INPUTS -->
<div class="panel">
	<div class="panel-heading">
		@if (count($errors) > 0)
		<div class="alert alert-danger">
			{!! implode('<br>', $errors->all()) !!}
		</div>
		@endif
		<h3 class="panel-title">修改基本信息</h3>
	</div>
	<form name="adminedit" action="{{url('/admin/personal/'.$user->id)}}" method="POST" enctype="multipart/form-data">
		<div class="panel-body">
			{{ csrf_field() }}
			<input type="hidden" value="PUT" name="_method">
			<label>头像：</label>
			<img @if($user->avatar == null)src="/upload/avatar/user.jpg" @else src="{{$user->avatar}}" @endif alt="" width="100" height="100">
			<input name="avatar" type="file"  multiple accept="image/*">
			<label>昵称：</label>
			<input type="text" class="form-control" placeholder="昵称" value="{{$user->nickname}}" name="nickname">
			<br>
			<label>手机号码：</label>
			<input type="text" class="form-control" value="{{$user->phone}}" value="" name="phone">
			<br>
			<label>性别：</label>
			<label class="fancy-radio">
				<input name="gender" value="0" type="radio" @if($user->gender==0)checked @endif>
				<span><i></i>男</span>
			</label>
			<label class="fancy-radio">
				<input name="gender" value="1" type="radio" @if($user->gender==1)checked @endif>
				<span><i></i>女</span>
			</label>
			<label>个性签名：</label>
			<textarea name="desc" class="form-control" placeholder="textarea" rows="4">@if($user->desc==null)主人很懒，什么都没留下~@else {{$user->desc}} @endif</textarea>
			<br>

		</div>
		<div class="input-group">
			<span class="input-group-btn"><button class="btn btn-primary" type="reset" style="margin-left: 300px;">重置</button></span>
			<span class="input-group-btn"><button class="btn btn-primary" type="submit" style="text-align:right;margin-right: 0px;">保存</button></span>
			
		</div>
	</form>
</div>
@endsection