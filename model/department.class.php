<?php
	require_once( "model.class.php" );
	
	class Department extends Model{
		private $conn = null;
		
		function __construct($conn){
			$this->conn = $conn;
			parent::set_conn($conn);
			parent::set_table("department");
			parent::set_dbname("mras");
		}
		
		function search_dept($data){
			$debug = 0;
			$sql = "SELECT * FROM department 
				WHERE deptName LIKE '".$data['deptName']."%'";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
	}
?>