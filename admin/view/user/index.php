<?php 
	include_once('view/layouts/Header.php');
?>
	<script type="text/javascript" src="view/js/FileJS/indexUser.js"></script>
	<div>
		<table class="table table-hover" id="table">
			<thead>
				<tr>
					<th colspan="6"></th>
					<th style="text-align: right;">
						<div class="form-group">
							<div>
								<select onchange="selectPermission()" name="permission" id="permission" class="form-control" required="required">
									<option value="3">Tất cả</option>
									<option value="0">Người dùng thường</option>
									<option value="1">Quản trị bài viết</option>
								</select>
							</div>
						</div>
					</th>
				</tr>
				<tr>
					<th colspan="7">
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addUser">
							Thêm mới người dùng
						</button>
					</th>
				</tr>
				<tr class="flag">
					<th>Họ tên</th>
					<th>Email</th>
					<th>Avatar</th>
					<th>Số điện thoại</th>
					<th>Giới tính</th>
					<th>Ngày sinh</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="noiDung">
				<?php 
					foreach ($data as $key => $value) {
			
				?>
				<tr id="user_<?php echo $value['user_id'];?>">
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['email']; ?></td>
					<td><img src = "view/images/<?php echo $value['avatar']; ?>" width="100px" height="100px"/></td>
					<td><?php echo $value['mobile']; ?></td>
					<td><?php echo $value['gender']; ?></td>
					<td><?php echo $value['birthday']; ?></td>
					<td>
						<a href="?mode=user&act=profile&key=<?php echo $value['key_md5']; ?>" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>
						<a href="javascript:;" type="button" onclick="editUser(<?= ($value['user_id'])?>)" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>
						<a href="javascript:;" onclick="alertDel(<?php echo $value['user_id']; ?>)" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>

	</div>
	<!-- Modal -->
	<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title" id="exampleModalLongTitle">Thêm mới người dùng</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        			<form action="" method="POST" class="form-horizontal" role="form">
        					
    					<div class="form-group">
    						<label>Họ tên</label>
    						<input type="text" class="form-control" id="name" placeholder="Họ và tên">
    					</div>

    					<div class="form-group">
    						<label>Email</label>
    						<input type="email" class="form-control" id="email" placeholder="email" required="true">
    					</div>

    					<div class="form-group">
    						<label>Password</label>
    						<input type="password" class="form-control" id="password">
    					</div>

    					<div class="form-group">
    						<label>Avatar</label>
    						<div id="avatar_before"></div>
    						<input type="file" onchange="avatar()" class="form-control" id="file" name="file" required="true">
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
    								<input type="radio" name="gender" id="gender" value="Nam" checked="true">
    								Nam
    							</label>
    							<label>
    								<input type="radio" name="gender" id="gender" value="Nữ">
    								Nữ
    							</label>
    						</div>
    					</div>
    					<div class="form-group">
    						<label>Cấp quyền</label>
    						<div class="form-group">
								<div>
		    						<select id="permission_choose" class="form-control">
		    							<option value="0">
		    								Người dùng thường
		    							</option>
		    							<option value="1">
		    								Quản trị bài viết
		    							</option>
		    						</select>
	    						</div>
	    					</div>
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
        			<h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa thông tin người dùng</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
      			<div class="modal-body col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
        			<form action="" method="POST" class="form-horizontal" role="form">
    					<div class="form-group">
    						<input type="hidden" class="form-control" id="editUser_id">
    					</div>
    					
    					<div class="form-group">
    						<label>Họ tên</label>
    						<input type="text" class="form-control" id="editName" placeholder="Họ và tên">
    					</div>

    					<div class="form-group">
    						<label>Email</label>
    						<input type="email" class="form-control" id="editEmail" placeholder="email" required="true">
    					</div>

    					<div class="form-group">
                            <label>Avatar</label>
                            <div id="editAvatar">
                            
                            </div>
                            <div>
                                <input type="file" onchange="avatar2()" class="form-control" id="editFile" name="editFile" required="true">
                            </div>
                        </div>

    					<div class="form-group">
    						<label>Ngày sinh</label>
    						<input type="date" class="form-control" id="editBirthday">
    					</div>

    					<div class="form-group">
    						<label>Địa chỉ</label>
    						<input type="text" class="form-control" id="editAddress" placeholder="Địa chỉ">
    					</div>

    					<div class="form-group">
    						<label>Số điện thoại</label>
    						<input type="text" class="form-control" id="editMobile" placeholder="Số điện thoại">
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