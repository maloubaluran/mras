<?php


	class Model{
	
		function db(){
			$db = mysql_connect("localhost","root","");
			mysql_select_db("mras",$db); //SampleDB is a DATABASE NAME;
			
		}
		
		function getPatientId(){
			$sql = "SELECT * FROM patient ORDER BY patientID DESC LIMIT 1";
			$query = mysql_query($sql);
			$result = mysql_fetch_array($query);
			$id = (int)$result['patientID'] +1;
			return $id;
		}
		/*
		function login($user,$pass){
			$query = "SELECT * FROM doctor WHERE username='$user'"; //User is a TABLE NAME of SampleDB 
			$result = mysql_fetch_array(mysql_query($query));
			return $result;
		}
		*/
		function add($pno,$fname,$mname,$lname,$month,$date,$year,$inYears,$height,$weight,$status,$homeaddress,$tel1,$baddress,$tel2,$occupation,$ref,$history,$per,$findings){
			$query = "INSERT INTO patient (patientID,f_name,m_name,l_name,month,date,year,age,height,weight,civilstatus,homeadd,telno,officeadd,telno2,occupation,referredby,history,pertinentPE,findings) 
						VALUES('$pno','$fname','$mname','$lname','$month','$date','$year','$inYears','$height','$weight','$status','$homeaddress','$tel1','$baddress','$tel2','$occupation','$ref','$history','$per','$findings')";
			$result = mysql_query($query);
			return $result;
		}
		
		function updatePatient($pno,$fname,$mname,$lname,$month,$date,$year,$inYears,$height,$weight,$status,$homeaddress,$tel1,$baddress,$tel2,$occupation,$ref,$history,$per,$findings){
			$query = "UPDATE patient SET f_name='$fname', m_name='$mname', l_name='$lname', month='$month', date='$date', year='$year', age='$inYears', height='$height', weight='$weight', civilstatus='$status', homeadd='$homeaddress', telno='$tel1', officeadd='$baddress', telno2='$tel2', occupation='$occupation', referredby='$ref', history='$history', pertinentPE='$per', findings='$findings' WHERE patientID='$pno'";
			$result = mysql_query($query);
			return $result;
		}
		
		function addResults($patientId,$labID,$md,$daterequested,$datereported,$hemoglobin,$hematocrit,$rbc,$wbc,$neutrophils,$lymphocytes,$eusinophils,$monocytes,$basophils,$stabs,$plateletCount,$reticulocyteCount,$sedimentationRate,$malarialSmear,$bloodType,$rhType,$bleedingTime,$clottingTime,$prothombinTime,$activity,$controlValue,$testValue,$controlValue2,$bua,$bun,$cholesterol,$trigycerides,$hdl,$ldl,$creatinine,$fbs,$rbs,$hgt,$ppbs,$sgot,$sgpt,$phosphatase,$serum_amylase,$lacticDehydrogenase,$cpk,$ckmb,$totalBilirubin,$b1,$b2,$glycosylated,$sodium,$potassium,$chloride,$calcium,$totalProtein,$albumin,$globulin,$agRatio){
			$sql = "INSERT INTO labtestresult (patientId,labID,md,daterequested,datereported,hemoglobin,hematocrit,rbc,wbc,neutrophils,lymphocytes,eusinophils,monocytes,basophils,stabs,plateletCount,reticulocyteCount,sedimentationRate,malarialSmear,bloodType,rhType,bleedingTime,clottingTime,prothombinTime,activity,controlValue,testValue,controlValue2,bua,bun,cholesterol,trigycerides,hdl,ldl,creatinine,fbs,rbs,hgt,ppbs,sgot,sgpt,phosphatase,serum_amylase,lacticDehydrogenase,cpk,ckmb,totalBilirubin,b1,b2,glycosylated,sodium,potassium,chloride,calcium,totalProtein,albumin,globulin,agRatio) values ('$patientId','$labID','$md','$daterequested','$datereported','$hemoglobin','$hematocrit','$rbc','$wbc','$neutrophils','$lymphocytes','$eusinophils','$monocytes','$basophils','$stabs','$plateletCount','$reticulocyteCount','$sedimentationRate','$malarialSmear','$bloodType','$rhType','$bleedingType','$clottingType','$prothombinTime','$activity','$controlValue','$testValue','$controlValue2','$bua','$bun','$cholesterol','$trigycerides','$hdl','$ldl','$creatinine','$fbs','$rbs','$hgt','$ppbs','$sgot','$sgpt','$phosphatase','$serum_amylase','$lacticDehydrogenase','$cpk','$ckmb','$totalBilirubin','$b1','$b2','$glycosylated','$sodium','$potassium','$chloride','$calcium','$totalProtein','$albumin','$globulin','$agRatio')";
			$query = mysql_query($sql);
			$result = mysql_query($query);
			return $result;
			
		}
		
		function addResults_orig($patientId, $date, $diag, $prog, $treat){
			$sql = "INSERT INTO labtestresult (date, diagnosis, progressNotes, treatment, patientID) values ('$date', '$diag', '$prog', '$treat', '$patientId')";
			$query = mysql_query($sql);
			$result = mysql_query($query);
			return $result;
			
		}
		
		
		function update($user,$pass,$fname,$mname,$lname,$user_id){
			$query = "UPDATE User SET username='$user',password='$pass',fname='$fname',mname='$mname',lname='$lname' WHERE user_id='$user_id'";
			$result = mysql_query($query);
			return $result;
		}
		
		function delete($user_id){
			$query = "DELETE * FROM patient WHERE patientID = '$user_id'";
			$result = mysql_query($query);
			return $result;
		}
		
		function displayPatient($userInfo){
			$query = "SELECT * FROM patient WHERE f_name LIKE '$userInfo%' OR m_name LIKE '$userInfo%' OR l_name LIKE '$userInfo%'";
			$result = mysql_query($query);
			return $result;
		}
		
		function viewPatient($user_id){
			$query = "SELECT * FROM patient WHERE patientID = '$user_id'";
			$result = mysql_query($query);
			$result1 = mysql_fetch_array($result);
			return $result1;
		}
		
		function viewResult($user_id){
			$query = "SELECT * FROM labtestresult WHERE patientID = $user_id";
			$result = mysql_query($query);
			return $result;
		}
		
		function addAssessment($intensity,$pain,$come,$better,$worse,$symptoms,$sleep,$energy,$mood,$concentration,$testid,$patientid){
			$debug=0;
			$c=0;
			$d=0;
			$e=0;
			$f=0;
			$g=0;
			if($come_and_go=="on") $c=1;
			if($sleep=="on") $d=1;
			if($energy=="on") $e=1;
			if($mood=="on") $f=1;
			if($concentration=="on") $g=1;
			$query = "INSERT INTO assessment (intensity,always,come_and_go,make_better,make_worse,symptoms,sleep,energy,mood,concentration,testID,patientID) 
						VALUES('".$intensity."','".$always."',".$c.",'".$better."','".$worse."','".$symptoms."',".$d.",".$e.",".$f.",".$g.",".$testid.",".$patientid.")";
			if($debug) echo $query;
			$result = mysql_query($query);
			return $result;
		}
		
	}
	
	$model = new Model();
	$model->db();
?>