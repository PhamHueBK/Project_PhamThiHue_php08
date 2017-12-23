<?php 
	include_once('Model/Model.php');

	class Novel extends Model{
		public $table = "novels";
		public $primaryKey = "novel_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>