<?php 
	class Connection {
		public $conn;

		public function __construct(){
			$servername = "localhost";
			$username = "root";
			$password = "";
			$db_name = "blog";

			$this->conn = mysqli_connect($servername, $username, $password, $db_name);

			if($this->conn->connect_error){
				die("Conection is failed : ".$this->conn->connect_error);
			}
		}
	}
?>