<?php 
	include_once('Model/Model.php');

	class Tag extends Model{
		public $table = "tags";
		public $primaryKey = "tag_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>