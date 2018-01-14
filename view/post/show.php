<?php include_once('view/layouts/Header.php'); ?>
		<!-- about -->
	<div class="about">
		<div class="about-heading">
			<div class="container">
				<h2 class="wow fadeInDown animated" data-wow-delay=".5s"><?php echo $data['title']; ?></h2>
				<p class="wow fadeInUp animated" data-wow-delay=".5s"><?php echo $data['description']; ?></p>
			</div>
		</div>
		<div class="about-top">
			<div class="container">
				<div class="about-bottom">
					<img class="wow fadeInUp animated" data-wow-delay=".5s" src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $data['thumbnail']; ?>" alt="" />
					<div class="wow fadeInUp animated" data-wow-delay=".5s"><?php echo $data['content']; ?></div>
				</div>
			</div>
		</div>
		
		<!-- team -->
		<div class="team">
			<div class="container">
				<div class="popular-heading team-heading">
					<h3 class="wow fadeInUp animated" data-wow-delay=".5s"><?php echo $data['type']; ?></h3>
					<p class="wow fadeInUp animated" data-wow-delay=".5s"><?php echo $data['slogen']; ?></p>
				</div>
				<div class="team-grids">
					<?php if(isset($relative[0])){ ?>
					<div class="col-md-4 team-grid wow fadeInLeft animated" data-wow-delay=".5s">
						<img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $relative[0]['thumbnail']; ?>" height="200px" alt="" />
						<h4><?php echo $relative[0]['title']; ?></h4>
						<p><?php echo $relative[0]['content']; ?></p>
						<div class="social-icons team-icons">
							<ul>
								<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a class="twitter facebook" href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a class="twitter google" href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					<?php } if(isset($relative[1])){?>
					<div class="col-md-4 team-grid wow fadeInUp animated" data-wow-delay=".5s">
						<img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $relative[1]['thumbnail']; ?>" height="200px" alt="" />
						<h4><?php echo $relative[1]['title']; ?></h4>
						<p><?php echo $relative[1]['content']; ?></p>
						<div class="social-icons team-icons">
							<ul>
								<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a class="twitter facebook" href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a class="twitter google" href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					<?php } if(isset($relative[2])){ ?>
					<div class="col-md-4 team-grid wow fadeInRight animated" data-wow-delay=".5s">
						<img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $relative[2]['thumbnail']; ?>" height="200px" alt="" />
						<h4><?php echo $relative[2]['title']; ?></h4>
						<p><?php echo $relative[2]['content']; ?></p>
						<div class="social-icons team-icons">
							<ul>
								<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a class="twitter facebook" href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a class="twitter google" href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
					<?php } ?>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<!-- //team -->
	</div>
	<!-- //about -->
<?php include_once('view/layouts/Footer.php'); ?>