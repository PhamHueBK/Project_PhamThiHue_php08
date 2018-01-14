<?php 
	class Connection{
		public $conn;

		public function __construct(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbName = "blog";

			$this->conn = mysqli_connect($servername, $username, $password, $dbName);

			if($this->conn->connect_error){
				die("Connect is failed: ".$this->conn->connect_error);
			}
		}
	}
?>