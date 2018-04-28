@extends("admin.layouts.app")
@section('css')
@endsection
@section('script')
	<script type="text/javascript">
		function submitform(id){
			if (confirm("确认要删除？")) {
				document.getElementById(id).submit();
			}
		}
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
	<div class="panel-heading row" >
		<h3 class="panel-title">音乐列表</h3>
		<div style="float: right;margin: 0px 20px 0 0;"><a href="{{url('admin/music/create')}}" class="btn btn-primary">新增音乐</a></div>
	</div>
	<div class="panel-body no-padding">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>编号</th>
					<th>歌名</th>
					<th>歌手</th>
					<th>专辑</th>
					<th>图片</th>
					<th>描述</th>
					<th>更新时间</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				@foreach($lists as $list)
				<form id="{{$list->id}}" method="POST" action="{{url('admin/music/'.$list->id)}}">
				<tr>
					<td>{{$list->id}}</td>
					<td>{{$list->name}}</td>
					<td>{{$list->singer_name}}</td>
					<td>@if($list->album_name == null) 无 @else {{$list->album_name}} @endif</td>
					<td><img src="{{$list->img}}" width="30" height="30"></td>
					<td><span style="display: block;width: 300px;overflow: hidden;height: 40px;">{{$list->desc}}</span></td>
					<td>{{$list->updated_at}}</td>
					<td>
						<a href="{{url('admin/music/'.$list->id.'/edit')}}"><span class="lnr lnr-pencil"></span></a>
						 <input type="hidden" name="_method" value="DELETE">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<span onclick="del({{$list->id}})" class="lnr lnr-trash"></span>
					</td>					
				</tr>
				</form>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="panel-footer">
		
			<ul class="pagination pagination-sm no-margin pull-right">
                  {{ $lists->appends(['name' => ''])->links() }}
                  共{{ $lists->lastPage() }}页
            </ul>

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

    <style>
      .alert{
        width:200px;
        height:120px;
        position:absolute;
        left: 45%;
        top:45%;
        text-align: center;
        line-height: 80px;
        border-radius: 5px;
        font-size:22px;
        opacity: 0;
        z-index: 999;
        -webkit-animation-name: fadeDown; /*动画名称*/
        -webkit-animation-duration: 2.5s; /*动画持续时间*/
        -webkit-animation-iteration-count: 1; /*动画次数*/
        -webkit-animation-delay: 0s; /*延迟时间*/
      }
      @-webkit-keyframes fadeDown {
        10% {
        opacity: 1; /*开始状态 透明度为0*/
        }
        80% {
        opacity: 0.8; /*开始状态 透明度为0*/
        }
        100% {
        opacity: 0; /*结尾状态 透明度为1*/
        }
      }
      .success{background:white; border:1px solid #00a65a; color:#00a65a;}
      .danger{background:white; border:1px solid #dd4b39; color:#dd4b39;}
    </style>

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