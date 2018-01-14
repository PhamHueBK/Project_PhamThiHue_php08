<?php 
	include_once('model/Share.php');

	class ShareController{
		public $shareModel;

		public function __construct(){
			$this->shareModel = new Share();
		}
	}
?>