<?php include_once('view/layouts/Header.php'); ?>
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1"> 
		<div>
			<?php 
				if(isset($_SESSION['update'])){
					

					if($_SESSION['update'] == true){
						echo '<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Cập nhật thành công</strong></div>';
					}elseif($_SESSION['update'] == false) {
						echo '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Không có dữ liệu thay đổi</strong></div>';
					}
					unset($_SESSION['update']); 
				} 
			?>
		</div>
		<form action="?mode=user&act=update" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
			<div class="form-group">
				<legend>Hồ sơ của tui</legend>
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $data['user_id']; ?>"/>
			</div>
			<div class="form-group">
				<label>Họ và tên <span style="color:red;">(*)</span></label>
				<input type="txt" class="form-control" id="name" name="name" placeholder="Họ và tên" required="true" value="<?php echo $data['name']; ?>">
			</div>
			<div class="form-group">
				<label>Email <span style="color:red;">(*)</span></label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="true" value="<?php echo $data['email']; ?>">
			</div>
			<div class="form-group">
				<label>Avatar</label>
				<div>
					<?php if($data['avatar'] != NULL) echo '<img src="admin/view/images/'.$data['avatar'].'" width="200px" height="200px"/>';?> 
				</div>
				<div><input type="file" name="file" class="form-control"></div>
			</div>
			<div class="form-group">
				<label>Ngày sinh</label>
				<input type="date" class="form-control" id="birthday" name="birthday" value="<?php if($data['birthday'] != '0000-00-00') echo $data['birthday']; ?>">
			</div>
			<div class="form-group">
				<label>Địa chỉ</label>
				<input type="txt" class="form-control" id="address" name="address" value="<?php echo $data['address']; ?>">
			</div>
			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="txt" class="form-control" id="mobile" name="mobile" value="<?php  echo $data['mobile']; ?>">
			</div>
			<div class="form-group">
				<label>Giới tính</label>
				<div class="radio">
					<label>
						<input type="radio" name="gender" value="Name" id="genderMale" checked="<?php if($data['gender'] == "Nam") echo true; else echo false; ?>">
						Nam
					</label>
					<label>
						<input type="radio" name="gender" value="Nữ" id="genderMale" checked="<?php if($data['gender'] == "Nữ") echo true; else echo false; ?>">
						Nữ
					</label>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
			</div>
		</form>
	</div>
	

<?php include_once('view/layouts/Footer.php'); ?>