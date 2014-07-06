<?php
	require_once "../db/mysql_db.class.php";
	require_once "../model/patient.class.php";
	require_once "../model/patient_record.class.php";
	
	$conn = new mysql_db();
	$patient = new Patient($conn);
	$pr = new PatientRecord($conn);
	$base_file_folder_url = "D:/xampp/htdocs/miming/file/";
	
	if(isset($_POST['add'])){
		$patient->add($_POST);
		header("location:../Views/Gyne-oncology/Manage%20Record/Add%20Patient%20Demographics.php");
	}else
	if(isset($_POST['delete']) || isset($_GET['delete'])){
		$patient->delete($_GET['id']);
		header("location:../Views/Gyne-oncology/Manage%20Record/View%20Patient%20Record.php");
	}else
	if(isset($_POST['update'])){
		$patient->update($_POST);
		header("location:../Views/Gyne-oncology/Manage%20Record/Edit%20Patient%20Demographics.php?id=".$_POST['id']);
	}else
	if(isset($_GET['view'])){
		$file = $_GET['patientId']."=".$_GET['dateStored'];
		$filedir = array('filedir'=>$base_file_folder_url.$file."/");
		$pr->view_doc2($filedir);
		header("location:../Views/Gyne-oncology/Manage%20Record/View%20Patient%20Record.php");
	}
?>