<?php
	require 'config.php';

	class DB_class{
		public $host = db_host;
		public $user = db_user;
		public $pass = db_pass;
		public $dbname = db_name;
		public $conn;
		public $error;
		public $table;

		public function __construct(){
			$this->connect();
			$this->table = "user_register";
		}

		private function connect(){
			try {
				$this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				return $this->conn;
			} catch(PDOException $e) {
				echo "Connection failed: " . $e->getMessage();
			}
		}

		public function insert($data) {

			$keys = implode(',', array_keys($data));
			$values = ":" . implode(',:', array_keys($data));

			$qmarkvalues = trim( str_repeat("?,", count($data)), ",");

			$sql = "INSERT INTO `$this->table` ($keys) VALUES ($values)";

			$stmt = $this->conn->prepare($sql) or die($this->conn->error);

			foreach($data as $key => $value) {
				if($stmt->bindValue(":$key", $value))
					continue;
			}

			return $stmt->execute();
		}
	}
?>
