<?php
	include "../db/mysql_db.class.php";
	include "../model/record.class.php";
	
	$conn = new mysql_db();
	$record = new Record($conn);
	
	if(isset($_POST['add'])){
		$record->add($_POST);
		header("location:../view/staff/record/index.php");
	}else
	if(isset($_POST['delete'])){
		$record->delete($_POST);
		header("location:../view/staff/record/delete.php");
	}else
	if(isset($_POST['update'])){
		$record->update($_POST);
		header("location:../view/staff/record/update.php");
	}
?>