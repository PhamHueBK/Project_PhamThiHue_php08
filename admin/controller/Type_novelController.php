<?php 
	include_once('model/Type_novel.php');

	class Type_novelController{
		public $typeModel;

		public function __construct(){
			$this->typeModel = new Type_novel();
		}
	}
?>