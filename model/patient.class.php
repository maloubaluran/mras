<?php
	require_once( "model.class.php" );
	
	class Patient extends Model{
		private $conn = null;
		
		function __construct($conn){
			$this->conn = $conn;
			parent::set_conn($conn);
			parent::set_table("patient");
			parent::set_dbname("mras");
		}
		
		function search1($data){
			$debug = 0;
			$sql = "
				SELECT id, concat(l_name,', ',f_name) as name, homeadd 
				FROM patient
				WHERE l_name LIKE '".$data['l_name']."%'
			";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else if($data['l_name'] == ""){
				return "";
			}
			else return $results;
		}
		
		function search2($data){
			$debug = 0;
			$sql = "
				SELECT id, l_name ,f_name, homeadd, telno 
				FROM patient
				WHERE l_name LIKE '".$data['l_name']."%'
			";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			return $results;
		}
		
		function search_pr($id){
			$debug = 0;
			$sql = "
				SELECT p.id, pr.id as rec_id, p.l_name, p.f_name, p.homeadd, pr.dateStored
				FROM patient p, patientrecord pr
				WHERE p.id = pr.patientId
				";
			if($id!="")	$sql.=" AND p.id = ".$id;
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			return $results;
		}
		
	}
?>