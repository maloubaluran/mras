<?php
	require_once( "model.class.php" );
	
	class TestType extends Model{
		private $conn = null;
		
		function __construct($conn){
			$this->conn = $conn;
			parent::set_conn($conn);
			parent::set_table("testtype");
			parent::set_dbname("mras");
		}
		
	}
?>