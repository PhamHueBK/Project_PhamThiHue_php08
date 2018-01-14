<?php 
	include_once('view/layouts/Header.php');
?>
<!-- banner -->
	<div class="banner">
		<div class="slider">
			<h2 class="wow shake animated" data-wow-delay=".5s">Bài viết mới</h2>
			<div class="border"></div>
			<script src="view/js/responsiveslides.min.js"></script>
			<script>
					// You can also use "$(window).load(function() {"
					$(function () {
					// Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: true,
							speed: 500,
							namespace: "callbacks",
							before: function () {
								$('.events').append("<li>before event fired.</li>");
							},
							after: function () {
								$('.events').append("<li>after event fired.</li>");
							}
						 });				
					});
			</script>
			<div  id="top" class="callbacks_container-wrap">
				<ul class="rslides" id="slider3">
					<?php 
						foreach ($newEst as $key => $value) {
						
					?>
					<li>
						<div class="slider-info">
							<h3 class="wow fadeInRight animated" data-wow-delay=".5s"><?php echo $value['title']; ?></h3>
							<p class="wow fadeInLeft animated" data-wow-delay=".5s"><?php echo $value['description']; ?></p>
							<div class="more-button wow fadeInRight animated" data-wow-delay=".5s">
								<a href="single.html">Click Here	</a>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container">
			<div class="banner-bottom-grids">
				<div class="col-md-6 banner-bottom-left wow fadeInLeft animated" data-wow-delay=".5s">
					<div class="left-border">
						<div class="left-border-info">
							<p style="font-size:22px">Lỡ chúng ta độc thân cả đời, trên bầu trời không còn sao sáng, giữa mây mù không có những hạt mưa.</p>
						</div>
					</div>
				</div>
				<div class="col-md-6 banner-bottom-left banner-bottom-right wow fadeInRight animated" data-wow-delay=".5s">
					<div class="left-border">
						<div class="left-border-info right-border-info">
							<p style="font-size:22px">Nhưng trong thế giới bạc bẽo này bạn còn có tôi luôn mở rộng vòng tay ôm bạn vào lòng.</p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //banner-bottom -->
	<!-- information -->
	<div class="information">
		<div class="container">
			<div class="information-heading">
				<h3 class="wow fadeInDown animated" data-wow-delay=".5s">Truyện nổi bật</h3>
				<p class="wow fadeInUp animated" data-wow-delay=".5s">“Có một phép thử tình yêu rất giản đơn: Vào những lúc bất chợt, vô tình
				tay trong tay với người yêu, bạn hãy để ý xem ai cầm tay ai chặt hơn, thì người đó yêu nhiều hơn…
				Và thường tôi thấy trên đường tôi đi, những cô gái trẻ hay cầm tay người yêu chặt hơn. Thậm chí có người còn giữ bằng cả hai bàn tay mình. Có cả những người, dùng hai tay để níu, chạy theo người con trai đang bỏ đi…
				Tình yêu thực sự là thứ bạn không cần phải dùng cả hai tay để níu…”
				(Trang Hạ)</p>
			</div>
			
			<div class="information-grids">
				<?php 
					$i = 0;
					while ($i < 7) {
						$value = $noiBat[$i];
					
				?>
				<div class="col-md-4 information-grid wow fadeInLeft animated" data-wow-delay=".5s">
					<div class="information-info">
						<div class="information-grid-img">
							<img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" height="250px" alt="" />
						</div>
						<div class="information-grid-info">
							<a href="?mode=post&act=show&key=<?php echo $value['key_md5']; ?>"><h4><?php echo $value['title']; ?> </h4></a>
							<p><?php echo $value['description']; ?></p>
						</div>
					</div>
				</div>
				<?php $value = $noiBat[$i+1]; ?>
				<div class="col-md-4 information-grid wow fadeInUp animated" data-wow-delay=".5s">
					<div class="information-info">
						<div class="information-grid-info">
							<a href="?mode=post&act=show&key=<?php echo $value['key_md5']; ?>"><h4><?php echo $value['title']; ?></h4></a>
							<p><?php echo $value['description']; ?></p>
						</div>
						<div class="information-grid-img">
							<img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" height="250px" alt="" />
						</div>
					</div>
				</div>
				<?php $value = $noiBat[$i+2]; ?>
				<div class="col-md-4 information-grid wow fadeInRight animated" data-wow-delay=".5s">
					<div class="information-info">
						<div class="information-grid-img">
							<img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" height="250px" alt="" />
						</div>
						<div class="information-grid-info">
							<a href="?mode=post&act=show&key=<?php echo $value['key_md5']; ?>"><h4><?php echo $value['title']; ?></h4></a>
							<p><?php echo $value['description']; ?></p>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
				<?php $i = $i + 3;} ?>
			</div>
		</div>
	</div>
	<!-- //information -->
	
	<!-- popular -->
	<div class="popular">
		<div class="container">
			<div class="popular-heading information-heading">
				<h3 class="wow fadeInDown animated" data-wow-delay=".5s">Blog Ảnh</h3>
				<p class="wow fadeInUp animated" data-wow-delay=".5s">“Khi bước qua đổ vỡ, tổn thương, không thể phủ nhận con người ta trở nên mạnh mẽ, song song đó bất cần, ích kỷ và lạnh lùng hơn. Cụ thể: *** Không ngại làm đau người khác”</p>
			</div>
			<div class="popular-slide">
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						// Slideshow 4
							$("#slider1").responsiveSlides({
								auto: true,
								pager: true,
								nav: false,
								speed: 500,
								namespace: "callbacks",
								before: function () {
									$('.events').append("<li>before event fired.</li>");
								},
								after: function () {
									$('.events').append("<li>after event fired.</li>");
								}
							 });				
						});
				</script>
				<div  id="top" class="callbacks_container-wrap">
					<ul class="rslides" id="slider1">
						<?php 
							foreach ($image as $key => $value) {
							
						?>
						<li>
							<div class="popular-slide-info wow bounceIn animated" data-wow-delay=".5s">
								<a href="?mode=post&act=<?php if($value['type'] = 8) echo "image1"; else echo "image2"; ?>"><h5 style="color:white"><b><?php echo $value['title']; ?></b></h5></a>
								<p style="height:250px;"><img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" width="100%" height="250px"/></p>
							</div>
						</li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<div class="popular-grids">
				<div class="col-md-4 popular-grid wow fadeInLeft animated" data-wow-delay=".5s">
					<h5>NỖ LỰC! KHÔNG NGỪNG NỖ LỰC!</h5>
					<p>Có một câu thành ngữ nổi tiếng: "Bền bỉ là sức mạnh". Tiếp tục công việc, kiên trì theo đuổi sự nghiệp là điều quan trọng hàng đầu trong cuộc đời. Có một điều mà tôi muốn truyền lại cho thế hệ trẻ - thế hệ đang bắt tay vào công việc, bắt đầu xây dựng cuộc sống. Đó là: Hãy âm thầm nỗ lực. Hãy tiếp tục nỗ lực. Và hãy không ngừng nỗ lực. Nói cụ thể hơn thì hãy xem công việc của mình là trách nhiệm được Trời giao phó. Vì vậy, hãy theo đuổi công việc đó trong suốt cuộc đời.</p>
				</div>
				<div class="col-md-4 popular-grid wow fadeInUp animated" data-wow-delay=".5s">
					<h5>NHỮNG ĐIỀU NGƯỜI HÀNG XÓM GIÀU CÓ KHÔNG CHIA SẺ VỚI BẠN</h5>
					<p>Việt Nam sẽ có hơn 30 triệu người thuộc tầng lớp trung lưu giàu có vào năm 2020 (Dự đoán của Công ty Tư vấn Boston (BCG)). Như vậy sẽ chẳng lấy gì làm ngạc nhiên nếu một (vài) hàng xóm cạnh nhà bạn là một triệu phú hay tỷ phú đô la.

					Tuy nhiên, có thể bạn không hay biết gì về hàng xóm của mình bởi có thể trông người đó chẳng hề giống triệu phú tí nào. Và bạn biết không, người giàu thực sự có hiểu biết về tài chính sẽ không dễ dàng để bị phát hiện ra đâu.</p>
				</div>
				<div class="col-md-4 popular-grid wow fadeInRight animated" data-wow-delay=".5s">
					<h5>ĐƠN PHƯƠNG</h5>
					<p>Yêu thầm một người cũng giống như đeo tai nghe và mở nhạc ở mức to nhất. Người ngoài thì thấy thật tĩnh lặng, chỉ có ta mới biết bên trong đang điên cuồng gào thét như thế nào thôi.<br>Thích thầm một người đã là chuyện thống khổ, thích thầm một đối tượng tất cả mọi người đều thầm mến lại còn đau khổ hơn.</p>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //popular -->
<?php include_once('view/layouts/Footer.php'); ?>