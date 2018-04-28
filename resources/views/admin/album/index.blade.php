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
		<div class="panel-heading" style="float: left;">
			<h3 class="panel-title" style="position: relative;top: 15px">专辑列表</h3>
		</div>
		<div class="panel-body" style="width: 50%;">
		</div>
		<div class="panel-body" style="position: absolute;left: 86%;top:4%">
			<div class="input-group" style="margin-left: 22px;">
				<span class="input-group-btn" style="text-align: right"><a href="{{url('admin/album/create')}}"><button class="btn btn-primary" type="button">添加专辑</button></a></span>
			</div>
		</div>

		<div class="panel-body no-padding">
			<table class="table table-striped">
				<thead>
				<tr>
					<th>编号</th>
					<th>专辑名</th>

					<th>歌手</th>
					<th>简介</th>
					<th>操作</th>

				</tr>
				</thead>
				<tbody>
				@foreach($lists as $k =>$list)
					<tr>
						<td>{{$list->album_id}}</td>
						<td>{{$list->a_name}}</td>


						<td>{{$list->s_name}}</td>
						<td><span style="display: block;width:300px;height: 40px;overflow: hidden;"	>{{$list->a_desc}}</span></td>

						<td><a href="{{url('admin/album/'.$list->album_id.'/edit')}}">	<span class="lnr lnr-pencil"></span></a>
							<span class="lnr lnr-trash" onclick="del({{$list->album_id}});"></span>
							</td>
					</tr>
					@endforeach

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