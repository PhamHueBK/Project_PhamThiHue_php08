<?php include_once('view/layouts/Header.php'); ?>
	<script type="text/javascript" src='view/js/ckeditor.js'></script>
	<script type="text/javascript">
        $(function () {
            CKEDITOR.replace('content');
        })
    </script>
	<div class="col-xs-10 col-xss-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1" style="border:1; margin-top: 2%; margin-bottom: 2%">
		<form action="" method="POST" class="form-horizontal" role="form">
			<div class="form-group">
				<legend>Bài viết mới</legend>
			</div>
			<div class="form-group">
				<input type="hidden" class="form-control" id="user_id" name="user_id" value="<?php echo $_SESSION['user']['user_id']; ?>" required="true">
			</div>
			<div class="form-group">
				<label>Tiêu đề <span style="color: red">*</span></label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề" required="true">
			</div>

			<div class="form-group">
				<label>Chuyên mục <span style="color: red">*</span></label>
				<div class="form-group">
				<div>
					<select name="type" id="type" name="typeNew" class="form-control" required="required">
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
				<input type="text" class="form-control" id="tags" value="" data-role="tagsinput" required="true" /> 
				<!--<input type="text" class="form-control" id="tag" required="true">-->
			</div>

			<div class="form-group">
				<label>Giới thiệu <span style="color: red">*</span></label>
				<input type="txt" class="form-control" id="description" name="description" required="true">
			</div>

			<div class="form-group">
				<label>Ảnh đại diện <span style="color: red">*</span></label>
				<div id="avatar_before"></div>
				<input type="file" onchange="avatar()" class="form-control" id="file" name="file" required="true">
			</div>
			
			
		</form>
		<div class="form-group">
			<div>
				<button type="submit" id="ThemMoi" class="btn btn-primary">Gửi bài</button>
			</div>
		</div>
	</div>
	<script language="javascript">
		$(function(){
			$('#ThemMoi').click(function(){
				var post_id = 'NULl';
				var title = $('#title').val();
				var type = $('#type').val();
				var tag = $('#tag').val();
				console.log(tag);
				//var content = $('#content').val();
				var content = CKEDITOR.instances.content.getData();
				var description = $('#description').val();
				//Xử lý ảnh
				var tmp_name = $('#file').val();
				var thumbnail = tmp_name.substring(tmp_name.lastIndexOf("\\")+1, tmp_name.length);

				console.log("HELLO");
				//End xử lý ảnh
				$.ajax({
					type: "post",
					url: '?mode=post&act=create',
			  		data: {
			  			post_id : post_id, 
			  			title : title,
			  			type : type,
			  			content : content,
			  			description : description,
			  			thumbnail : thumbnail,
			  		},
			  		success: function(res)
			  		{
			    		console.log(res);
			    		if(!res.error) {
			    			var start = res.indexOf("{");
			    			var end = res.lastIndexOf("}");
			    			var response = res.substring(start, end+1);
			      			
			      			console.log(response);
			      			//var status = result.status;
			      			
			      			if(response.length > 0){
			      				var result = JSON.parse(response);
				                var data = result;

				                
				                toastr.success('Gửi bài viết thành công, chờ phê duyệt!', 'Nafosted',{timeOut: 1000});
				                window.location="?mode=post&act=myPost";
			              	}
			              	else{
			                	toastr.error('Không thể đăng bài do lỗi hệ thống!', 'Nafosted',{timeOut: 1000})
			              	}
			            }
			            else {
			              	toastr.error('Error', 'Nafosted-Error',{timeOut: 1000})
			            }
			  		},
			  		error: function (xhr, ajaxOptions, thrownError) {
			    		toastr.error('Error', 'Nafosted-Error',{timeOut: 1000})

			  		}	
				
				});
			});
		});
		function avatar(){
			//Lấy ra files
		    var file_data = $('#file').prop('files')[0];
		    //lấy ra kiểu file
		    var type = file_data.type;
		    //console.log(type);
		    //Xét kiểu file được upload
		    var match= ["image/gif","image/png","image/jpg", "image/jpeg"];
		    var form_data = new FormData();
		        
		    //kiểm tra kiểu file
		    if(type == match[0] || type == match[1] || type == match[2] || type == match[3])
		    {
		        //khởi tạo đối tượng form data
		        //thêm files vào trong form data
		        form_data.append('file', file_data);
		        //sử dụng ajax post
		        $.ajax({
		            url: '?mode=post&act=upload', // gửi đến file upload.php 
		            dataType: 'text',
		            cache: false,
		            contentType: false,
		            processData: false,
		            data: form_data,                       
		            type: 'post',
		            success: function(res){
		                $('.status').text(res);
		                //$('#file').val('');
		                console.log(res);
		        	}
		    	});
		    } else{
		        $('.status').text('Chỉ được upload file ảnh');
		        //
		    }  
		}
	</script>
<?php include_once('view/layouts/Footer.php'); ?>