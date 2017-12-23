<?php 
	include_once('Model/Model.php');

	class History extends Model{
		public $table = "histories";
		public $primaryKey = "history_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>