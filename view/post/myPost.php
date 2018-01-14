<?php include_once('view/layouts/Header.php'); ?>
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		<table class="table table-hover" id="table">
			<thead>
				<tr>
					<th>Tên bài viết</th>
					<th>Ngày gửi bài</th>
					<th>Trạng thái</th>
					<th>Lượt xem</th>
					<th></th>
				</tr>
			</thead>
			<tbody>	
				<?php 
					foreach ($data as $key => $value) {
					
				?>
				<tr>
					<td><?php echo $value['title']; ?></td>
					<td><?php echo $value['created_at']; ?></td>
					<td><?php echo $value['status']; ?></td>
					<td><?php echo $value['views']; ?></td>
					<td><a href="?mode=post&act=edit&post_id=<?php echo md5($value['post_id']); ?>" class="btn btn-primary">Sửa</a><a href="<?php if($value['status'] == "Đã phê duyệt") echo "?mode=post&act=show&post_id=".md5($value['post_id']); else echo "#"; ?>" class="btn btn-success">Xem</a><a href="?mode=post&act=delete&post_id=<?php echo md5($value['post_id']); ?>" class="btn btn-danger">Xóa</a></td>
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

<?php include_once('view/layouts/Footer.php'); ?>