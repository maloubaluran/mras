<?php
	if(isset($_GET['id'])){
		header("location:../../../controller/patient_record.action.php?delete&id=".$_GET['id']."&patientId=".$_GET['patientId']."&dateStored=".$_GET['dateStored']);
	}else{
		header("location:View Test Result.php");
	}
?>