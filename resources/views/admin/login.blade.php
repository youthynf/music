<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>webManager</title>
<link rel="stylesheet" type="text/css" href="{{url('/admin/loginstyle/style.css')}}" />
</head>
<body>
	<form action="{{url('/admin/login')}}" method="POST" id="container">
		{{ csrf_field() }}
		<h1>
			管理员登录
		</h1>
		<input name="name" type="text" placeholder="请输入用户名" required>
		<input name="password" type="password" placeholder="请输入密码" required>
		<input type="submit" value="登录">
	</form>
</body>
</html>