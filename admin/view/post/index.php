<?php 
	include_once('view/layouts/Header.php');
?>
	<script type="text/javascript" src='view/js/ckeditor.js'></script>
	<script type="text/javascript" src="view/js/FileJS/indexPost.js"></script>
	<script type="text/javascript">
        $(function () {
            CKEDITOR.replace('content');
            CKEDITOR.replace('editContent');
        })
    </script>
	<div>
		<table class="table table-hover" id="table">
			<thead>
				
				<tr>
					<th colspan="8">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addPost">
							Đăng bài mới
						</button>
					</th>
				</tr>
				<tr class="flag">
					<th>Tiêu đề</th>
					<th>Mô tả</th>
					<th>Ảnh đại diện</th>
					<th>Thể loại</th>
					<th>Tác giả</th>
					<th>Ngày đăng</th>
					<th>Lượt xem</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="noiDung">
				<?php 
					foreach ($data as $key => $value) {
			
				?>
				<tr id="post_<?php echo $value['post_id'];?>">
					<td><?php echo $value['title']; ?></td>
					<td><?php echo $value['description']; ?></td>
					<td><img src = "view/images/<?php echo $value['thumbnail']; ?>" width="100px" height="100px"/></td>
					<td><?php echo $value['type']; ?></td>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['created_at']; ?></td>
					<td><?php echo $value['views']; ?></td>
					<td>
						<a href="?mode=post&act=show&key=<?php echo md5($value['post_id']); ?>" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>
						<a href="javascript:;" type="button" onclick="editPost(<?= ($value['post_id'])?>)" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>
						<a href="javascript:;" onclick="alertDel(<?php echo $value['post_id']; ?>)" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
	<script type="text/javascript">
	    $(document).ready(function() {
	    $('#table').DataTable();
	} );
	</script>
	<!-- Modal -->
	<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Đăng bài mới</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        			<form action="" method="POST" class="form-horizontal" role="form">
        					
    					<div class="form-group">
    						<label>Tiêu đề <span style="color: red">*</span></label>
    						<input type="text" class="form-control" id="title" placeholder="Tiêu đề" required="true">
    					</div>

    					<div class="form-group">
    						<label>Chuyên mục <span style="color: red">*</span></label>
    						<div class="form-group">
							<div>
								<select name="type" id="typeNew" class="form-control" required="required">
									<option value="0">Truyện ngắn</option>
									<option value="1">Truyện blog</option>
									<option value="2">Tâm sự</option>
									<option value="3">Tiểu thuyết</option>
									<option value="4">Yêu</option>
									<option value="5">Sống</option>
									<option value="6">Bạn bè</option>
									<option value="7">Gia đình</option>
								</select>
							</div>
						</div>
    					</div>
    					<div class="form-group">
    						<label>Nội dung <span style="color: red">*</span></label>
    						<textarea style="border:1px" class="form-control" id="content" name="content" required="true" cols="60" rows="10" onchange="layGiaTri()"></textarea>
    						<!--<input type="text" class="form-control" id="content" required="true">-->
    					</div>
    					<div class="form-group">
    						<label>Từ khóa <span style="color: red">*</span></label>
    						<input type="text" class="form-control" value="" data-role="tagsinput" required="true" /> 
    						<!--<input type="text" class="form-control" id="tag" required="true">-->
    					</div>

    					<div class="form-group">
    						<label>Giới thiệu <span style="color: red">*</span></label>
    						<input type="txt" class="form-control" id="description" required="true">
    					</div>

    					<div class="form-group">
    						<label>Ảnh đại diện <span style="color: red">*</span></label>
    						<div id="avatar_before"></div>
    						<input type="file" onchange="avatar()" class="form-control" id="file" name="file" required="true">
    					</div>

        			</form>
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        			<button type="button" id="ThemMoi" class="btn btn-primary">Thêm mới</button>
      			</div>
    		</div>
  		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa bài đăng</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        			<form action="" method="POST" class="form-horizontal" role="form">
    					<div class="form-group">
    						<input type="hidden" class="form-control" id="editPost_id">
    					</div>
    					
    					<div class="form-group">
    						<label>Tiêu đề <span style="color: red">*</span></label>
    						<input type="text" class="form-control" id="editTitle" placeholder="Tiêu đề" required="true">
    					</div>

    					<div class="form-group">
    						<label>Chuyên mục <span style="color: red">*</span></label>
    						<div class="form-group">
							<div>
								<select name="type" id="editType" class="form-control" required="required">
									<option value="0">Truyện ngắn</option>
									<option value="1">Truyện blog</option>
									<option value="2">Tâm sự</option>
									<option value="3">Tiểu thuyết</option>
									<option value="4">Yêu</option>
									<option value="5">Sống</option>
									<option value="6">Bạn bè</option>
									<option value="7">Gia đình</option>
								</select>
							</div>
						</div>
    					</div>
    					<div class="form-group">
    						<label>Nội dung <span style="color: red">*</span></label>
    						<!--<input type="text" class="form-control" id="editContent" required="true">-->
    						<textarea style="border:1px" class="form-control" id="editContent" name="editContent" required="true" cols="60" rows="10"></textarea>
    					</div>
    					<div class="form-group">
    						<label>Từ khóa <span style="color: red">*</span></label>
    						<input type="text" class="form-control" id="tag" required="true">
    					</div>

    					<div class="form-group">
    						<label>Giới thiệu <span style="color: red">*</span></label>
    						<input type="txt" class="form-control" id="editDescription" required="true">
    					</div>

    					<div class="form-group">
    						<label>Ảnh đại diện <span style="color: red">*</span></label>
    						<div id="editAvatar"></div>
    						<input type="file" onchange="avatar2()" class="form-control" id="editFile" name="editFile" required="true">
    					</div>
        			</form>
      			</div>
      			<div class="modal-footer">
        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        			<button type="button" id="updateBtn" class="btn btn-primary">Cập nhật</button>
      			</div>
    		</div>
  		</div>
	</div>
<?php 
	include_once('view/layouts/Footer.php');
?>