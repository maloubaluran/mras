<?php
require_once '../../../db/mysql_db.class.php';
require_once '../../../model/patient.class.php';
require_once '../../../model/patient_record.class.php';

$conn = new mysql_db();
$pr = new PatientRecord($conn);

$patients = "";

if(isset($_GET['id'])){
	$patients = $pr->searchbyid($_GET['id']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>MRAS - Upload Test Results</title>
	<script type='text/javascript' src='../../../Javascript/formvalidator.js'></script>
	<script type="text/javascript" src="../../../Javascript/script.js"></script>
    <link rel="stylesheet" href="../../../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../../CSS/tabs.css" type="text/css" media="screen" />

	<link rel="stylesheet" type="text/css" href="../../../CSS/datepicker.css" />
	<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
	<tr><td  id="ds_calclass">
	</td></tr>
	</table>
	<script src="../../../Javascript/datepicker.js" type="text/javascript"></script>
	<script src="js/record.js"></script>
	 <link rel="stylesheet" type="text/css" href="../../../CSS/datepicker.css" />
    <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
    <tr><td  id="ds_calclass">
    </td></tr>
    </table>
    <script src="../../../Javascript/datepicker.js" type="text/javascript"></script>

</head>
<body>

	<div class="art-Sheet">
			<div class="art-Header-png"></div>
				<!-- menu -->
				
				<?php require_once "Menu.php"; ?>
					
				<!-- end menu -->
				
				<br><br>
				<span style="position:absolute; top:215px; width:798px;">
					<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:20px; padding-bottom:10px;">
					
						<ol id="toc">
							<li><a href="#patientrecord"><span>EDIT UPLOAD RESULTS</span></a></li>
						</ol>
					
						<div class="content">
							<center>
							<div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								</h2>
							</div>
							</center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							<form action="../../../controller/patient_record.action.php" name="parent" id="parent" method="post" enctype="multipart/form-data">		
								<center>
								<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
								<table id="dataTable" border="0" cellpadding="5">
								<?php
								if($patients!=""){
									while($row = mysql_fetch_array($patients)){
								?>						
									<tr>
										<th>Patient Name</th>
										<td><input type="text" name="patientName" id="patientName" value="<?php echo $row['pname']; ?>">
										<input type="hidden" name="patientId" id="patientId" value="<?php echo $row['patientId']; ?>">
										<input type="button" onclick="search_patient('patientId','patientName')" value="Search">
										</td>
									</tr>
									<tr>
										<th>Doctor</th><td>
										<input type="text" name="doctorName" id="doctorName" value="<?php echo $row['aname']; ?>">
										<input type="hidden" name="accountId" id="doctorId" value="<?php echo $row['accountId']; ?>">
										<input type="button" onclick="search_doctor('doctorId','doctorName')" value="Search">
										</td>
									</tr>
									<tr>
										<th>Date Recorded</th><td><input id="daterep" class="validate['required','number']" onClick="ds_sh(this)" name="dateStored" value="<?php echo $row['dateStored']; ?>" size="20" readonly="readonly" style="cursor: text" /></td>
									</tr>
								<!--	<tr>
										<th>File Name</th><td><input id="filename" class="validate['required','number']" type="text" size="50" name="filename"></td>
									</tr> 
								-->
									<tr>
										<td colspan=2 align="center">
											<div height="500px" width="700px">
												<img src="../../../file/<?php echo $row['url'];?>">
											</div>
										</td>
									</tr>
									<tr>
										<th>File Upload</th><td><input type="file" name="image" value="<?php echo $row['url']; ?>"></td>
									</tr>
								<?php
									}
								}
								?>
								</table>
								<input type="hidden" name="imaging" value="1">
								<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
								<input type="hidden" name="patientId_old" value="<?php echo $_GET['patientId']; ?>">
								<input type="hidden" name="dateStored_old" value="<?php echo $_GET['dateStored']; ?>">
								</center>
								<center>
								<input type="submit" class="art-button-wrapper" name="update" value="Edit"/>
								</form>
								</center>
							</form>
						</div>
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