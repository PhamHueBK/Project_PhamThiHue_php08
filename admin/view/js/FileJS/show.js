$(function(){
	var key = $('#Mainkey_md5').val();
	$.ajax({
		type: "get",
		url: '?mode=user&act=show&key='+key,
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
	                $('#Mainuser_id').val(data.user_id);
	                $('#Mainkey_md5').val(data.key_md5);
	                $('#Mainname').val(data.name);
	                $('#Mainemail').val(data.email);
	                $('#Mainbirthday').val(data.birthday);
	                $('#Maingender').val(data.gender);
	                $('#Mainaddress').val(data.address);
	                $('#Mainmobile').val(data.mobile);
	                console.log(data.avatar);
	                var html = '<img src = "view/images/'+data.avatar+'" width="200px" height="200px"/>';
	                console.log("HTLLo");
	               	$('#Mainavatar').append(html);

	                $('#user_id').val($('#Mainuser_id').val());
				    $('#key_md5').val($('#Mainkey_md5').val());
				    $('#name').val($('#Mainname').val());
				    $('#email').val($('#Mainemail').val());
				    $('#birthday').val($('#Mainbirthday').val());
				    if(data.gender == "Nam")
	      				document.getElementById('editGenderMale').checked = true;
	      			else
	      				document.getElementById('editGenderFemale').checked = true;
				    
				    $('#address').val($('#Mainaddress').val());
				    $('#mobile').val($('#Mainmobile').val());
				    $('#avatar').append(html);
              	}
            }
  		},
  		error: function (xhr, ajaxOptions, thrownError) {
    		toastr.error('Error', 'Nafosted-Error',{timeOut: 1000})

  		}
	});

	$('#updateBtn').click(function(){
		var key_md5 = $('#key_md5').val();
		var user_id = $('#user_id').val();
		var name = $('#name').val();
		var email = $('#email').val();
		var birthday = $('#birthday').val();
		console.log(birthday);
		

		var address = $('#address').val();
		var mobile = $('#mobile').val();
		if(document.getElementById('editGenderMale').checked == true)
			gender = "Nam";
		else
			gender = "Nữ";
		var tmp_name = $('#file').val();
		var avatar = tmp_name.substring(tmp_name.lastIndexOf("\\")+1, tmp_name.length);
		$.ajax({
			type: "post",
			url: '?mode=user&act=update',
	  		data: {
	  			key_md5 : key_md5,
	  			user_id : user_id, 
	  			name : name,
	  			email : email,
	  			birthday : birthday,
	  			address : address,
	  			mobile : mobile,
	  			gender : gender,
	  			avatar : avatar,
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
		                $('#Mainuser_id').val(data.user_id);
		                $('#Mainkey_md5').val(data.key_md5);
		                $('#Mainname').val(data.name);
		                $('#Mainemail').val(data.email);
		                $('#Mainbirthday').val(data.birthday);
		                $('#Maingender').val(data.gender);
		                $('#Mainaddress').val(data.address);
		                $('#Mainmobile').val(data.mobile);
		                var html = '<img src = "view/images/'+data.avatar+'" width="200px" height="200px"/>';
		                console.log("HTLLo");
		                $('#Mainavatar').html(html);
		                toastr.success('Cập nhật thông tin thành công!', 'Nafosted',{timeOut: 1000});
	              	}
	              	else{
	                	toastr.error('Cập nhật thông tin không thành công!', 'Nafosted',{timeOut: 1000})
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
                url: '?mode=user&act=upload', // gửi đến file upload.php 
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


