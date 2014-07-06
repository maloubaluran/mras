<?php
	include "../db/mysql_db.class.php";
	include "../model/department.class.php";
	
	$conn = new mysql_db();
	$department = new Department($conn);
	
	if(isset($_POST['add'])){
		$department->add($_POST);
		header("location:../Views/Admin/Manage%20Department/Add%20Department.php");
	}else
	if(isset($_POST['delete']) || isset($_GET['delete'])){
		$department->delete($_GET['id']);
		header("location:../Views/Admin/Manage%20Department/History%20Department.php");
	}else
	if(isset($_POST['update'])){
		$department->update($_POST);
		header("location:../Views/Admin/Manage%20Department/Edit%20Department.php?id=".$_POST['id']);
	}
?>