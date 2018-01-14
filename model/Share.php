<?php 
	include_once('model/Model.php');

	class Share extends Model{
		public $table = "shares";
		public $primaryKey = "share_id";

		public function __construct(){
			parent::__construct();
		}
	}
?>