<?php
	include "../db/mysql_db.class.php";
	include "../model/patient_record.class.php";
	
	$conn = new mysql_db();
	$patientrecord = new PatientRecord($conn);
	
	// this is the url where the documents uploaded are stored
	$base_file_dir = "../file/";
	
	if(isset($_POST['add'])){	
		$i=0;
		while(true){
			if(isset($_FILES['image'.$i]) && $_FILES['image'.$i]['size']>0){
				
				$patient_dir = $base_file_dir.$_POST['patientId'.$i]."/";
				$newfilename = time().$i.".".$_FILES["image".$i]["name"];
				
				if(!is_dir($patient_dir)){
					mkdir($patient_dir,0444,true);
				}	
				move_uploaded_file($_FILES['image'.$i]['tmp_name'],$patient_dir.$newfilename);
				
				$add = array(
					'patientId'=>$_POST['patientId'.$i],
					'accountId'=>$_POST['accountId'.$i],
					'dateStored'=>$_POST['dateStored'.$i],
					'url'=>$_POST['patientId'.$i]."/".$newfilename
				);
				$patientrecord->add($add);
				$i++;
			}else{
				break;
			}
		}
		header("location:../Views/Admin/Manage%20Record/Upload%20Test%20Result.php");
	}else
	if(isset($_GET['delete'])){
		$results = $patientrecord->search($_GET['id']);
		if($results!=""){
			while($row = mysql_fetch_array($results)){	
				unlink($base_file_dir.$row['url']);
			}
		}
		$patientrecord->delete($_GET['id']);
		header("location:../Views/Admin/Manage%20Record/View%20Test%20Result.php");
	}else
	if(isset($_POST['update'])){
		$url = "";
		$update = null;
		$rec = $patientrecord->search($_POST['id']);
		if($rec!=""){
			while($row = mysql_fetch_array($rec)){
				$url = $row['url'];
				break;
			}
		}
		if(isset($_FILES['image']) && $_FILES['image']['size']>0){			
			if($url != $_FILES['image']['name']){
				$patient_dir = $base_file_dir.$_POST['patientId']."/";
				$newfilename = time().".".(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
				move_uploaded_file($_FILES['image']['tmp_name'], $patient_dir.$newfilename);
				unlink($base_file_dir.$url);
				$url = $_POST['patientId']."/".$newfilename;
			}		
		}
		$update = array(
			'id'=>$_POST['id'],
			'patientId'=>$_POST['patientId'],
			'accountId'=>$_POST['accountId'],
			'dateStored'=>$_POST['dateStored'],
			'url'=>$url
		);
		$patientrecord->update($update);
		header("location:../Views/Admin/Manage%20Record/Edit%20Test%20Result.php?id=".$_POST['id']);
	}
	if(isset($_POST['view'])){
		$file = array('file'=>$_POST['file']);
		$patientrecord->view_doc2($file);
		
		if(isset($_POST['imaging'])) header("location:../Views/Imaging/View%20Test%20Result.php");
		else header("location:../Views/Pathology/View%20Test%20Result.php");
	}
?>