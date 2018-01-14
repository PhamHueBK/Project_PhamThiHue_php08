<?php 
	include_once('view/layouts/Header.php');
?>
	<!-- login -->
	<div class="login">
		<div class="container">
			<div class="login-body">
				<div class="login-heading">
					<h1>Login</h1>
				</div>
				<div class="login-info">
					<form action="?mode=user&act=loginSuccess" method="POST">
						<input type="text" class="user" name="email" placeholder="Email" required="">
						<input type="password" name="password" class="lock" placeholder="Password">
						<div class="forgot-top-grids">
							<div class="forgot-grid">
								<ul>
									<li>
										<input type="checkbox" id="brand1" value="">
										<label for="brand1"><span></span>Remember me</label>
									</li>
								</ul>
							</div>
							<div class="forgot">
								<a href="#">Forgot password?</a>
							</div>
							<div class="clearfix"> </div>
						</div>
						<input type="submit" name="Sign In" value="Login">
						<div class="signup-text">
							<a href="?mode=user&act=signup">Don't have an account? Create one now</a>
						</div>
						<hr>
						<h2>or login with</h2>
						<div class="login-icons">
							<ul>
								<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#" class="dribbble"><i class="fa fa-dribbble"></i></a></li>
							</ul>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //login -->
<?php include_once('view/layouts/Footer.php'); ?>