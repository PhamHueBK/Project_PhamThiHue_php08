<?php 
	include_once('view/layouts/Header.php');
?>
    <script type="text/javascript" src='view/js/ckeditor.js'></script>
	<script type="text/javascript" src="view/js/FileJS/showPost.js"></script>
    <script type="text/javascript">
        $(function () {
            CKEDITOR.replace('content');
        })
    </script>
	<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
		<form action="" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>Chi tiết bài đăng</legend>
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" id="Mainkey_md5" value="<?php echo $key; ?>">
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" id="Mainpost_id" disabled="true">
			</div>

			<div class="form-group">
				<label>Tiêu đề</label>
				<input type="txt" readonly="true" class="form-control" id="Maintitle" placeholder="Tiêu đề" disabled="true">
			</div>
			
			<div class="form-group">
				<label>Nội dung</label>
				<!--<input type="txt" readonly="true" class="form-control" id="Maincontent" placeholder="Nội dung" disabled="true">-->
                <div id="Maincontent" style="background: #eeeeee; padding-left: 2%; padding-bottom: 2%; padding-top: 2%">
                    
                </div>
			</div>

            <div class="form-group">
                <label>Ảnh đại diện</label>
                <div id="Mainthumbnail">
                    
                </div>
            </div>
            <div class="form-group">
                <label>Chuyên mục <span style="color: red">*</span></label>
                <div class="form-group">
                <div>
                    <select name="type" id="Maintype" class="form-control" required="required" disabled="true">
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
			<div class="form-group">
				<label>Mô tả</label>
				<input type="txt" readonly="true" class="form-control" id="Maindescription">
			</div>

			<div class="form-group">
				<label>Từ khóa</label>
				<input type="text" readonly="true" class="form-control" id="Maintag" >
			</div>
	
			<div class="form-group">
				<div>
					<button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#edit">
						Chỉnh sửa
					</button>
				</div>
			</div>
		</form>
	</div>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Chỉnh sửa bài viết</h5>
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
                            <input type="hidden" class="form-control" id="post_id">
                        </div>
                        
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input type="txt" class="form-control" id="title" placeholder="Tiêu đề">
                        </div>
                        
                        <div class="form-group">
                            <label>Nội dung</label>
                            <!--<input type="txt" class="form-control" id="content" placeholder="Nội dung">-->
                            <textarea style="border:1px" class="form-control" id="content" name="content" required="true" cols="60" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <div id="thumbnail">
                                
                            </div>
                            <div>
                                <input type="file" class="form-control"  name="file" id="file" onchange="avatar()">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input" class="col-xs-2 col-sm-2 col-md-2 control-label">Thể loại</label>
                            <div class="col-sm-10 col-xs-10 col-md-10">
                                <select name="type" id="type" class="form-control" required="true">
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
                        <div class="form-group">
                            <label>Mô tả</label>
                            <input type="txt" class="form-control" id="description">
                        </div>

                        <div class="form-group">
                            <label>Từ khóa</label>
                            <input type="text" class="form-control" id="tag">
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