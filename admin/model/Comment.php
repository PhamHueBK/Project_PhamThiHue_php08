<?php 
	include_once('Model/Model.php');

	class Comment extends Model{
		public $table = "comments";
		public $primaryKey = "comment_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>