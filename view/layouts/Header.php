<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Around a Travel Category Flat Bootstrap responsive Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Around Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link href="view/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--// bootstrap-css -->
<!-- css -->
<link rel="stylesheet" href="view/css/style.css" type="text/css" media="all" />

<!--// css -->
<!-- font-awesome icons -->
<link href="view/css/font-awesome.css" rel="stylesheet">
<link href="view/css/toastr.min.css" rel="stylesheet">
<link href="view/css/sweetalert.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- //font -->
<script src="view/js/jquery-1.11.1.min.js"></script>
<script src="view/js/bootstrap.js"></script>
<script type="text/javascript" src="view/js/move-top.js"></script>
<script type="text/javascript" src="view/js/easing.js"></script>
<script type="text/javascript" src="view/js/toastr.min.js"></script>
<script type="text/javascript" src="view/js/sweetalert.min.js"></script>
<script type="text/javascript" src="view/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="view/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="view/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>	
<!--animate-->
<link href="view/css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="view/js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>
<!--//end-animate-->

</head>
<body>
	<!-- header -->
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-info">
					<div class="top-header-left wow fadeInLeft animated" data-wow-delay=".5s" style="width:50% !important">
						<p>More than 10 new destinations for your trip</p>
					</div>
					<div class="top-header-right wow fadeInRight animated" data-wow-delay=".5s" style="width:50% !important">
						<div class="top-header-right-info">
							<ul>
								<?php 
									if(isset($_SESSION['user'])){
								?>

								<li><a href="?mode=user&act=profile"><?php echo $_SESSION['user']['name']; ?></a> </li>
								<li><a href="?mode=post&act=newPost&user_id=<?php echo md5($_SESSION['user']['user_id']); ?>&type=8">Đăng ảnh</a></li>
								<li><a href="?mode=post&act=newPost&user_id=<?php echo md5($_SESSION['user']['user_id']); ?>&type=7">Gửi bài</a></li>
								<li><a href="?mode=user&act=changePass">Đổi mật khẩu</a></li>
								<li><a href="?mode=user&act=logout">Logout</a></li>
								<?php }else{ ?>
								<li><a href="?mode=user&act=login">Login</a></li> 
								
								
								<li><a href="?mode=user&act=signup">Sign up</a></li>
								<?php } ?>
							</ul>
						</div>
						<?php 
							if(!isset($_SESSION['user'])){
						?>
						<div class="social-icons">
							<ul>
								<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a class="twitter facebook" href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a class="twitter google" href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
						<?php } ?>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
					<h1><a href="index.html"><img src="view/images/logo.jpg" alt="" /></a></h1>
				</div>
				<div class="top-nav wow fadeInRight animated" data-wow-delay=".5s">
					<nav class="navbar navbar-default">
						<div class="container">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">Menu						
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav">
								
								<li><a href="?mode=home$act=index" class="active">Trang chủ</a></li>
								<?php if(isset($_SESSION['user'])){ ?>
								<li><a href="?mode=user&act=trangCaNhan&user_id=<?php echo md5($_SESSION['user']['user_id']); ?>">Trang cá nhân</a></li>
								<li><a href="?mode=post&act=myPost">Blog của tôi</a></li>
								<?php } ?>
								<li><a href="?mode=post&act=story">Blog truyện</a></li>
								<li><a href="#" class="dropdown-toggle hvr-bounce-to-bottom" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog Ảnh<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a class="hvr-bounce-to-bottom" href="?mode=post&act=image1">Blog nổi bật</a></li>
										<li><a class="hvr-bounce-to-bottom" href="?mode=post&act=image2">Blog chủ đề</a></li>          
									</ul>
								</li>	
								<li><a href="contact.html">Liên hệ admin</a></li>
							</ul>	
							<div class="clearfix"> </div>
						</div>	
					</nav>		
				</div>
			</div>
		</div>
	</div>
	<!-- //header -->