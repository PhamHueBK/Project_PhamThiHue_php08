<?php 
	include_once('model/Connection.php');

	class Model{
		public $conn;
		public $table = "";
		public $primaryKey = "";

		public function __construct(){
			$connect = new Connection();
			$this->conn = $connect->conn;
		}

		public function All(){

		}

		public function find($id){

		}

		public function insert($data){

		}

		public function update($data){

		}

		public function delete($id){
			
		}
	}
?>