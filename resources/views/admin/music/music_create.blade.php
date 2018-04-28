@extends("admin.layouts.app")
@section('css')
@endsection
@section('script')
	<script type="text/javascript">
		window.onload=function(){
			document.getElementById("indexbar").setAttribute('class','');
			document.getElementById("singerbar").setAttribute('class','');
			document.getElementById("albumbar").setAttribute('class','');
			document.getElementById("userbar").setAttribute('class','');
			document.getElementById("musicbar").setAttribute('class','active');
		}
	</script>
@parent
@endsection
@section('content')
<div class="panel">
								<div class="panel-heading">
								@if (count($errors) > 0)
								<div class="alert alert-danger">
								{!! implode('<br>', $errors->all()) !!}
								</div>
								@endif
									<h3 class="panel-title">音乐管理-添加</h3>
								</div>
								<div class="panel-body">
								<form action="{{url('admin/music')}}" method="POST" name="musicForm" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input class="form-control" placeholder="音乐名" type="text" name="name">
									<br>
									<div class="input-group">
								     	<select class="form-control" name="language">
										    <option value="" style="font-weight: 100">-- 请选择语种 --</option>
									    	<option value="华语">华语</option>
										    <option value="粤语">粤语</option>
										    <option value="英语">英语</option>
									    </select>									
									</div>
									<br>
									<div class="input-group">
								     	<select class="form-control" name="s_id">
										    <option value="" style="font-weight: 100">-- 请选择歌手 --</option>
									    	@foreach($singers as $singer)
									    	<option value="{{$singer->id}}">{{$singer->name}}</option>
										 	@endforeach
									    </select>
									    <span class="input-group-btn"><a class="btn btn-primary" href="{{url('admin/singer/create')}}">添加歌手</a>
									</div>
									<br>
									<div class="input-group">
								     	<select class="form-control" name="a_id">
										    <option value="" style="font-weight: 100">-- 请选择专辑 --</option>
									    	@foreach($albums as $album)
									    	<option value="{{$album->id}}">{{$album->name}}</option>
									    	@endforeach
									    </select>
									    <span class="input-group-btn"><a href="{{url('admin/album/create')}}" class="btn btn-primary">添加专辑</a>
									</div>
									<br>
									<textarea name="desc" class="form-control" placeholder="描述"></textarea>
									<br>
									<input class="form-control" placeholder="添加图片：" type="text" 
									                         disabled style="background-color: #FFF;border: 0px;cursor: default">
									<br>
									<input name="img" type="file"  multiple accept="image/*">
									<br>
									<input class="form-control" placeholder="添加音乐：" type="text" 
									                         disabled style="background-color: #FFF;border: 0px;cursor: default">
									<br>
									<input name="source" type="file" multiple accept="audio/*">
									<br>
									<!-- 加载编辑器的容器 -->
									<textarea name="lrc" class="form-control" placeholder="歌词"></textarea>
									<br>
									<div class="input-group">
										<span class="input-group-btn"><button class="btn btn-primary" type="reset">重置</button></span>
										<span class="input-group-btn" style="text-align: right"><button class="btn btn-primary" type="submit">添加</button></span>
									</div>
								</div>
								</from>
							</div>

@endsection