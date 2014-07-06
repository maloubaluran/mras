<?php
	require_once( "model.class.php" );
	
	class Account extends Model{
		private $conn = null;
		
		function __construct($conn){
			$this->conn = $conn;
			parent::set_conn($conn);
			parent::set_table("account");
			parent::set_dbname("mras");
		}
		
		function history(){
			$debug = 0;
			$sql = "
				SELECT account.id as id, type, specialization, concat(l_name,', ',f_name) as name, deptName 
				FROM account, department
				WHERE department.id = departmentId
			";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			return $results;
		}
		
		function search_acct($data){
			$debug = 0;
			$sql = "
				SELECT DISTINCT account.id as id, type, position, concat(l_name,', ',f_name) as name, deptName, username 
				FROM account, department
				WHERE department.id = account.departmentId ";
			if($data['l_name']!="")	$sql .= " AND l_name LIKE '".$data['l_name']."%' ";
			if($data['f_name']!="")	$sql .= "	AND f_name LIKE '".$data['f_name']."%' ";
			if($data['deptName']!="") $sql .= "	AND deptName LIKE '".$data['deptName']."%' ";
			if($data['position']!="") $sql .= "	AND position LIKE '".$data['position']."%' ";
				
			
			//if(array_key_exists('search',$data))
				//$sql.= "AND type = 'doctor' ";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			return $results;
		}
		
		function search_acct2($data){
			$debug = 0;
			$sql = "
				SELECT DISTINCT account.id as id, type, position, concat(l_name,', ',f_name) as name, deptName 
				FROM account, department
				WHERE department.id = departmentId
				AND l_name LIKE '".$data['l_name']."%'
			";
			//if(array_key_exists('search',$data))
				//$sql.= "AND type = 'doctor' ";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else if($data['l_name']=="") return "";
			else return $results;
		}
		
		function search1($id){
			$debug = 0;
			$sql = "
				SELECT account.id as id, departmentId, type, position, l_name, f_name, m_name, username, password, deptName, ip, mac
				FROM account, department
				WHERE department.id = departmentId
				AND account.id = ".$id."
			";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
		
		function displayAll1(){
			$debug = 0;
			$sql = "
				SELECT account.id as id, type, concat(l_name,', ',f_name) as name, position, username, deptName
				FROM account, department
				WHERE department.id = departmentId
			";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
		
		function display_doctors(){
			$debug = 0;
			$sql = "
				SELECT account.id as id, type, concat(l_name,', ',f_name) as name, position
				FROM account, department
				WHERE department.id = departmentId
				AND type = 'doctor'
			";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
	}
?>