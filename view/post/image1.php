<?php include_once('view/layouts/Header.php'); ?>
		<!-- gallery -->
		<div class="gallery">
			<div class="container">
				<div class="gallery-heading">
					<h2>Ảnh nổi bật</h2>
					<p>“Khi bước qua đổ vỡ, tổn thương, không thể phủ nhận con người ta trở nên mạnh mẽ, song song đó bất cần, ích kỷ và lạnh lùng hơn. Cụ thể: *** Không ngại làm đau người khác”</p>
				</div>
				<?php 
					$i = 0;
					while($i < count($data)){
						$value = $data[$i];
				?>
				<div class="gallery-grids">
					<div class="col-md-6 gallery-grid wow fadeInUp animated" data-wow-delay=".5s">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" data-lightbox="example-set" data-title="">
									<img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" alt="" height="350px"/>
									<figcaption>
										<h3><?php echo $value['title']; ?></h3>
										<p><?php echo $value['description']; ?></p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
					<?php
						$i++;
						if($i == count($data))
							break;
						$value = $data[$i];
					?>
					<div class="col-md-6 gallery-grid wow fadeInUp animated" data-wow-delay=".5s">
						<div class="grid">
							<figure class="effect-apollo">
								<a class="example-image-link" href="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" data-lightbox="example-set" data-title="">
									<img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" alt=""  height="350px"/>
									<figcaption>
										<h3><?php echo $value['title']; ?></h3>
										<p><?php echo $value['description']; ?></p>
									</figcaption>	
								</a>
							</figure>
						</div>
					</div>
					
					<div class="clearfix"> </div>
					<script src="js/lightbox-plus-jquery.min.js"> </script>
				</div>
				<?php $i++;} ?>
			</div>
		</div>
	<!-- //gallery -->
<?php include_once('view/layouts/Footer.php'); ?>