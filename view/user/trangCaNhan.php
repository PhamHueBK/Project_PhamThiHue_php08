<?php include_once('view/layouts/Header.php'); ?>

				<!-- blog -->
		<div class="blog">
			<!-- container -->
			<div class="container">
				<div class="blog-heading">
					<p class="wow fadeInUp animated" data-wow-delay=".5s"><h2 style=""><?php echo $user['name']; ?></h2></p>
					<div style="position:relative; clear:none; padding-right:85%; padding-top:5%; background: url('/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/FA3.jpg'); background-size: cover; width:100%; height:300px" > 
					<img src = "/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $user['avatar']; ?>" height="200px" class="wow fadeInDown animated" data-wow-delay=".5s" style="position:absolute;"/>
					</div>
					
					
					<!--<h2 class="wow fadeInDown animated" data-wow-delay=".5s">Blog truyện</h2>-->
					
				</div>
				<div class="blog-top-grids">
					<div class="col-md-8 blog-top-left-grid">
						<?php 
							if(count($share) > 0){
								foreach ($share as $key => $value) {
							
						?>
						<div class="left-blog">
							<div class="blog-left">
								<div class="blog-left-left wow fadeInUp animated" data-wow-delay=".5s">
									<p><?php echo $user['name']." đã chia sẻ lúc ".$value['created_at']; ?></p>
									<p>Posted By <a href="#"><?php echo $post_share[$value['post_id']]['name']; ?></a> &nbsp;&nbsp; on <?php echo $post_share[$value['post_id']]['created_at']; ?> &nbsp;&nbsp; <a href="#">Comments (10)</a></p>
									<a href="?mode=post&act=postDetail&key=<?php echo md5($value['post_id']); ?>&title=<?php echo $post_share[$value['post_id']]['title']; ?>"><img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $post_share[$value['post_id']]['thumbnail']; ?>" alt="" /></a>
								</div>
								<div class="blog-left-right wow fadeInUp animated" data-wow-delay=".5s">
									<a href="?mode=post&act=postDetail&key=<?php echo md5($value['post_id']); ?>&title=<?php echo $post_share[$value['post_id']]['title']; ?>"><?php echo $post_share[$value['post_id']]['title']; ?> </a>
									<p>
										<?php echo $post_share[$value['post_id']]['description']; ?>
									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<?php } }else{ foreach ($posts as $key => $value) {?>
						<div class="left-blog">
							<div class="blog-left">
								<div class="blog-left-left wow fadeInUp animated" data-wow-delay=".5s">
									<p>Posted By <a href="#"><?php echo $user['name']; ?></a> &nbsp;&nbsp; on <?php echo $value['created_at']; ?> &nbsp;&nbsp; <a href="#">Comments (10)</a></p>
									<a href="?mode=post&act=postDetail&key=<?php echo md5($value['post_id']); ?>&title=<?php echo $value['title']; ?>"><img src="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/<?php echo $value['thumbnail']; ?>" alt="" /></a>
								</div>
								<div class="blog-left-right wow fadeInUp animated" data-wow-delay=".5s">
									<a href="?mode=post&act=postDetail&key=<?php echo md5($value['post_id']); ?>&title=<?php echo $value['title']; ?>"><?php echo $value['title']; ?> </a>
									<p>
										<?php echo $value['content']; ?>
									</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<?php }} ?>
					</div>
					<div class="col-md-4 blog-top-right-grid">
						<div class="Categories wow fadeInUp animated" data-wow-delay=".5s">
							<h3>Categories</h3>
							<ul>
								<li><a href="#">Phasellus sem leo, interdum quis risus</a></li>
								<li><a href="#">Nullam egestas nisi id malesuada aliquet </a></li>
								<li><a href="#"> Donec condimentum purus urna venenatis</a></li>
								<li><a href="#">Ut congue, nisl id tincidunt lobor mollis</a></li>
								<li><a href="#">Cum sociis natoque penatibus et magnis</a></li>
								<li><a href="#">Suspendisse nec magna id ex pretium</a></li>
							</ul>
						</div>
						<div class="Categories wow fadeInUp animated" data-wow-delay=".5s">
							<h3>Archive</h3>
							<ul class="marked-list offs1">
								<li><a href="#">May 2016 (7)</a></li>
								<li><a href="#">April 2016 (11)</a></li>
								<li><a href="#">March 2016 (12)</a></li>
								<li><a href="#">February 2016 (14)</a> </li>
								<li><a href="#">January 2016 (10)</a></li>    
								<li><a href="#">December 2016 (12)</a></li>
								<li><a href="#">November 2016 (8)</a></li>
								<li><a href="#">October 2016 (7)</a> </li>
								<li><a href="#">September 2016 (8)</a></li>
								<li><a href="#">August 2016 (6)</a></li>                          
							</ul>
						</div>
						<div class="comments">
							<h3 class="wow fadeInUp animated" data-wow-delay=".5s">Recent Comments</h3>
							<div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
								<div class="col-md-3 comments-left">
									<img src="images/t1.jpg" alt="" />
								</div>
								<div class="col-md-9 comments-right">
									<h5>Admin</h5>
									<a href="#">Phasellus sem leointerdum risus</a> 
									<p>March 16,2016 6:09:pm</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
								<div class="col-md-3 comments-left">
									<img src="images/t2.jpg" alt="" />
								</div>
								<div class="col-md-9 comments-right">
									<h5>Admin</h5>
									<a href="#">Phasellus sem leointerdum risus</a> 
									<p>March 16,2016 6:09:pm</p>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="comments-text wow fadeInUp animated" data-wow-delay=".5s">
								<div class="col-md-3 comments-left">
									<img src="images/t3.jpg" alt="" />
								</div>
								<div class="col-md-9 comments-right">
									<h5>Admin</h5>
									<a href="#">Phasellus sem leointerdum risus</a> 
									<p>March 16,2016 6:09:pm</p>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container -->
		</div>
	<!-- //blog -->
<?php include_once('view/layouts/Footer.php'); ?>