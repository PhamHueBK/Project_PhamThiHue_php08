<?php 
	include_once('model/Model.php');

	class Type_novel extends Model{
		public $table = "type_novels";
		public $primaryKey = "type_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>