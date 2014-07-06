<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("mras",$conn);
	$base_file_dir = "../../file/";
	
	if(isset($_POST['add'])){
		//$patientrecord->add($_POST);
		$i=0;
		while(true){
			if(isset($_FILES['image'.$i]) && $_FILES['image'.$i]['size']>0){
				
				$patient_dir = $base_file_dir.$_POST['patientId'.$i]."/";
				$newfilename = time().".".(pathinfo($_FILES["image".$i]["name"], PATHINFO_EXTENSION));
				
				if(!is_dir($patient_dir)){
					mkdir($patient_dir,0444,true);
				}	
				move_uploaded_file($_FILES['image'.$i]['tmp_name'],$patient_dir.$newfilename);
				
				$add = array(
					'patientId'=>$_POST['patientId'.$i],
					'accountId'=>$_POST['accountId'.$i],
					'dateStored'=>$_POST['dateStored'.$i],
					'url'=>$patient_dir.$newfilename
				);
				$i++;
			}else{
				break;
			}
		}
	}
?>

<html>
	<head>
		<!-- ExtJS --> 
		<link rel="stylesheet" type="text/css" href="http://localhost/extjs/resources/css/ext-all.css" /> 
		<script type="text/javascript" src="http://localhost/extjs/bootstrap.js"></script> 
		<script src="Manage Record/js/record.js"></script>
		<script>
			var i = 0;
			
			function createUploadDiv(tbl){
				i++
				var table = document.getElementById(tbl)
				lastrow = table.rows.length;
								
				/*
					text nodes
				*/
				fileName = document.createTextNode("File "+i+" : ")
				pName = document.createTextNode("Patient Name : ")
				dName = document.createTextNode("Doctor Name : ")
				dateName = document.createTextNode("Date Stored: ");
				/*
					input fields type text
				*/
				// patient name 
				pNameInput = document.createElement("input")
				pNameInput.type = "text"
				pNameInput.name = "patientName"+i
				pNameInput.id = pNameInput.name
				pNameInput.disabled = true
				pNameInput.title = "Patient Name"+i
				//doctor name
				dNameInput = document.createElement("input")
				dNameInput.type = "text"
				dNameInput.name = "doctorName"+i
				dNameInput.id = dNameInput.name
				dNameInput.disabled = true
				//date stored
				dateInput = document.createElement("input")
				dateInput.type = "text"
				dateInput.name = "dateStored"+i
				dateInput.id  = "dataStored"+i
				/*
					input fields type hidden
				*/
				//file upload
				fileInput = document.createElement("input")
				fileInput.type = "file"
				fileInput.name = "image"+i
				//patient id
				pId = document.createElement("input")
				pId.type = "hidden"
				pId.name = "patientId"+i
				pId.id = pId.name
				//doctor id
				dId = document.createElement("input")
				dId.type = "hidden"
				dId.name = "accountId"+i
				dId.id = dId.name
				/*
					search buttons
				*/
				// patient search
				psearch = document.createElement("input")
				psearch.type = "button"
				psearch.value = "Search"
				psearch.onclick =  function(){search_patient(pNameInput.id,+pId.id)}
				//doctor search
				dsearch = document.createElement("input")
				dsearch.type = "button"
				dsearch.onclick = function(){search_doctor(dNameInput.id,dId.id)}
				dsearch.value = "Search"
				/*
					create rows
				*/
				rowFile = table.insertRow(lastrow);
				rowP = table.insertRow(lastrow+1)
				rowD = table.insertRow(lastrow+2)
				rowDa = table.insertRow(lastrow+3)
				
				/*
					create cells
				*/
				celFile0 = rowFile.insertCell(0)
				celFile1 = rowFile.insertCell(1)
				cellPlabel = rowP.insertCell(0)
				cellPinput = rowP.insertCell(1)
				cellDlabel = rowD.insertCell(0)
				cellDinput = rowD.insertCell(1)
				cellDalabel = rowDa.insertCell(0)
				cellDainput = rowDa.insertCell(1)
				
				/*
					insert inputs, texts and searches
				*/
				celFile0.appendChild(fileName)
				celFile1.appendChild(fileInput)
				cellPlabel.appendChild(pName)
				cellDlabel.appendChild(dName)
				cellPinput.appendChild(pNameInput)
				cellPinput.appendChild(pId)
				cellPinput.appendChild(psearch)
				cellDinput.appendChild(dNameInput)
				cellDinput.appendChild(dId)
				cellDinput.appendChild(dsearch)
				cellDalabel.appendChild(dateName)
				cellDainput.appendChild(dateInput)
			}

		</script>
	</head>
	<body>
	<form method="post"action="test1.php" enctype="multipart/form-data">
		<div>
			<table id="uploadArea">
			<tr>
				<td colspan=2>
				<input type="button" value="Add Upload" onclick="createUploadDiv('uploadArea')">
				</td>
			</tr>
			<tr>
				<td>File : </td>
				<td>
					<input type="file" id="image0" name="image0">
				</td>
			</tr>
			<tr>
				<td>Patient Name : </td>
				<td><input type="text" name="patientName0"  disabled=true title="Patient Name" id="patientName0">
				<input type="hidden" name="patientId0" id="patientId0" value="0">
				<input type="button" onclick="search_patient()" value="Search">
				</td>
			</tr>
			<tr>
				<td>Doctor : </td>
				<td><input type="text" name="doctorName0" disabled=true id="doctorName0" title="Doctor">
				<input type="hidden" name="accountId0" id="accountId0">
				<input type="button" onclick="search_doctor()" value="Search">
				</td>
			</tr>
			<tr>
				<td>Date Stored : </td>
				<td><input type="text" name="dateStored0"></td>
			</tr>
			</table>
		</div>
		<center><input type="submit" name="add" value="Save"></center>
	</form>
	</body>
</html>