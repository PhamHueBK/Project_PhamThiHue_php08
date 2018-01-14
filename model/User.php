<?php 
	include_once('model/Model.php');

	class User extends Model{
		public $table = "users";
		public $primaryKey = "user_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>