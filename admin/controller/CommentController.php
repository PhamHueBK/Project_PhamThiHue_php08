<?php 
	include_once('Model/Comment.php');

	class CommentController{
		public $commentModel;

		public function __construct(){
			$this->commentModel = new Comment();
		}
	}
?>