<?php 
	include_once('Model/Like.php');

	class LikeController{
		public $likeModel;

		public function __construct(){
			$this->likeModel = new Like();
		}
	}
?>