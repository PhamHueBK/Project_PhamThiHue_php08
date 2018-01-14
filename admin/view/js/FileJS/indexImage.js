$(function(){
	$('#ThemMoi').click(function(){
		var post_id = 'NULl';
		var title = $('#title').val();
		var type = $('#typeNew').val();

		var description = $('#description').val();
		//Xử lý ảnh
		var tmp_name = $('#file').val();
		var thumbnail = tmp_name.substring(tmp_name.lastIndexOf("\\")+1, tmp_name.length);

		//End xử lý ảnh
		$.ajax({
			type: "post",
			url: '?mode=post&act=create',
	  		data: {
	  			post_id : post_id, 
	  			title : title,
	  			type : type,
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
		                if(data.type == 9)
		                	data.type = "Ảnh nổi bật";
		                else
		                	data.type = "Ảnh chủ đề";

		                $('#addPost').modal('hide');
		                var html =  '<tr>'+
									'<td>'+data.title+'</td>'+
									'<td>'+data.description+'</td>'+
									'<td><img src ="view/images/'+data.thumbnail+'" width="100px" height="100px"/></td>'+
									'<td>'+data.type+'</td>'+
									'<td>'+data.name+'</td>'+
									'<td>'+data.created_at+'</td>'+
									'<td>'+data.views+'</td>'+
									'<td>'+
										'<a href="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/'+data.thumbnail+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editPost('+data.post_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data.post_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
									'</td>'+
								'</tr>';
						$(html).insertAfter('.flag');
		                toastr.success('Bài viết được khởi tạo thành công!', 'Nafosted',{timeOut: 1000});
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

	$('#updateBtn').click(function(){
		var post_id = $('#editPost_id').val();
		var title = $('#editTitle').val();
		var type = $('#editType').val();
		var description = $('#editDescription').val();
		var tmp_name = $('#editFile').val();
		var thumbnail = tmp_name.substring(tmp_name.lastIndexOf("\\")+1, tmp_name.length);
		$.ajax({
			type: "post",
			url: '?mode=post&act=update',
	  		data: {
	  			post_id : post_id, 
	  			title : title,
	  			type : type,
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
	      			$('#edit').modal('hide');
	      			if(response.length > 0){
	      				var result = JSON.parse(response);
		                var data = result;
		                if(data.type == 8)
		                	data.type = "Ảnh chủ đề";
		                else if(data.type == 9)
		                	data.type = "Ảnh nổi bật";
		                
		                var html =  '<td>'+data.title+'</td>'+
									'<td>'+data.description+'</td>'+
									'<td><img src ="view/images/'+data.thumbnail+'" width="100px" height="100px"/></td>'+
									'<td>'+data.type+'</td>'+
									'<td>'+data.name+'</td>'+
									'<td>'+data.created_at+'</td>'+
									'<td>'+data.views+'</td>'+
									'<td>'+
										'<a href="?mode=post&act=show&key='+data.key_md5+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editPost('+data.post_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data.post_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
									'</td>';
						$('#post_'+data.post_id).html(html);
		                toastr.success('Cập nhật bài viết thành công!', 'Nafosted',{timeOut: 1000});
	              	}
	              	else{
	                	toastr.error('Không thể cập nhật bài viết!', 'Nafosted',{timeOut: 1000})
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
})

function editPost(key) {

    $('#edit').modal('show');

    $.ajax({
        type: "post",
        url: "?mode=post&act=edit&key=" + key,
        data : {
        	post_id : key,
        },

        success: function(res)
        {
            console.log(res);
    		if(!res.error) {
    			var start = res.indexOf("{");
    			var end = res.lastIndexOf("}");
    			var response = res.substring(start, end+1);
      			
      			console.log(response);
      			if(response.length > 0){
      				var data = JSON.parse(response);
	      			$('#editPost_id').val(data.post_id);
	      			$('#editTitle').val(data.title);
	      			$('#editDescription').val(data.description);
	      			$('#editType').val(data.type);
	      			var html = '<img src = "view/images/'+data.thumbnail+'" width="200px" height="200px"/>';
	                console.log(html);
	               	$('#editAvatar').html(html);
	      			
              	}
              	else{
                	toastr.error('Cập nhật bài viết không thành công!', 'Nafosted',{timeOut: 1000})
              	}
      		}
        },
        error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
        }
    });

}

function alertDel(id){
  	var path = "?mode=post&act=delete&id=" + id;
  	swal(
  		{
		    title: "Bạn có chắc muốn xóa?",
		    // text: "Bạn sẽ không thể khôi phục lại bản ghi này!!",
		    type: "warning",
		    showCancelButton: true,
		    confirmButtonColor: "#DD6B55",
		    cancelButtonText: "Không",
		    confirmButtonText: "Có",
		    // closeOnConfirm: false,
  		},
	  	function(isConfirm) {
	    	if (isConfirm) {
	      		$.ajax({
		        	type: "POST",
		        	url: path,
		        	data : {
		        		post_id : id,
		        	},
		        	success: function(res)
		          	{
		            	console.log(res);
		            	if(!res.error) {
		              		toastr.success('Xóa thành công!');
		              		$('#post_'+id).remove();
		              
		            	}
		          	},
		          	error: function (xhr, ajaxOptions, thrownError) {
		            	toastr.error(thrownError);
		          	}
	        	});
		    } else {
		      	toastr.info("Thao tác xóa đã bị huỷ bỏ!");
		    }
	  	}
	);

}
function selectType(){
	var type = $('#type').val();
	console.log(type);
	if(type == 8){
		$.ajax({
			type: "get",
			url: '?mode=post&act=index&type='+type,
	  		data: {
	  		},
	  		success: function(res)
	  		{
	    		//console.log(res);
	    		if(!res.error) {
	    			var start = res.indexOf("[");
	    			var end = res.lastIndexOf("]");
	    			var response = res.substring(start, end+1);
	      			
	      			console.log(response);
	      			if(response.length > 0){
	      				var data = JSON.parse(response);
	      				var html = '';
	      				for(var i = 0; i < data.length; i++){
	      					html += '<tr id="post_"'+data[i].post_id+'>'+  
	      							'<td>'+data[i].title+'</td>'+
									'<td>'+data[i].description+'</td>'+
									'<td><img src ="view/images/'+data[i].thumbnail+'" width="100px" height="100px"/></td>'+
									'<td>'+data[i].type+'</td>'+
									'<td>'+data[i].name+'</td>'+
									'<td>'+data[i].created_at+'</td>'+
									'<td>'+data[i].views+'</td>'+
									'<td>'+
										'<a href="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/'+data[i].thumbnail+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editUser('+data[i].post_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data[i].post_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
									'</td>'
									'</tr>';
							
	      				}
	      				console.log(html);
	      				$('#noiDung').html(html);
	              	}
	              	else{
	                	toastr.error('Thao tác không thành công!', 'Nafosted',{timeOut: 1000})
	              	}
	              	
	            }
	  		},
	  		error: function (xhr, ajaxOptions, thrownError) {
	    		toastr.error('Error', 'Nafosted-Error',{timeOut: 1000})

	  		}	
		
		});
	}
	else
	{
		$.ajax({
			type: "get",
			url: '?mode=user&act=index&type=9',
	  		data: {
	  		},
	  		success: function(res)
	  		{
	    		console.log(res);
	    		if(!res.error) {
	    			var start = res.indexOf("[");
	    			var end = res.lastIndexOf("]");
	    			var response = res.substring(start, end+1);
	      			
	      			console.log(response);
	      			if(response.length > 0){
	      				var data = JSON.parse(response);
	      				var html = '';
	      				for(var i = 0; i < data.length; i++){
	      					html += '<tr id="post_"'+data[i].post_id+'>'+  
	      							'<td>'+data[i].title+'</td>'+
									'<td>'+data[i].description+'</td>'+
									'<td><img src ="view/images/'+data[i].thumbnail+'" width="100px" height="100px"/></td>'+
									'<td>'+data[i].type+'</td>'+
									'<td>'+data[i].name+'</td>'+
									'<td>'+data[i].created_at+'</td>'+
									'<td>'+data[i].views+'</td>'+
									'<td>'+
										'<a href="/ZentGroupEx/BuoiHoc/Project_PhamThiHue_php08/admin/view/images/'+data[i].thumbnail+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editPost('+data[i].post_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data[i].post_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
									'</td>'
									'</tr>';
							
	      				}
	      				console.log(html);
	      				$('#noiDung').html(html);
	              	}
	              	else{
	                	toastr.error('Lỗi hệ thống!', 'Nafosted',{timeOut: 1000})
	              	}
	              	
	            }
	  		},
	  		error: function (xhr, ajaxOptions, thrownError) {
	    		toastr.error('Error', 'Nafosted-Error',{timeOut: 1000})

	  		}	
		
		});
	}
}

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

function avatar2(){
	//Lấy ra files
    var file_data = $('#editFile').prop('files')[0];
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
    }
}

