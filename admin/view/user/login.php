<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập trang quản trị</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="view/css/bootstrap.min.css">
</head>
<body>
	<?php 
		if(isset($_SESSION['isLogin'])){
			unset($_SESSION['isLogin']);
			echo '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Email hoặc Mật khẩu không đúng</strong></div>';
		}
	?>
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		<form action="?mode=user&act=loginSuccess" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>Đăng nhập</legend>
			</div>
	
			
			<div class="form-group">
				<label>Email</label>
				<input type="email" class="form-control" id="email" placeholder="Your email" required="true">
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" class="form-control" id="password" required="true">
			</div>
	
			<div class="form-group">
				<div>
					<button type="submit" class="btn btn-primary">Đăng nhập</button>
				</div>
			</div>
		</form>
	</div>
</body>	
</html>