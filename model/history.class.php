<?php
	require_once( "model.class.php" );
	
	class History extends Model{
		private $conn = null;
		
		function __construct($conn){
			$this->conn = $conn;
			parent::set_conn($conn);
			parent::set_table("history");
			parent::set_dbname("mras");
		}

		function search2($data){
			$debug = 0;
			$sql = "SELECT * 
				FROM history, patient
				WHERE patient.id = patientId ";	
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
		
		function display($data){
			$debug = 0;
			$sql = "SELECT * 
				FROM history, patient
				WHERE patient.id = patientId ";	
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;

		}
	}
?>