<?php
session_start();
include("../Models/MainModel.php");
$model = new Model();
$patient_info = $model->viewPatient($_GET['id']);
$test_result = $model->viewResult($_GET['id']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>BRYCeC - Display Patient</title>
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
	<script type='text/javascript' src='../Javascript/print.js'></script>
</head>

<body>

	<div class="art-Sheet">
		<div class="art-Header-png"></div>
			<div class="art-nav">
				<div class="l"></div>
				<div class="r"></div>
				
				<ul class="art-menu">								
					<li>
						<a href="Home.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
					</li>
					<li>
						<a href="#"><span class="l"></span><span class="r"></span><span class="t">Patient Record</span></a>
						<ul>
							<li>
								<a href="Search Patient.php"><span class="l"></span><span class="r"></span><span class="t">View Patient</span></a>
							</li>
							<li>
								<a href="Add Patient.php"><span class="l"></span><span class="r"></span><span class="t">Add Patient</span></a>
							</li>
						</ul>
					</li>		
					<li>
						<a href="About Us.php"><span class="l"></span><span class="r"></span><span class="t">About Us</span></a>
					</li>
					<li>
						<a href="../Controllers/Controller.php?logout"><span class="l"></span><span class="r"></span><span class="t">Log Out (<?php echo $_SESSION['name'] ?>)</span></a>
					</li>
				</ul>
			</div>
				
			<span style="position:absolute; top:215px; width:798px;">
				<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:10px; padding-bottom:10px;">
					<div class="art-PostMetadataHeader2">
					   <h2 class="art-PostHeader">
					   <center>PATIENT RECORD</center>
					   </h2>
					</div>
					<hr noshade size="3" style="margin-left:230px;" width="290px" />
					<br>
						
					<table width="680px" border="0" style="font-family: Calibri, Times, Serif; font-size: 16px; color:#ee6091; margin-left:30px;">
						<tr><td width="150px" style="font-weight:bold;">Patient No.</td><td width="300px"><u><?php echo $patient_info['patientID'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">First Name:</td><td><u><?php echo $patient_info['f_name'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Middle Name:</td><td><u><?php echo $patient_info['m_name'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Last Name:</td><td><u><?php echo $patient_info['l_name'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Birthday:</td><td><u><?php echo date("F j, Y",strtotime($patient_info['year']."-".$patient_info['month']."-".$patient_info['date'])) ?></u></td></tr>
						<tr><td style="font-weight:bold;">Age:</td><td><u><?php echo $patient_info['age']." years old." ?></u></td></tr>
						<tr><td style="font-weight:bold;">Height:</td><td><u><?php echo $patient_info['height']." ft." ?></u></td></tr>
						<tr><td style="font-weight:bold;">Weight:</td><td><u><?php echo $patient_info['weight']." kg." ?></u></td></tr>
						<tr><td style="font-weight:bold;">Civil Status:</td><td><u><?php echo $patient_info['civilstatus'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Address (Home):</td><td><u><?php echo $patient_info['homeadd'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Contact #</td><td><u><?php echo $patient_info['telno'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Address (Office):</td><td><u><?php echo $patient_info['officeadd'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Contact #</td><td><u><?php echo $patient_info['telno2'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Occupation:</td><td><u><?php echo $patient_info['occupation'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">Referred By:</td><td><u><?php echo $patient_info['referredby'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">BRIEF HISTORY</td><td><u><?php echo $patient_info['history'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">PERTINENT P.E.</td><td><u><?php echo $patient_info['pertinentPE'] ?></u></td></tr>
						<tr><td style="font-weight:bold;">LABORATORY FINDINGS</td><td><u><?php echo $patient_info['findings'] ?></u></td></tr>
						<tr><td>&nbsp;</td></tr>
						<tr><th colspan="2" align="left"><input type="button" class="art-button-wrapper" name="update" value="Update" onclick="location.href='Update Patient.php?id=<?php echo $patient_info['patientID'] ?>'"></th></tr>
					</table>
					<br><br>
					
					<div class="art-PostMetadataHeader2">
					   <h2 class="art-PostHeader">
					   <center>TEST RESULT</center>
					   </h2>
					</div>
					<hr noshade size="3" style="margin-left:230px;" width="290px" />
							
					<table width="680px" border="1" style="font-family: Calibri, Times, Serif; font-size: 16px; color:#ee6091; margin-left:30px;">
						<tr>
							<th width="130px">Date Requested</th>
							<th width="130px">Lab ID No.</th>
							<th width="130px"></th>
						</tr>
						<?php while($row = mysql_fetch_array($test_result)){ ?>
						<tr>
							<td><?= $row['daterequested'] ?></td>
							<td><?= $row['labID'] ?></td>
							<td><center><input type="button" class="art-button-wrapper" name="view" value="View Details" onclick="window.open('Test Result.php?id=<?= $_GET['labID'] ?>', 'newWindow', 'width=1350, height=660')"></center></td>
						</tr>
						<?php } ?>
					</table>
					<br><br>
					
					<div class="art-PostMetadataHeader2">
					   <h2 class="art-PostHeader">
					   <center>ASSESSMENT</center>
					   </h2>
					</div>
					<hr noshade size="3" style="margin-left:230px;" width="290px" />
					<table width="680px" border="0" style="font-family: Calibri, Times, Serif; font-size: 16px; color:#ee6091; margin-left:30px;">
					<tr>
					<th colspan="2" align="left">
					<input type="button" class="art-button-wrapper" name="add" value="Add" onclick="window.open('Add Assessment.php?id=<?php echo $patient_info['patientID'] ?>', 'newWindow', 'width=700, height=600')">
					</th>
					</table>
					<br><br>
					&nbsp; &nbsp; &nbsp;
					<!--
					<input type="button" class="art-button-wrapper" value="Export to PDF" onclick="printPopup(<?php echo $pr_no ?>,<?php echo $fiscal ?>)">
					<!--name='aaa'-->
				</div>

				<div class="art-Footer">
					<div class="art-Footer-inner">
						<a href="#" class="art-rss-tag-icon" title="RSS"></a>
						<div class="art-Footer-text">
							<p class="align-left">
							<strong>Malou Baluran</strong> |
							<strong>Rose Mae Razon</strong> |
							<strong>Crystel Ann Yu</strong><br>
							Copyright &copy; 2011 --- All Rights Reserved.
							</p>	
						</div>
					</div>
					<div class="art-Footer-background"></div>
				</div>
			<p>&nbsp;<br></p>
			</span>
		
	</div>

</body>
</html>
