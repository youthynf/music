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
<div class="panel">
  <div class="panel-heading row" >
    <h3 class="panel-title">用户</h3>
  </div>
  <div class="panel-body no-padding">
    <table class="table table-striped">
     <thead>
       <tr>
        <th>头像</th>
      </tr>
      <tr>
      <td rowspan="8"> <img @if($user->avatar == null)src="/upload/avatar/user.jpg" @else src="{{$user->avatar}}"@endif width="180" height="180"></td>
        <tr>
          <th>ID</th>
          <td>{{$user->id}}</td>
        </tr>
        <tr>
          <th>名字</th>
          <td>{{$user->name}}</td>
        </tr>
        <tr>
          <th>昵称</th>
          <td>{{$user->nickname}}</td>
        </tr>
        <tr>
          <th>性别</th>
          <td>@if($user->gender) 女 @else 男 @endif</td>
        </tr>
        <tr>
          <th>E-mail</th>
          <td>{{$user->email}}</td>
        </tr>
        <tr>
          <th>注册时间</th>
          <td><textarea rows="1" cols="20" disabled="disabled">{{$user->created_at}}</textarea></td>
        </tr>
      </tr>
      <tr>
        <th>最近修改时间</th>
        <td><textarea rows="1" cols="20" disabled="disabled">{{$user->updated_at}}</textarea></td>
      </tr>
    </form>
  </tbody>
</table>
</div>
</div>
@endsection