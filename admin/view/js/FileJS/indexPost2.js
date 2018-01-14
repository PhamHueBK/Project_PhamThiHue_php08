$(function(){
	$('#updateBtn').click(function(){
		var post_id = $('#editPost_id').val();
		var title = $('#editTitle').val();
		//var content = $('#editContent').val();
		var content = CKEDITOR.instances.editContent.getData();
		var type = $('#editType').val();
		var status = 1;
		var description = $('#editDescription').val();
		var tmp_name = $('#editFile').val();
		var thumbnail = tmp_name.substring(tmp_name.lastIndexOf("\\")+1, tmp_name.length);
		$.ajax({
			type: "post",
			url: '?mode=post&act=update',
	  		data: {
	  			post_id : post_id, 
	  			title : title,
	  			content : content,
	  			status: status,
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
		                toastr.success('Phê duyệt bài viết thành công!', 'Nafosted',{timeOut: 1000});
		                window.location="?mode=post&act=index";
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
});

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
	      			$('#editContent').val(data.content);
	      			console.log(data.content);
	      			console.log($('#editContent').val());
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
  	var path = "?mode=post&act=update_delete&id=" + id;
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
					type: "post",
					url: path,
			  		data: {
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
			      				
				                toastr.success('Xóa bài viết thành công!', 'Nafosted',{timeOut: 1000});
				                window.location="?mode=post&act=index";
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
		    } else {
		      	toastr.info("Thao tác xóa đã bị huỷ bỏ!");
		    }
	  	}
	);

}
function selectType(){
	var type = $('#type').val();
	console.log(type);
	
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

function layGiaTri(){
	var content = CKEDITOR.instances.content.getData();
	console.log(content);
}

