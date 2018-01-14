<?php 
	include_once('model/User.php');
	include_once('Controller/Controller.php');

	class UserController extends Controller{
		public $userModel;

		public function __construct(){
			$this->userModel = new User();
		}

		public function login(){
			require_once('view/user/login.php');
		}

		public function loginSuccess(){
			$email = $_POST['email'];
			$password = md5($_POST['password']);

			$condition = "where email = '".$email."'AND password = '".$password."' AND permission = 1 OR permission = 2";
			$data = $this->userModel->getAll($condition);
			$user = array();

			if(count($data)){
				$user = $data[0];
				$_SESSION['admin'] = $user;
				header('Location: ?mode=home&act=index');
			}
			else
			{
				$_SESSION['isLogin'] = false;
				header('Location: ?mode=user&act=login');
			}

		}

		public function logout(){
			unset($_SESSION['admin']);
			header('Location: ?mode=user&act=login');
		}	

		public function index(){
			$permission = 3;
			if(!isset($_GET['permission'])){
				$data = $this->userModel->All();
				require_once('view/user/index.php');
			}
			else{
				$permission = $_GET['permission'];
				if($permission == 1|| $permission == 0){
					$condition = "where permission = ".$permission;
					$data = $this->userModel->getAll($condition);
				}
				else
					$data = $this->userModel->All();
					$jSonData = json_encode($data, false);
	     			echo $jSonData;
			}
			
		}

		public function profile(){
			$key = $_GET['key'];
			require_once('view/user/show.php');
		}

		public function show(){
			$key = $_GET['key'];
			
			if($key == $_SESSION['admin']['key_md5'])
			{
				$data = $_SESSION['admin'];
			}
			else
			{
				$data = $this->userModel->findMd5($key);
			}

			$jSonData = json_encode($data, false);
			
     		echo $jSonData;
     		//require_once('view/user/show.php');
		}

		public function update(){
			$data = $_POST;
			$primary_key_value = $data['user_id'];
			$data['key_md5'] = "'".md5($primary_key_value)."'";
			$data['name'] = "N'".$data['name']."'";
			$data['email'] = "N'".$data['email']."'";
			$data['birthday'] = "'".$data['birthday']."'";
			$data['address'] = "N'".$data['address']."'";
			$data['mobile'] = "'".$data['mobile']."'";
			$data['gender'] = "N'".$data['gender']."'";
			if($data['avatar'] != "")
				$data['avatar'] = "'".$data['avatar']."'";
			else
				unset($data['avatar']);

			unset($data['user_id']);
			$data = $this->userModel->update($data, $primary_key_value);
			if($primary_key_value == $_SESSION['admin']['user_id'])
				$_SESSION['admin'] = $data;
			$jSonData = json_encode($data, false);
     		echo $jSonData;
		}

		public function create(){
			$datas = $_POST;

			$datas['name'] = "N'".$datas['name']."'";
			$datas['email'] = "'".$datas['email']."'";
			$datas['password'] = "'".md5($datas['password'])."'";
			if($datas['birthday'] != "")
				$datas['birthday'] = "'".$datas['birthday']."'";
			else
				$datas['birthday'] = "'0000-00-00'";
			$datas['address'] = "N'".$datas['address']."'";
			$datas['mobile'] = "'".$datas['mobile']."'";
			$datas['gender'] = "N'".$datas['gender']."'";
			if($datas['avatar'] != "")
				$datas['avatar'] = "'".$datas['avatar']."'";
			else
				unset($datas['avatar']);
			
			$user = $this->userModel->insert($datas);
			$jSonData = json_encode($user, false);
     		echo $jSonData;
		}

		public function edit(){
			$user_id = $_POST['user_id'];
			$data = $this->userModel->find($user_id);
			$jSonData = json_encode($data, false);
     		echo $jSonData;
		}

		public function delete(){
			$user_id = $_POST['user_id'];
			$data = array();
     		$data['status'] = $this->userModel->delete($user_id);
     		$data['id'] = $user_id;
     		$jSonData = json_encode($data, false);
     		echo $jSonData;
		}
	}
?>