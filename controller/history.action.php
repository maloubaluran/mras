<?php
	require_once "../db/mysql_db.class.php";
	require_once "../model/history.class.php";
	require_once "../model/patient_record.class.php";
	
	$conn = new mysql_db();
	$history = new History($conn);
	$pr = new PatientRecord($conn);
	$base_file_folder_url = "D:/xampp/htdocs/miming/file/";
	
	if(isset($_POST['add'])){
		$history->add($_POST);
		header("location:../Views/Gyne-oncology/Manage%20Record/Add%20Patient%20Medical%20History.php");
	}else
	if(isset($_POST['delete']) || isset($_GET['delete'])){
		$history->delete($_GET['id']);
		header("location:../Views/Gyne-oncology/Manage%20Record/View%20Patient%20Medical%20History.php");
	}else
	if(isset($_POST['update'])){
		$history->update($_POST);
		header("location:../Views/Gyne-oncology/Manage%20Record/Edit%20Patient%20Medical%20History.php?id=".$_POST['id']);
	}else
	if(isset($_POST['view'])){
		$file = array('file'=>$_POST['file']);
		$pr->view_doc2($file);
		
		header("location:../Views/Gyne-oncology/Manage%20Record/View%20Patient%20Medical%20History.php");
	}
?>