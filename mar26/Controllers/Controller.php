<?php
session_start();
	require_once("../Models/MainModel.php");
	
	$model = new Model();
	
	
	if($_GET['action'] == 'login'){
		$login = $model->login($_POST['user'],$_POST['pass']);
		
		if($login != true){
			echo '<script> function index(){location.href="../Log In.php";}</script>';
			echo '<body onload=index()>';
		}
		
		echo '<script> function add(){location.href="../Views/Home.php";}</script>';
		echo '<body onload=add()>';
	}
	
	if($_GET['action'] == 'add'){
		
		$add = $model->add($_POST['pno'],$_POST['fname'],$_POST['mname'],$_POST['lname'],$_POST['month'],$_POST['day'],$_POST['year'],$_POST['age'],$_POST['height'],$_POST['weight'],$_POST['status'],$_POST['homeaddress'],$_POST['tel1'],$_POST['baddress'],$_POST['tel2'],$_POST['occupation'],$_POST['ref'],$_POST['history'],$_POST['per'],$_POST['findings']);
		
		if($add != true){
			echo '<script> function back(){alert("Other fields should be filled up!");location.href="../Views/Add Patient.php";}</script>';
			echo '<body onload=back()>';
		}
		$id = $_GET['id'];
		header("location:../Views/Add Test Result.php?id=".$id."");
		echo '<script> function suc(){alert("Success!");location.href="../Views/Display Patient.php?id='.$_POST['pno'].'";}</script>';
		echo '<body onload=suc()>';
		
	}
	
	if($_GET['action'] == 'addTest'){
		for($i=1; $i<(int)$_POST['rows']+1; $i++){
			$add1 = $model->addResults($_POST['pno'], $_POST['tdate'.$i], $_POST['tdiag'.$i], $_POST['tprog'.$i], $_POST['ttreat'.$i]);
		}
		echo '<script> function suc(){alert("Success!");location.href="../Views/Display Patient.php?id='.$_POST['pno'].'";}</script>';
		echo '<body onload=suc()>';
	}
	
	if($_GET['action'] == 'updatePatient'){
		
		$add = $model->updatePatient($_POST['pno'],$_POST['fname'],$_POST['mname'],$_POST['lname'],$_POST['month'],$_POST['day'],$_POST['year'],$_POST['age'],$_POST['height'],$_POST['weight'],$_POST['status'],$_POST['homeaddress'],$_POST['tel1'],$_POST['baddress'],$_POST['tel2'],$_POST['occupation'],$_POST['ref'],$_POST['history'],$_POST['per'],$_POST['findings']);
		if($add != true){
			echo '<script> function back(){alert("Other fields should be filled up!");location.href="../Views/Add Patient.php";}</script>';
			echo '<body onload=back()>';
		}
		
		echo '<script> function suc(){alert("Success!");location.href="../Views/Display Patient.php?id='.$_POST['pno'].'";}</script>';
		echo '<body onload=suc()>';
		
	}
	
	if($_GET['action'] == 'addTestResult'){
		$add1 = $model->addResults($_POST['pno'], $_POST['labID'], $_POST['md'], $_POST['daterequested'], $_POST['datereported'], $_POST['hemoglobin'], $_POST['hematocrit'], $_POST['rbc'], $_POST['wbc'], $_POST['neutrophils'], $_POST['lymphocytes'], $_POST['eusinophils'], $_POST['monocytes'], $_POST['basophils'], $_POST['stabs'], $_POST['plateletCount'], $_POST['reticulocyteCount'], $_POST['sedimentationRate'], $_POST['malarialSmear'], $_POST['bloodType'], $_POST['rhType'], $_POST['bleedingTime'], $_POST['clottingTime'], $_POST['prothombinTime'], $_POST['activity'], $_POST['controlValue'], $_POST['testValue'], $_POST['controlValue2'], $_POST['bua'], $_POST['bun'], $_POST['cholesterol'], $_POST['trigycerides'], $_POST['hdl'], $_POST['ldl'], $_POST['creatinine'], $_POST['fbs'], $_POST['rbs'], $_POST['hgt'], $_POST['ppbs'], $_POST['sgot'], $_POST['sgpt'], $_POST['phosphatase'], $_POST['serum_amylase'], $_POST['lacticDehydrogenase'], $_POST['cpk'], $_POST['ckmb'], $_POST['totalBilirubin'], $_POST['b1'], $_POST['b2'], $_POST['glycosylated'], $_POST['sodium'], $_POST['potassium'], $_POST['chloride'], $_POST['calcium'], $_POST['totalProtein'], $_POST['albumin'], $_POST['globulin'], $_POST['agRatio']);
		$id = $_GET['id'];
		header("location:../Views/Add Assessment.php?id=".$id."");
		echo '<script> function suc(){opener.window.location.href="../Views/Display Patient.php?id='.$_POST['pno'].'"}</script>';
		echo '<script>
			  suc();
			  self.close();
			  </script>';
		
	}
	
	if($_GET['action'] == 'addTestResult_orig'){
		for($i=1; $i<(int)$_POST['rows']+1; $i++){
			$add1 = $model->addResults($_POST['pno'], $_POST['tdate'.$i], $_POST['tdiag'.$i], $_POST['tprog'.$i], $_POST['ttreat'.$i]);
		}
		$id = $_GET['id'];
		header("location:../Views/Add Assessment.php?id=".$id."");
		echo '<script> function suc(){opener.window.location.href="../Views/Display Patient.php?id='.$_POST['pno'].'"}</script>';
		echo '<script>
			  suc();
			  self.close();
			  </script>';
		
	}
	
	
	if($_GET['action'] == 'addAssessment'){
		$add = $model->addAssessment($_POST['intensity'],$_POST['pain'],$_POST['come'],$_POST['better'],$_POST['worse'],$_POST['symptoms'],$_POST['sleep'],$_POST['energy'],$_POST['mood'],$_POST['concentration'],$_POST['testid'],$_GET['id']);
		$id = $_GET['id'];
		header("location:../Views/Display Patient.php?id=".$id."");
		//echo '<script> function suc(){alert("Success!");location.href="../Views/Display Patient.php?id='.$_GET['id'].'";}</script>';
		//echo '<body onload=suc()>';
		
	}
	
	
	if($_GET['action'] == 'update'){
		$update = $model->update($_POST['user'],$_POST['pass'],$_POST['fname'],$_POST['mname'],$_POST['lname'],$_POST['user_id']);
		
		if($update != true){
			echo '<script> function back(){alert("Failed!");location.href="../Views/Add Patient.php";}</script>';
			echo '<body onload=back()>';
		}
		
		echo '<script> function suc(){alert("Update!");location.href="../Views/View Patient.php";}</script>';
		echo '<body onload=suc()>';
		
	}
	
	if($_GET['action'] == 'delete'){
		$delete = $model->delete($_GET['id']);
		
		if($delete = true){
			echo '<script> function suc(){alert("Deleted!");location.href="../Views/View Patient.php";}</script>';
			echo '<body onload=suc()>';
		}
		
	}
	
	if(isset($_GET['logout'])){
		
		$_SESSION['logout'] = "You have been logged out.";
		echo '<script> function suc(){location.href="../Log In.php";}</script>';
		echo '<body onload=suc()>';
	}
	