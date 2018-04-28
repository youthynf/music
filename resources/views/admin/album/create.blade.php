@extends("admin.layouts.app")
@section('css')

@endsection
@section('script')
@parent
	<script type="text/javascript">
		window.onload=function(){
			document.getElementById("indexbar").setAttribute('class','');
			document.getElementById("singerbar").setAttribute('class','');
			document.getElementById("albumbar").setAttribute('class','active');
			document.getElementById("userbar").setAttribute('class','');
			document.getElementById("musicbar").setAttribute('class','');
		}
    </script>
@endsection
@section('content')
                            <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">专辑管理-添加</h3>
								</div>
								<form action="{{url('/admin/album')}}" method="post" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input class="form-control" placeholder="Name" type="text" name="name">
									<br>
									<input class="form-control" placeholder="SingerName" type="text" name="s_name">
									@if (session('status'))

										<div class="tools-alert tools-alert-green">
											{{ session('status') }}
										</div>
									@endif
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

@endsection