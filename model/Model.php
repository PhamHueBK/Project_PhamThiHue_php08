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

		public function findKey($id){
			$sql = "select * from ".$this->table." where ".$this->primaryKey." = ".$id;
			mysqli_set_charset($this->conn, 'UTF8');
			$result = $this->conn->query($sql);
			$data = array();
			if(mysqli_num_rows($result) > 0)
				$data = mysqli_fetch_assoc($result);

			return $data;
		}

		public function findMd5($id){
			$sql = "select * from ".$this->table." where key_md5 = '".$id."'";
			mysqli_set_charset($this->conn, 'UTF8');
			$result = $this->conn->query($sql);
			$data = array();
			if(mysqli_num_rows($result) > 0)
				$data = mysqli_fetch_assoc($result);

			return $data;
		}

		public function getAll($condition){
			$sql = "select * from ".$this->table." ".$condition;
			//die($sql);
			mysqli_set_charset($this->conn, 'UTF8');
			$result = $this->conn->query($sql);
			$data = array();
			if(mysqli_num_rows($result) > 0)
			{
				while($rows = mysqli_fetch_assoc($result))
					$data[] = $rows;
			}

			return $data;
		}

		public function All(){
			$sql = "select * from ".$this->table;
			mysqli_set_charset($this->conn, 'UTF8');
			$result = $this->conn->query($sql);
			$data = array();
			if(mysqli_num_rows($result) > 0)
			{
				while($rows = mysqli_fetch_assoc($result))
					$data[] = $rows;
			}

			return $data;
		}

		public function insert($data){
			$fields = "";
			$values = "";

			foreach ($data as $key => $value) {
				$fields .= ",$key";
				$values .= ",".$value."";
			}

			$sql = "INSERT INTO ".$this->table."(".trim($fields,",").") VALUES (".trim($values,",").")";
			//return $sql;
			mysqli_set_charset($this->conn, 'UTF8');
			$result = $this->conn->query($sql);
			$result_data = array();
			if($result == 1)
			{
				$condition = "ORDER BY user_id DESC";
				$data = $this->getAll($condition);
				$result_data = $data[0];
			}
			return $result_data;
		}

		public function update($data, $primary_key_value){
			$fields = "";
			foreach ($data as $key => $value) {
				$fields .= $key." = ".$value.",";
			}

			$sql = "update ".$this->table." set ".trim($fields, ",")." where ".$this->primaryKey." = ".$primary_key_value;
			//return $sql;
			mysqli_set_charset($this->conn, 'UTF8');
			$result = $this->conn->query($sql);

			$data = $this->findKey($primary_key_value);

			return $data;
		}

		public function delete($id){
			$sql = "delete from ".$this->table." where ".$this->primaryKey." = ".$id;
			$result = $this->conn->query($sql);
			return ($result == 1);
		}
	}
?>