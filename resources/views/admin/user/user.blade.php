@extends("admin.layouts.app")
@section('css')

@endsection
@section('script')
 <script type="text/javascript">
    window.onload=function(){
      document.getElementById("indexbar").setAttribute('class','');
      document.getElementById("singerbar").setAttribute('class','');
      document.getElementById("albumbar").setAttribute('class','');
      document.getElementById("userbar").setAttribute('class','active');
      document.getElementById("musicbar").setAttribute('class','');
    }
</script>
@parent
@endsection
@section('content')
<!--<div class="panel" style="width: 470px">
<div class="box-header">
    <div class="input-group input-group-sm" style="width: 470px;">
      <input type="text" id="searchName" name="name" class="form-control pull-right" placeholder="请输入用户名或姓名搜索..." value="{{isset($_GET['name'])? $_GET['name']:''}}">
      <div class="input-group-btn">
        <button type="button" onclick="search({{$lists->currentPage()}},['searchName']);" class="btn btn-default"><i class="fa fa-search"></i></button>
      </div>
    </div>
  </div>
</div>
-->
<div class="panel">
	<div class="panel-heading" style="float: left">
		<h3 class="panel-title" style="position: relative;top: 15px">用户列表</h3>
	</div>
	
<!--
	<div class="panel-body" style="width: 500px">
		<div class="input-group">
			<input class="form-control" type="text" placeholder="查找用户...">
			<span class="input-group-btn">
				<button class="btn btn-primary" type="button">搜索</button>
			</span>
		</div>
	</div>
-->
<!-- 	<div class="panel-body" style="position: absolute;left: 70%">
		<div class="input-group">
			<span class="input-group-btn" style="text-align: right"><button class="btn btn-primary" type="button">添加用户</button></span>
		</div>
	</div> -->
	<div class="panbel-body no-padding">
		<table class="table table-striped" >
			<thead>
				<tr>
					<!-- <th>复选框</th> -->
					<th>编号</th>
					<th>ID</th>
					<th>名字</th>
					<th>昵称</th>
					<th>E-mail</th>
					<th>性别</th>
          <th>查看</th>
          <th>删除</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lists as $k=>$list)
        <form id="{{$list->id}}" method="POST" action="{{url('admin/userinfo/'.$list->id)}}">
          <tr>
            <!-- <td><input type="checkbox" class="check" value="{{$list->id}}"></td> -->
            <td>{{$k+1}}</td>
            <td>{{$list->id}}</td>
            <th>{{$list->name}}</th>
            <td>{{$list->nickname}}</td>
            <td>{{$list->email}}</td>
            <td>@if($list->gender) 女 @else 男 @endif</td>
            <td>
              <a href="{{url('admin/userinfo')}}/{{$list->id}}">
                <i class="fa fa-pied-piper-alt" style="margin-right: 5px;cursor: pointer;"></i></a>
            </td>
            <td>
              <span onclick="del({{$list->id}})" class="lnr lnr-trash" style="margin-right: 5px;cursor: pointer;"></span>
            </td>
          </tr>
          @endforeach
          <tr>
           <!--  <td><button type="button" onclick="dels();" class="btn btn-block btn-default btn-sm">删除</button></td> -->
            <th colspan="8">
              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $lists->appends(['name' => ''])->links() }}
                共{{ $lists->lastPage() }}页
              </ul>
            </th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  @endsection

  <script>
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