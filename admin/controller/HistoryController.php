<?php 
	include_once('Model/History.php');

	class HistoryController{
		public $historyModel;

		public function __construct(){
			$this->historyModel = new History();
		}
	}
?>