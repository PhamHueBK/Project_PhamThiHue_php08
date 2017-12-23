<?php 
	include_once('Model/Model.php');

	class Like extends Model{
		public $table = "likes";
		public $primaryKey = "like_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>