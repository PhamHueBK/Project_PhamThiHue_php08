<?php 
	include_once('Model/Model.php');

	class Post extends Model{
		public $table = "posts";
		public $primaryKey = "post_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>