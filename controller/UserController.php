<?php 
	include_once('model/User.php');
	include_once('model/Share.php');
	include_once('model/Post.php');

	class UserController{
		public $userModel;
		public $shareModel;
		public $postModel;

		public function __construct(){
			$this->userModel = new User();
			$this->shareModel = new Share();
			$this->postModel = new Post();
		}

		public function login(){
			require_once('view/user/login.php');
		}

		public function loginSuccess(){
			$email = $_POST['email'];
			$password = md5($_POST['password']);
			$condition = "where email = '".$email."' AND password = '".$password."'";
			$users = $this->userModel->getAll($condition);
			$data = array();
			if(count($users) > 0){
				$data = $users[0];
				$_SESSION['user'] = $data;
			}
			else
			{
				$_SESSION['isLogin'] = false;
			}
			header('Location: ?mode=home&act=index');
		}

		public function logout(){
			unset($_SESSION['user']);
			header('Location: ?mode=home&act=index');
		}

		public function signup(){
			require_once('view/user/signup.php');
		}

		public function create(){
			$datas = $_POST;
			$data = array();
			$data['name'] = "N'".$datas['name']."'";
			$data['email'] = "'".$datas['email']."'";
			$data['password'] = "'".md5($datas['password'])."'";
			$data['key_md5'] = $data['password'];
			$data['permission'] = 0;

			$data = $this->userModel->insert($data);
			
			require_once('view/user/login.php');
		}
		public function profile(){
			$data = $_SESSION['user'];
			require_once('view/user/profile.php');
		}

		public function update(){
			$data_old = $_SESSION['user'];
			$data_new = $_POST;
			$data = array();
			$isChange = false;
			$url_img = "";

			if($_FILES['file']['type'] == "image/jpeg"
		      || $_FILES['file']['type'] == "image/png"
		      || $_FILES['file']['type'] == "image/gif"){ 
		    // là file ảnh
		    // Tiến hành code upload
			    if($_FILES['file']['size'] < 1048576)
	            {
	                // file hợp lệ, tiến hành upload
	                $path = "admin/view/images/"; // file sẽ lưu vào thư mục data
	                $tmp_name = $_FILES['file']['tmp_name'];
	                $name = $_FILES['file']['name'];
	                $type = $_FILES['file']['type']; 
	                $size = $_FILES['file']['size']; 
	                // Upload file
	                move_uploaded_file($tmp_name,$path.$name);
	                
	                $url_img = $name;
	            }
	        }

			if($data_old['name'] != $data_new['name'])
				$isChange = true;
			if($data_old['email'] != $data_new['email'])
				$isChange =  true;
			if($data_old['birthday'] != $data_new['birthday'])
				$isChange = true;
			if($data_old['address'] != $data_new['address'])
				$isChange = true;
			if($data_old['mobile'] != $data_new['mobile'])
				$isChange = true;
			if($data_old['gender'] != $data_new['gender'])
				$isChange = true;
			if($url_img != "")
				$isChange = true;

			if(!$isChange)
				$_SESSION['update'] = false;
			else
			{
				$data['name'] = "N'".$data_new['name']."'";
				$data['email'] = "'".$data_new['email']."'";
				$data['birthday'] = "'".$data_new['birthday']."'";
				$data['address'] = "N'".$data_new['address']."'";
				$data['mobile'] = "'".$data_new['mobile']."'";
				$data['gender'] = "N'".$data_new['gender']."'";
				
				if($url_img != "")
					$data['avatar'] = "'".$url_img."'";
				//echo $data['avatar'];

				$data = $this->userModel->update($data, $data_new['user_id']);
				if(count($data) > 0){
					$_SESSION['user'] = $data;
					$_SESSION['update'] = true;
				}
			}
			/*print_r($data);
			die;*/
			header('Location: ?mode=user&act=profile');
		}

		public function changePass(){
			require_once('view/user/changePass.php');
		}
		public function changePassSuccess(){
			$passwordOld = $_POST['passwordOld'];
			$passwordNew = $_POST['passwordNew'];
			$passwordNewAgain = $_POST['passwordNewAgain'];
			if(md5($passwordOld) != $_SESSION['user']['password']){
				$_SESSION['changePass'] = "Mật khẩu cũ không chính xác";
				header('Location: ?mode=user&act=changePass');
			}
			elseif(md5($passwordNew) == md5($passwordOld)){
				$_SESSION['changePass'] = "Mật khẩu không đổi";
				header('Location: ?mode=user&act=changePass');
			}
			elseif(md5($passwordNew) != md5($passwordNewAgain)){
				$_SESSION['changePass'] = "Mật khẩu hai lần nhập phải giống nhau";
				header('Location: ?mode=user&act=changePass');
			}
			else
			{
				$data['password'] = "'".md5($passwordNew)."'";
				$data = $this->userModel->update($data, $_SESSION['user']['user_id']);
				if(count($data) > 0)
					$_SESSION['user'] = $data;
				header('Location: ?mode=user&act=profile');
			}
			
		}

		public function trangCaNhan(){
			$key_md5 = $_GET['user_id'];
			$user = $this->userModel->findMd5($key_md5);
			$condition = "where user_id = ".$user['user_id']." order by created_at ASC";
			$posts = $this->postModel->getAll($condition);
			/*print_r($user);
			die;*/
			$condition = "where shares.user_id = ".$user['user_id'];
			$share = $this->shareModel->getAll($condition);
			$post_share = array();
			if(count($share) > 0){
				$share['created_at'] = date('d/m/Y', strtotime($share['created_at']));
				foreach ($share as $key => $value) {
					$post_id = $value['post_id'];
					$condtion2 = "join users on users.user_id = posts.user_id where post_id = ".$post_id;
					$postShare = $this->postModel->getAll($condtion2);
					$post_share[$postShare['post_id']] = $postShare;
				}
			}
			require_once('view/user/trangCaNhan.php');
		}
	}
?>