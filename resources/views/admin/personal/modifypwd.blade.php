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
<div class="panel-heading">
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		{!! implode('<br>', $errors->all()) !!}
	</div>
	@endif
	<h3 class="panel-title">密码修改</h3>
</div>
<form name="adminedit" action="{{url('/admin/modifypwd/'.Auth::user()->id)}}" method="POST">
	<div class="panel-body">
		{{ csrf_field() }}
		<label>用户名：</label>
		<input type="text" class="form-control" placeholder="用户名" name="name">
		<br>			
		<label>原密码：</label>
		<input type="password" class="form-control" placeholder="原密码" name="oldpassword">
		<br>
		<label>新密码：</label>
		<input type="password" class="form-control" placeholder="新密码" name="newpassword">
		<br>
		<label>确认密码：</label>
		<input type="password" class="form-control" placeholder="确认密码" value="" name="comfirmpassword">
		<br>

	</div>
	<div class="input-group">
		<span class="input-group-btn"><button class="btn btn-primary" type="reset" style="margin-left: 300px;">重置</button></span>
		<span class="input-group-btn"><button class="btn btn-primary" type="submit" style="text-align:right;margin-right: 0px;">保存</button></span>
		
	</div>
</form>
</div>
@endsection