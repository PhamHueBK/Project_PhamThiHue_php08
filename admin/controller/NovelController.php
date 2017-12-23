<?php 
	include_once('Model/Novel.php');

	class NovelController{
		public $novelModel;

		public function __construct(){
			$this->novelModel = new Novel();
		}
	}
?>