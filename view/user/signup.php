<?php include_once('view/layouts/Header.php'); ?>
		<!-- login -->
	<div class="login">
		<div class="container">
			<div class="login-body">
				<div class="login-heading">
					<h1>Sign up</h1>
				</div>
				<div class="login-info">
					<form action="?mode=user&act=create" method="POST">
						<input type="text" class="user" name="name" placeholder="Name" required="true">
						<input type="text" class="user" name="email" placeholder="Email" required="true">
						<input type="password" name="password" class="lock" placeholder="Password" required="true">
						<input type="password" name="password" class="lock" placeholder="Confirm Password" required="true">
						<input type="submit" name="Sign In" value="Sign up">
						<div class="signup-text">
							<a href="?mode=user&act=login">Already have an account? Login here.</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //login -->
<?php include_once('view/layouts/Footer.php'); ?>