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
			$sql = "select * from ".$this->table;
			mysqli_set_charset($this->conn, 'UTF8');
			$result = $this->conn->query($sql);
			$data = array();
			if(mysqli_num_rows($result) > 0){
				while($rows = mysqli_fetch_assoc($result)){
					$data[] = $rows;
				}
			}

			return $data;
		}

		public function getAll($condition){
			$sql = "select * from ".$this->table." ".$condition;
			/*echo $sql;
			die;*/
			mysqli_set_charset($this->conn, 'UTF8');
			$result = $this->conn->query($sql);
			$data = array();
			if(mysqli_num_rows($result) > 0){
				while($rows = mysqli_fetch_assoc($result)){
					$data[] = $rows;
				}
			}

			return $data;
		}

		public function find($id){
			$sql = "select * from ".$this->table." where ".$this->primaryKey." = '".$id."'";
			mysqli_set_charset($this->conn, 'UTF8');

			$result = $this->conn->query($sql);
			$data = array();
			if(mysqli_num_rows($result) > 0){
				$data = mysqli_fetch_assoc($result);
			}

			return $data;
		}

		public function findMd5($key){
			$sql = "select * from ".$this->table." where key_md5 = '".$key."'";
			mysqli_set_charset($this->conn, 'UTF8');

			$result = $this->conn->query($sql);
			$data = array();
			if(mysqli_num_rows($result) > 0){
				$data = mysqli_fetch_assoc($result);
			}

			return $data;
		}

		public function getList($data){
			$field = "";

			foreach ($data as $key => $value) {
				$field .= $key." = ".$value." AND ";
			}

			$sql = "select * from ".$this->table." where ".trim($field, " AND ");
			//return $sql;
			mysqli_set_charset($this->conn, 'UTF8');
			//die($sql);
			$result = $this->conn->query($sql);

			$data = array();

			//die($result->num_rows);
			if($result->num_rows > 0)
				$data = mysqli_fetch_assoc($result);

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
			unset($data[$this->primaryKey]);
			//return $this->getList($data);
			$dataRS = array();
			$data_result = "";
			
			if($result == 1)
			{
				$dataRS = $this->getList($data);
				$update = array();
				$update['key_md5'] = "'".md5($dataRS[$this->primaryKey])."'";
				$data_result = $this->update($update, $dataRS[$this->primaryKey]);
			}
			

			return $data_result;
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

			$data = $this->find($primary_key_value);

			return $data;
		}

		public function delete($id){
			$sql = "delete from ".$this->table." where ".$this->primaryKey." = ".$id;
			$result = $this->conn->query($sql);
			return ($result == 1);
		}
	}
?>