<?php 
	class Controller{
		public function __construct(){
			
		}
		public function upload(){
			$duoi = explode('.', $_FILES['file']['name']); // tách chuỗi khi gặp dấu .
	        $duoi = $duoi[(count($duoi)-1)];//lấy ra đuôi file
	        //Kiểm tra xem có phải file ảnh không
	        if($duoi === 'jpg' || $duoi === 'png' || $duoi === 'gif' || $duoi === 'jpeg'){
	            //tiến hành upload
	            $url = 'C:\xampp\htdocs\ZentGroupEx\BuoiHoc\Project_PhamThiHue_php08\admin\view\images\\' . $_FILES['file']['name'];
	            if(move_uploaded_file($_FILES['file']['tmp_name'], $url)){
	                //Nếu thành công
	                echo $url;
	            } else{ //nếu k thành công
	                echo "Có lỗi"; //in ra thông báo
	            }
	        } else{ //nếu k phải file ảnh
	            echo "File không phải ảnh"; //in ra thông báo
	        }
		}
	}
?>