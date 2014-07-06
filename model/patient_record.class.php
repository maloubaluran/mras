<?php
	require_once( "model.class.php" );
	
	class PatientRecord extends Model{
		private $conn = null;
		private $base_file_url = "D:/xampp/htdocs/miming/file/";
		
		function __construct($conn){
			$this->conn = $conn;
			parent::set_conn($conn);
			parent::set_table("patientrecord");
			parent::set_dbname("mras");
		}
		
		function  view_doc($data){
			$filedir = $data['filedir'];
			$filepath = "";
			if(is_dir($filedir)){
				$mydir = opendir($filedir);
				while(false !== ($file = readdir($mydir))) {
					if($file != "." && $file != "..") {
						$filepath = $filedir.$file;
						break;
					}
				}
				closedir($mydir);
			}
			$app= "";
			$filepath = "d:/xampp/htdocs/miming/file/1.docx";
			$ext = pathinfo($filepath, PATHINFO_EXTENSION);
			
			$word = array('docx','doc');
			$excel = array('xls','xlsx');
			$ppt = array('ppt','pptx');
			
			if(in_array($ext,$word)) {
				$app = new COM("word.application") or die("Unable to instanciate Word");
			}
			if(in_array($ext,$word)){
				$app = new COM("Excel.Application");
			}
			//makes the file read only
			chmod($filepath, 0444);
			
			if($app!=""){
				$app->visible = true;
				$app->Documents->Open(realpath($filepath));
				$app->Documents->Open($filepath);
				//closing word
				$app->Quit();

				//free the object
				$app = null;
			}
			
		}
		
		function check_doc($id){
			$debug = 0;
			$config = array();
			$sql = "SELECT DISTINCT pr.patientId, pr.accountId, concat(p.l_name,', ',p.f_name) as pname,
						concat(a.l_name,', ',a.f_name) as aname, pr.dateStored
					FROM patient as p, account a, patientrecord as pr
					WHERE p.id = pr.patientId AND a.id = pr.accountId";
			$results = $this->conn->query($sql);
			if($results!=""){
				while($row = mysql_fetch_array($results)){
					$folderpath = $row['patientId']."=".$row['dateStored']."/";
					$files = $this->get_files_from_folder($this->base_file_url.$folderpath);	
					$config = array();
					$i = 1;
					foreach($files as $filepath){
						$temp = "";
						if($this->check_doc_as_img($filepath) != ""){		
							$temp .= $row['dateStored']."<a href='../../../file/".$folderpath.$filepath."' class='lightbox' ><button>View Image ".$i++."</button></a>";
						}else{
							$temp .= $row["dateStored"].'<input type="hidden" name="file" value="'.$this->base_file_url.$folderpath.$filepath.'"><input type="submit" name="view" Value="View">'; 
						}
						array_push($config,$temp);
					}
				}
			}
			
			return $config;
		}
		
		function check_doc_img($folderpath){
			$files = $this->get_files_from_folder($this->base_file_url.$folderpath);	
			$config = array();
			$i = 1;
			foreach($files as $filepath){
				$temp = "";
				if($this->check_doc_as_img($filepath) != ""){		
					$temp .= "<a href='../../file/".$folderpath.$filepath."' class='lightbox' ><button>View Image ".$i++."</button></a>";
				}
				array_push($config,$temp);
			}
			return $config;
		}
		
		function check_doc_office($folderpath){
			$files = $this->get_files_from_folder($this->base_file_url.$folderpath);	
			$config = array();
			$i = 1;
			foreach($files as $filepath){
				$temp = "";
				if($this->check_doc_as_img($filepath) != ""){		
					//$temp .= "<a href='../../file/".$folderpath.$filepath."' class='lightbox' ><button>View Image ".$i++."</button></a>";
				}else{
					$temp .= '<input type="hidden" name="file" value="'.$this->base_file_url.$folderpath.$filepath.'"><input type="submit" name="view" Value="View">'; 
				}
				array_push($config,$temp);
			}
			return $config;
		}
		
		function get_files_from_folder($folder){
			$files = array();
			if(is_dir($folder)){
				$mydir = opendir($folder);
				while(false !== ($file = readdir($mydir))) {
					if($file != "." && $file != "..") {
						array_push($files,$file);
					}
				}
				closedir($mydir);
			}
			return $files;
		}
		
		function view_doc2($data){
			
			$filepath = $data['file'];

			$app = null;
			$ext = pathinfo($filepath, PATHINFO_EXTENSION);
			
			$word = array('docx','doc');
			$excel = array('xls','xlsx');
			$ppt = array('ppt','pptx');
			$img = array('jpg','gif','png','bmp');
			
			if(in_array($ext,$word)) {
				$app = new COM("word.application") or die("Unable to instanciate Word");
			}
			if(in_array($ext,$excel)){
				$app = new COM("Excel.Application");
			}
			chmod($filepath, 0444);
			if($app!=null){
				$app->visible = true;
				$app->Documents->Open($filepath);
			}
		}
		function search1($data){
			$debug = 0;
			$sql = "SELECT pr.id as id, pr.patientId, pr.accountId, concat(p.l_name,', ',p.f_name) as pname, concat(a.l_name,', ',a.f_name) as aname,
			pr.dateStored
			FROM patient as p, account a, patientrecord as pr
			WHERE p.id = pr.patientId AND a.id = pr.accountId
			AND p.l_name LIKE  '".$data['l_name']."%'";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
		
		function searchbyid($id){
			$debug = 0;
			$sql = "SELECT pr.id, pr.patientId, pr.accountId, concat(p.l_name,', ',p.f_name) as pname, concat(a.l_name,', ',a.f_name) as aname,
			pr.dateStored, pr.url
			FROM patient as p, account a, patientrecord as pr
			WHERE p.id = pr.patientId AND a.id = pr.accountId
			AND pr.id = ".$id;
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
		
		function display(){
			$debug = 0;
			$sql = "SELECT pr.id, pr.patientId, pr.accountId, concat(p.l_name,', ',p.f_name) as pname, concat(a.l_name,', ',a.f_name) as aname,
			pr.dateStored, pr.url
			FROM patient as p, account a, patientrecord as pr
			WHERE p.id = pr.patientId AND a.id = pr.accountId";
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
		
		function search_all($data){
			$debug = 0;
			$sql = "SELECT pr.id, pr.patientId, pr.accountId, concat(p.l_name,', ',p.f_name) as pname, concat(a.l_name,', ',a.f_name) as aname,
			pr.dateStored, pr.url
			FROM patient as p, account a, patientrecord as pr ";
			$where = " WHERE p.id = pr.patientId AND a.id = pr.accountId";
			$like = "";
			
			foreach($data as $field=>$value){
				if($like !="")	$like .= " OR ".$field." LIKE '".$value."%' ";		
				else $like .= " ".$field." LIKE '".$value."%' ";
			}
			$results = $this->conn->query($sql." WHERE ".$like);
			
			if($results!=""){
				$sql .= $where." AND ( ".$like." ) ";
			}else{
				$sql = "";
			}
			$results = $this->conn->query($sql);
			if($debug) echo $sql;
			else return $results;
		}
		
		function check_doc_as_img($filepath){
			$ext = pathinfo($filepath, PATHINFO_EXTENSION);
			
			$img = array('jpg','gif','png','bmp');
			
			if(in_array($ext,$img)){
				return $filepath;
			}else return "";
		}
	}
?>