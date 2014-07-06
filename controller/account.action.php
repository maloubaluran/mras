<?php
	include "../db/mysql_db.class.php";
	include "../model/account.class.php";
	
	$conn = new mysql_db();
	$account = new Account($conn);
	
	if(isset($_POST['add'])){
		$account->add($_POST);
		header("location:../Views/Admin/Manage%20User%20Account/Add%20User%20Account.php");
	}else
	if(isset($_POST['delete']) || isset($_GET['delete'])){
		$account->delete($_GET['id']);
		header("location:../Views/Admin/Manage%20User%20Account/History%20User%20Account.php");
	}else
	if(isset($_POST['update'])){
		$account->update($_POST);
		header("location:../Views/Admin/Manage%20User%20Account/Edit%20User%20Account.php?id=".$_POST['id']);
	}
?>