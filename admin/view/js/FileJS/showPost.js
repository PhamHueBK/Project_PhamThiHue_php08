$(function(){
	var key = $('#Mainkey_md5').val();
	$.ajax({
		type: "get",
		url: '?mode=post&act=showCT&key='+key,
  		data: {
  			
  		},
  		success: function(res)
  		{
    		console.log(res);
    		if(!res.error) {
    			var start = res.indexOf("{");
    			var end = res.lastIndexOf("}");
    			var response = res.substring(start, end+1);
      			
      			console.log(result);
      			//var status = result.status;
      			if(response.length > 0){
      				var result = JSON.parse(response);
	                var data = result;
	                $('#Mainpost_id').val(data.post_id);
	                $('#Mainkey_md5').val(data.key_md5);
	                $('#Maintitle').val(data.title);
	                $('#Maincontent').val(data.content);
	                $('#Maintype').val(data.type);
	                $('#Maindescription').val(data.description);
	                console.log(data.avatar);
	                var html = '<img src = "view/images/'+data.thumbnail+'" width="200px" height="200px"/>';
	                console.log("HTLLo");
	               	$('#Mainthumbnail').append(html);

	                $('#post_id').val($('#Mainpost_id').val());
				    $('#key_md5').val($('#Mainkey_md5').val());
				    $('#title').val($('#Maintitle').val());
				    $('#content').val($('#Maincontent').val());
				    $('#description').val($('#Maindescription').val());
				    
				    $('#type').val($('#Maintype').val());
				    $('#thumbnail').append(html);
              	}
            }
  		},
  		error: function (xhr, ajaxOptions, thrownError) {
    		toastr.error('Error', 'Nafosted-Error',{timeOut: 1000})

  		}
	});

	$('#updateBtn').click(function(){
		var key_md5 = $('#key_md5').val();
		var post_id = $('#post_id').val();
		var title = $('#title').val();
		var content = $('#content').val();
		var description = $('#description').val();
		var type = $('#type').val();
		var tmp_name = $('#file').val();
		var thumbnail = tmp_name.substring(tmp_name.lastIndexOf("\\")+1, tmp_name.length);
		$.ajax({
			type: "post",
			url: '?mode=post&act=update',
	  		data: {
	  			key_md5 : key_md5,
	  			post_id : post_id, 
	  			title : title,
	  			content : content,
	  			description : description,
	  			type : type,
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
		                $('#Mainpost_id').val(data.post_id);
		                $('#Mainkey_md5').val(data.key_md5);
		                $('#Maintitle').val(data.title);
		                $('#Maincontent').val(data.content);
		                $('#Maintype').val(data.type);
		                $('#Maindescription').val(data.description);
		                console.log(data.description);
		                var html = '<img src = "view/images/'+data.thumbnail+'" width="200px" height="200px"/>';
		                console.log("HTLLo");
		               	$('#Mainthumbnail').html(html);
		                toastr.success('Cập nhật bài viết thành công!', 'Nafosted',{timeOut: 1000});
	              	}
	              	else{
	                	toastr.error('Cập nhật bài viết không thành công!', 'Nafosted',{timeOut: 1000})
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


