<?php
class Model{

	private $conn = null;
	private $table = "";
	private $dbname = "";
	
	public function __construct(){
	}
	
	function set_conn($conn){
		$this->conn = $conn;
	}
	
	function set_table($tablename){
		$this->table = $tablename;
	}
	
	function set_dbname($dbname){
		$this->dbname = $dbname;
	}
	
	function fieldnames(){
		$debug = 0;
		$sql = "SHOW COLUMNS FROM ".$this->dbname.".".$this->table;
		if($debug) echo $sql;
		else return $this->conn->fieldnames($sql);
	}
	
	function add($data){
		$debug = 0;
		$sql = "INSERT INTO ".$this->table." ";
		$fieldnames = $this->fieldnames();		
		$columns = "";
		$values = "";
		if($data!=""){
			foreach($data as $field=>$value){
				if(in_array($field,$fieldnames)){
					if($value!=""){
						if($values!="") $values .= ", '".$value."' ";
						else $values .= " '".$value."' ";
						if($columns!="") $columns .= ", ".$field." ";
						else $columns .= " ".$field." ";
					}
				}	
			}
			
			$sql .= "(".$columns.") values (".$values.")";
			if($debug) echo $sql;
			else $this->conn->query($sql);
		}
	}
	
	function delete($id){
		$debug = 0;
		$sql = "DELETE FROM ".$this->table." WHERE id =".$id."";	
		if($debug) echo $sql;
		else $this->conn->query($sql);
	}
	
	function update($data){
		$debug = 0;
		$sql = "UPDATE ".$this->table." SET";
		$set = "";
		$where = "WHERE ";
		$fieldnames = $this->fieldnames();		
		$pair = "";

		if($data!=""){
			foreach($data as $field=>$value){
				if(in_array($field,$fieldnames)){				
					if($field == "id"){					
						$where .= " id = ".$value;
					}else{
						if($set=="") $set .= " ".$field."='".$value."' ";
						else  $set .= ", ".$field."='".$value."' ";
					}
				}	
			}
			
			$sql .= $set.$where;
			if($debug) echo $sql;
			else $this->conn->query($sql);
		}
	}
	function search($id){
		$debug = 0;
		$sql = "SELECT * 
			FROM ".$this->table." 
			WHERE id = ".$id."
			";
		$results = $this->conn->query($sql);
		if($debug) echo $sql;
		return $results;
	}
	function displayAll(){
		$debug = 0;
		$sql = "SELECT * FROM ".$this->table." ORDER BY id";
		$results = $this->conn->query($sql);
		if($debug) echo $sql;
		return $results;
	}
}
?>