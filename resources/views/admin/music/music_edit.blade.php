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
								@if (count($errors) > 0)
								<div class="alert alert-danger">
								{!! implode('<br>', $errors->all()) !!}
								</div>
								@endif
								<div class="panel-heading">
									<h3 class="panel-title">音乐管理-添加</h3>
								</div>
								<div class="panel-body">
								<form action="{{url('admin/music/'.$data->id)}}" method="POST" name="musicForm" enctype="multipart/form-data">
									{{ csrf_field() }}
									<input type="hidden" value="PUT" name="_method">
									<input class="form-control" placeholder="音乐名" type="text" name="name" value="{{$data->name}}">
									<br>
									<div class="input-group">
								     	<select class="form-control" name="language">
										    <option value="" style="font-weight: 100">-- 请选择语种 --</option>
									    	<option value="华语" @if($data->language == "华语") selected @endif>华语</option>
										    <option value="粤语" @if($data->language == "粤语") selected @endif>粤语</option>
										    <option value="英语" @if($data->language == "英语") selected @endif>英语</option>
									    </select>									
									</div>
									<br>
									<div class="input-group">
								     	<select class="form-control" name="s_id">
										    <option value="" style="font-weight: 100">-- 请选择歌手 --</option>
									    	@foreach($singers as $singer)
									    	<option value="{{$singer->id}}" @if($singer->id == $data->singer_id) selected @endif>{{$singer->name}}</option>
									    	@endforeach
									    </select>
									    <span class="input-group-btn"><a class="btn btn-primary" href="{{url('admin/singer/create')}}">添加歌手</a>
									</div>
									<br>
									<div class="input-group">
								     	<select class="form-control" name="a_id">
										    <option value="" style="font-weight: 100">-- 请选择专辑 --</option>
									    	@foreach($albums as $album)
									    	<option value="{{$album->id}}" @if($album->id == $data->a_id) selected @endif>{{$album->name}}</option>
									    	@endforeach
									    </select>
									    <span class="input-group-btn"><a class="btn btn-primary" href="{{url('admin/album/create')}}">添加专辑</a>
									</div>
									<br>
									<textarea name="desc" class="form-control" placeholder="描述">{{$data->desc}}</textarea>
									<br>
									<input class="form-control" placeholder="添加图片：" type="text" 
									                         disabled style="background-color: #FFF;border: 0px;cursor: default">
									<br>
									<input name="img" type="file"  multiple accept="image/*" value="{{$data->img}}">
									<br>
									<input class="form-control" placeholder="添加音乐：" type="text" 
									                         disabled style="background-color: #FFF;border: 0px;cursor: default">
									<br>
									<input name="source" type="file" multiple accept="audio/*"  value="{{$data->source}}">
									<br>
									<textarea name="lrc" class="form-control" placeholder="歌词">{{$data->lrc}}</textarea>
									<br>
									<br>
									<div class="input-group">
										<a href="{{url('admin/music')}}"><span class="input-group-btn"><button class="btn btn-primary" type="reset">重置</button></span></a>
										<span class="input-group-btn" style="text-align: right"><button class="btn btn-primary" type="submit">保存</button></span>
									</div>
								</div>
								</from>
							</div>
@endsection