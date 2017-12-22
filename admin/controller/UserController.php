<?php 
	include_once('model/User.php');

	class UserController{
		public $userModel;

		public function __construct(){
			$this->userModel = new User();
		}

		public function login(){
			require_once('view/user/login.php');
		}

		public function loginSuccess(){

		}

		public function logout(){

		}

		public function index(){
			
		}
	}
?>