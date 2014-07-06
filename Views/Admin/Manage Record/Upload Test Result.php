<?php
include("../../../Models/MainModel.php");
$model = new Model();
?>
<?php
session_start();
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
							<li><a href="#patientrecord"><span>UPLOAD RESULTS</span></a></li>
						</ol>
					
						<div class="content">
							<center>
							<div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>UPLOAD RESULTS</center>
								</h2>
							</div>
							</center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							<center>
							<form method="post"action="../../../controller/patient_record.action.php" enctype="multipart/form-data">
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
									<input type="button" onclick="search_patient('patientId0','patientName0')" value="Search">
									</td>
								</tr>
								<tr>
									<td>Doctor : </td>
									<td><input type="text" name="accountName0" disabled=true id="accountName0" title="Doctor">
									<input type="hidden" name="accountId0" id="accountId0">
									<input type="button" onclick="search_doctor('accountId0','accountName0')" value="Search">
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