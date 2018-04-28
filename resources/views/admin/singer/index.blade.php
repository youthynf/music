@extends("admin.layouts.app")
@section('css')
@endsection
@section('script')
<script type="text/javascript">
	window.onload=function(){
		document.getElementById("indexbar").setAttribute('class','');
		document.getElementById("singerbar").setAttribute('class','active');
		document.getElementById("albumbar").setAttribute('class','');
		document.getElementById("userbar").setAttribute('class','');
		document.getElementById("musicbar").setAttribute('class','');
	}
</script>
@parent
@endsection
@section('content')
<div class="panel">
	<div class="panel-heading" style="float: left">
		<h3 class="panel-title" style="position: relative;top: 15px">歌手列表</h3>
	</div>
<!--
	<div class="panel-body" style="width: 50%;">
		<div class="input-group" style="margin-top: 15px;">
			<input class="form-control" type="text" placeholder="查找歌手..." >
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button">搜索</button>
			</span>
		</div>
	</div>
-->
	<div class="panel-body" style="position: absolute;left: 86%;top:3%">
		<div class="input-group" style="margin-left: 22px;">
			<span class="input-group-btn" style="text-align: right;"><a href="{{url('admin/singer/create')}}"><button class="btn btn-primary" type="button">添加歌手</button></a></span>
		</div>
	</div>

	<div class="panel-body no-padding">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>编号</th>
					<th>姓名</th>
					<th>简介</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($lists as $k =>$list)
				<tr >
					<td><a href="#">{{$k+1}}</a></td>
					<td>{{$list->name}}</td>
					<td><span style="height: 40px;overflow: hidden;width: 300px; display: block;">{{$list->desc}}</span></td>
					<td><a href="{{url('admin/singer/'.$list->id.'/edit')}}">


						<span class="lnr lnr-pencil"></span></a><span class="lnr lnr-trash" onclick="del({{$list->id}});"></span>
						<a href="{{url('admin/singer/'.$list->id)}}">	<span class="fa fa-search"></span></a></td>
					</tr>
					@endforeach
				@if (session('status'))

					<div class="tools-alert tools-alert-green">
						{{ session('status') }}
					</div>
					@endif
				</tr>
			</tbody>

		</table>
		<div style="float: right">
			{{ $lists->links() }}
		</div>
	</div>
</div>    <script>
	//搜索
	function search(page, arrs) {
		var url = window.location.href.split('?')[0] + '?page=' + page;
		for(var i=0;i<arrs.length;i++) {
			if ($("#"+arrs[i]).val() != undefined) {
				url += '&' + $("#"+arrs[i]).attr('name') + '=' + $("#"+arrs[i]).val();
			}
		}
		window.location.href = url;
	}
	//单条删除
	function del(id) {
		if (confirm('确定要删除这条记录吗？')==true){
			$("#del").attr('action', window.location.href.split('?')[0] + '/' + id);
			$("#del").submit();
		}
	}
	//多条删除
	function dels() {
		if ($(".check:checked").length > 0) {
			if (confirm('确定要删除选中记录吗？')==true){
				var ids = Array();
				$("#dels").attr('action', window.location.href.split('?')[0] + '/dels');
				$(".check:checked").each(function(){
					ids.push($(this).val());
				});
				$("#delsIds").val(ids);
				$("#dels").submit();
			}
		}

	}
</script>



<!-- 单条数据删除 -->
<form action="" method="POST" id="del">
	<?php echo e(method_field('DELETE')); ?>

	<?php echo e(csrf_field()); ?>

</form>

<!-- 多条数据删除 -->
<form action="" method="POST" id="dels">
	<?php echo e(csrf_field()); ?>

	<input type="hidden" name="ids" id="delsIds" value="">
</form>

<?php if(session('status')): ?>
	<div class="alert success">
		<?php echo e(session('status')); ?>

	</div>
<?php endif; ?>
<?php if(count($errors) > 0): ?>
	<div class="alert danger">
		<ul>
			<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<li><?php echo e($error); ?></li>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</ul>
</div>
<?php endif; ?>
@endsection