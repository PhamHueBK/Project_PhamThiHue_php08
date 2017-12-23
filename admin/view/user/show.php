<?php 
	include_once('view/layouts/Header.php');
?>
	<script type="text/javascript" src="view/js/FileJS/show.js"></script>
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		<form action="" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>Thông tin người dùng</legend>
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" id="Mainkey_md5" value="<?php echo $key; ?>">
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" id="Mainuser_id">
			</div>

			<div class="form-group">
				<label>Họ và tên</label>
				<input type="txt" readonly="true" class="form-control" id="Mainname" placeholder="Họ và tên">
			</div>
			
			<div class="form-group">
				<label>Email</label>
				<input type="email" readonly="true" class="form-control" id="Mainemail" placeholder="Email">
			</div>

            <div class="form-group">
                <label>Avatar</label>
                <div id="Mainavatar">
                    
                </div>
            </div>

			<div class="form-group">
				<label>Ngày sinh</label>
				<input type="date" readonly="true" class="form-control" id="Mainbirthday">
			</div>

			<div class="form-group">
				<label>Giới tính</label>
				<input type="text" readonly="true" class="form-control" id="Maingender" readonly="true" style="border: none">
			</div>

			<div class="form-group">
				<label>Địa chỉ</label>
				<input type="txt" readonly="true" class="form-control" id="Mainaddress" placeholder="Địa chỉ">
			</div>

			<div class="form-group">
				<label>Số điện thoại</label>
				<input type="txt" readonly="true" class="form-control" id="Mainmobile" placeholder="Số điện thoại">
			</div>
	
			<div class="form-group">
				<div>
					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit">
						Chỉnh sửa
					</button>
				</div>
			</div>
		</form>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin cá nhân</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        			<form action="" method="POST" class="form-horizontal" role="form">
        					<div class="form-group">
        						<input type="hidden" class="form-control" id="key_md5">
        					</div>

        					<div class="form-group">
        						<input type="hidden" class="form-control" id="user_id">
        					</div>
        					
        					<div class="form-group">
        						<label>Họ tên</label>
        						<input type="text" class="form-control" id="name" placeholder="Họ và tên">
        					</div>

        					<div class="form-group">
        						<label>Email</label>
        						<input type="email" class="form-control" id="email" placeholder="email" required="true">
        					</div>

                            <div class="form-group">
                                <label>Avatar</label>
                                <div id="avatar">
                                
                                </div>
                                <div>
                                    <input type="file" onchange="avatar()" class="form-control" id="file" name="file" required="true">
                                </div>
                            </div>

        					<div class="form-group">
        						<label>Ngày sinh</label>
        						<input type="date" class="form-control" id="birthday">
        					</div>

        					<div class="form-group">
        						<label>Địa chỉ</label>
        						<input type="text" class="form-control" id="address" placeholder="Địa chỉ">
        					</div>

        					<div class="form-group">
        						<label>Số điện thoại</label>
        						<input type="text" class="form-control" id="mobile" placeholder="Số điện thoại">
        					</div>

        					<div class="form-group">
        						<label>Giới tính</label>
        						<div class="radio">
        							<label>
        								<input type="radio" name="gender" id="editGenderMale" value="Nam">
        								Nam
        							</label>
        							<label>
        								<input type="radio" name="gender" id="editGenderFemale" value="Nữ">
        								Nữ
        							</label>
        						</div>
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