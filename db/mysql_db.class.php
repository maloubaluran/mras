<?php
	class mysql_db{
		var $conn = null;
		
		/* configuration */
		var $host = "localhost";
		var $user = "root";
		var $pass = "";
		var $dbname = "mras";
		
		function __construct(){
			$this->conn = mysql_connect($this->host,$this->user,$this->pass);
			mysql_select_db($this->dbname,$this->conn);
		}
		
		function mysql_db($host,$user,$pass,$dbname){
			$this->conn = mysql_connect($host,$user,$pass);
			mysql_select_db($dbname,$this->conn);
		}
		
		function fieldnames($sql){
			$results = $this->query($sql);
			$names = array();
			$i = 0;
			while($data = mysql_fetch_array($results)){
				array_push($names,$data['Field']);
			}
			return $names;
			
		}
		
		function query($sql){
			$results = mysql_query($sql,$this->conn);
			return $results;
		}
		
		function getConn(){
			return $this->conn;
		}
		
		function close(){
			mysql_close($this->conn);
		}
	}
?>