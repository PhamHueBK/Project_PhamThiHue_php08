<?php include_once('view/layouts/Header.php'); ?>
	<div>
			<?php 
				if(isset($_SESSION['changePass'])){
					echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'.$_SESSION['changePass'].'</strong></div>';
					
					unset($_SESSION['changePass']); 
				} 
			?>
		</div>
	<div class="login">
		<div class="container">
			<div class="login-body">
				<div class="login-heading">
					<h1>Đổi mật khẩu</h1>
				</div>
				<div class="login-info">
					<form action="?mode=user&act=changePassSuccess" method="POST">
						<input type="password" class="lock" name="passwordOld" placeholder="Mật khẩu cũ" required="true">
						<input type="password" name="passwordNew" class="lock" placeholder="Mật khẩu mới" required="true">
						<input type="password" name="passwordNewAgain" class="lock" placeholder="Nhập lại mật khẩu mới" required="true">
						<input type="submit" name="Sign In" value="Đổi mật khẩu">
						<hr>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include_once('view/layouts/Footer.php'); ?>