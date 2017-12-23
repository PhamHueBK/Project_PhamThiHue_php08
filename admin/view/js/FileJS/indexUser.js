$(function(){
	$('#ThemMoi').click(function(){
		var user_id = 'NULl';
		var name = $('#name').val();
		var email = $('#email').val();
		var password = $('#password').val();
		var birthday = $('#birthday').val();
		var permission = $('#permission_choose').val();

		if(birthday.length > 0){
			var startTime = birthday.indexOf("-");
			var nam = birthday.substring(0, startTime);
			birthday = birthday.substring(startTime+1, birthday.lenght);
			var thang = birthday.substring(0, birthday.indexOf("-"));
			birthday = birthday.substring(birthday.indexOf("-")+1, birthday.lenght);
			var ngay = birthday;
			birthday = nam+'-'+thang+'-'+ngay;
		}

		var address = $('#address').val();
		var mobile = $('#mobile').val();
		var gender = $('#gender').val();

		//Xử lý ảnh
		var tmp_name = $('#file').val();
		var avatar = tmp_name.substring(tmp_name.lastIndexOf("\\")+1, tmp_name.length);

		
		//End xử lý ảnh
		$.ajax({
			type: "post",
			url: '?mode=user&act=create',
	  		data: {
	  			user_id : user_id, 
	  			name : name,
	  			email : email,
	  			password : password,
	  			birthday : birthday,
	  			address : address,
	  			mobile : mobile,
	  			gender : gender,
	  			avatar : avatar,
	  			permission: permission,
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
		                $('#addUser').modal('hide');
		                var html =  '<tr>'+
									'<td>'+data.name+'</td>'+
									'<td>'+data.email+'</td>'+
									'<td><img src ="view/images/'+data.avatar+'" width="100px" height="100px"/></td>'+
									'<td>'+data.mobile+'</td>'+
									'<td>'+data.gender+'</td>'+
									'<td>'+data.birthday+'</td>'+
									'<td>'+
										'<a href="?mode=user&act=profile&key='+data.key_md5+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editUser('+data.user_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data.user_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
									'</td>'+
								'</tr>';
						$(html).insertAfter('.flag');
		                toastr.success('Thêm mới người dùng thành công!', 'Nafosted',{timeOut: 1000});
	              	}
	              	else{
	                	toastr.error('Thêm mới người dùng không thành công!', 'Nafosted',{timeOut: 1000})
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
		var user_id = $('#editUser_id').val();
		var name = $('#editName').val();
		var email = $('#editEmail').val();
		var birthday = $('#editBirthday').val();
		console.log(birthday);
		if(birthday.length > 0){
			var startTime = birthday.indexOf("-");
			var nam = birthday.substring(0, startTime);
			birthday = birthday.substring(startTime+1, birthday.lenght);
			var thang = birthday.substring(0, birthday.indexOf("-"));
			birthday = birthday.substring(birthday.indexOf("-")+1, birthday.lenght);
			var ngay = birthday;
			birthday = nam+'-'+thang+'-'+ngay;
		}
		

		var address = $('#editAddress').val();
		var mobile = $('#editMobile').val();
		var gender = $('#editGender').val();
		var tmp_name = $('#editFile').val();
		var avatar = tmp_name.substring(tmp_name.lastIndexOf("\\")+1, tmp_name.length);
		$.ajax({
			type: "post",
			url: '?mode=user&act=update',
	  		data: {
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
		                var html =  '<td>'+data.name+'</td>'+
									'<td>'+data.email+'</td>'+
									'<td><img src ="view/images/'+data.avatar+'" width="100px" height="100px"/></td>'+
									'<td>'+data.mobile+'</td>'+
									'<td>'+data.gender+'</td>'+
									'<td>'+data.birthday+'</td>'+
									'<td>'+
										'<a href="?mode=user&act=profile&key='+data.key_md5+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editUser('+data.user_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data.user_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
									'</td>';
						$('#user_'+data.user_id).html(html);
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
})

function editUser(key) {

    $('#edit').modal('show');

    $.ajax({
        type: "post",
        url: "?mode=user&act=edit&key=" + key,
        data : {
        	user_id : key,
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
	      			$('#editName').val(data.name);
	      			$('#editEmail').val(data.email);
	      			$('#editUser_id').val(data.user_id);
	      			$('#editBirthday').val(data.birthday);
	      			$('#editAddress').val(data.address);
	      			$('#editMobile').val(data.mobile);
	      			var html = '<img src = "view/images/'+data.avatar+'" width="200px" height="200px"/>';
	                console.log("HTLLo");
	               	$('#editAvatar').html(html);
	      			if(data.gender == "Nam")
	      				document.getElementById('editGenderMale').checked = true;
	      			else
	      				document.getElementById('editGenderFemale').checked = true;
	      			console.log(data.gender);
              	}
              	else{
                	toastr.error('Thêm mới người dùng không thành công!', 'Nafosted',{timeOut: 1000})
              	}
      		}
        },
        error: function (xhr, ajaxOptions, thrownError) {
            toastr.error(thrownError);
        }
    });

}

function alertDel(id){
  	var path = "?mode=user&act=delete&id=" + id;
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
		        		user_id : id,
		        	},
		        	success: function(res)
		          	{
		            	console.log(res);
		            	if(!res.error) {
		              		toastr.success('Xóa thành công!');
		              		$('#user_'+id).remove();
		              
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
function selectPermission(){
	var permission = $('#permission').val();
	console.log(permission);
	if(permission == 0){
		$.ajax({
			type: "get",
			url: '?mode=user&act=index&permission=0',
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
	      					html += '<tr id="user_"'+data[i].user_id+'>'+  
	      							'<td>'+data[i].name+'</td>'+
									'<td>'+data[i].email+'</td>'+
									'<td><img src ="view/images/'+data[i].avatar+'" width="100px" height="100px"/></td>'+
									'<td>'+data[i].mobile+'</td>'+
									'<td>'+data[i].gender+'</td>'+
									'<td>'+data[i].birthday+'</td>'+
									'<td>'+
										'<a href="?mode=user&act=profile&key='+data[i].key_md5+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editUser('+data[i].user_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data[i].user_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
									'</td>'
									'</tr>';
							
	      				}
	      				console.log(html);
	      				$('#noiDung').html(html);
	              	}
	              	else{
	                	toastr.error('Thêm mới người dùng không thành công!', 'Nafosted',{timeOut: 1000})
	              	}
	              	
	            }
	  		},
	  		error: function (xhr, ajaxOptions, thrownError) {
	    		toastr.error('Error', 'Nafosted-Error',{timeOut: 1000})

	  		}	
		
		});
	}
	else if(permission == 1)
	{
		$.ajax({
			type: "get",
			url: '?mode=user&act=index&permission=1',
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
	      					html += '<tr id="user_"'+data[i].user_id+'>'+  
	      							'<td>'+data[i].name+'</td>'+
									'<td>'+data[i].email+'</td>'+
									'<td><img src ="view/images/'+data[i].avatar+'" width="100px" height="100px"/></td>'+
									'<td>'+data[i].mobile+'</td>'+
									'<td>'+data[i].gender+'</td>'+
									'<td>'+data[i].birthday+'</td>'+
									'<td>'+
										'<a href="?mode=user&act=profile&key='+data[i].key_md5+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editUser('+data[i].user_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data[i].user_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
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
	else if(permission == 3)
	{
		$.ajax({
			type: "get",
			url: '?mode=user&act=index&permission=3',
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
	      					html += '<tr id="user_"'+data[i].user_id+'>'+  
	      							'<td>'+data[i].name+'</td>'+
									'<td>'+data[i].email+'</td>'+
									'<td><img src ="view/images/'+data[i].avatar+'" width="100px" height="100px"/></td>'+
									'<td>'+data[i].mobile+'</td>'+
									'<td>'+data[i].gender+'</td>'+
									'<td>'+data[i].birthday+'</td>'+
									'<td>'+
										'<a href="?mode=user&act=profile&key='+data[i].key_md5+'" class = "btn btn-primary" style="width: 100%; margin: 1%">Xem chi tiết</a>'+
										'<a href="javascript:;" onclick="editUser('+data[i].user_id+')" class = "btn btn-success" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Sửa thông tin</a>'+
										'<a href="javascript:;" onclick="alertDel('+data[i].user_id+')" class="btn btn-danger" style="width: 100%; margin: 1%"><i class="fa fa-trash-o"></i> Xóa</a>'+
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

