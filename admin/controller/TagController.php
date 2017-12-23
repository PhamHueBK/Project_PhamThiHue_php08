<?php 
	include_once('model/Tag.php');

	class TagController{
		public $tagModel;

		public function __construct(){
			$this->tagModel = new Tag();
		}
	}
?>