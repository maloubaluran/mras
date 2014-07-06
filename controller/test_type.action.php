<?php
	include "../db/mysql_db.class.php";
	include "../model/testtype.class.php";
	
	$conn = new mysql_db();
	$testtype = new TestType($conn);
	
	if(isset($_POST['add'])){
		$testtype->add($_POST);
		header("location:../view/staff/testtype/index.php");
	}else
	if(isset($_POST['delete'])){
		$testtype->delete($_POST);
		header("location:../view/staff/testtype/delete.php");
	}else
	if(isset($_POST['update'])){
		$testtype->update($_POST);
		header("location:../view/staff/testtype/update.php");
	}
?>