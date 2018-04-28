@extends("admin.layouts.app")
@section('css')

@endsection
@section('script')
	@parent
@endsection
@section('content')
	<div class="panel">
		<div class="panel-heading">
			<h3 class="panel-title">添加歌手</h3>
		</div>
		<div class="panel-body">

			<form action="{{url('/admin/singer')}}" method="post" enctype="multipart/form-data">
				{{ csrf_field() }}
			<input class="form-control" placeholder="Name" type="text" name="name">
			<br>
		    <input name="img" type="file" ></td>
			<br>
			<textarea class="form-control" placeholder="简介" rows="4" name="desc"></textarea>
			<br>
			<div class="input-group">
				<span class="input-group-btn"><button class="btn btn-primary" type="button">取消</button></span>
				<span class="input-group-btn" style="text-align: right"><button class="btn btn-primary" type="submit">添加</button></span>
			</div>
				</form>

		</div>
	</div>
@endsection