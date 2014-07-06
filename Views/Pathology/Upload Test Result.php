<?php
include("../../Models/MainModel.php");
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
	<script type='text/javascript' src='../../Javascript/formvalidator.js'></script>
	<script type="text/javascript" src="../../Javascript/script.js"></script>
    <link rel="stylesheet" href="../../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../CSS/tabs.css" type="text/css" media="screen" />

	<link rel="stylesheet" type="text/css" href="../../CSS/datepicker.css" />
	<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
	<tr><td  id="ds_calclass">
	</td></tr>
	</table>
	<script src="../../Javascript/datepicker.js" type="text/javascript"></script>

	<script language="JavaScript">
	<!-- Begin
	extArray = new Array(".gif", ".jpg", ".png");
	function LimitAttach(form, file) {
	allowSubmit = false;
	if (!file) return;
	while (file.indexOf("\\") != -1)
	file = file.slice(file.indexOf("\\") + 1);
	ext = file.slice(file.indexOf(".")).toLowerCase();
	for (var i = 0; i < extArray.length; i++) {
	if (extArray[i] == ext) { allowSubmit = true; break; }
	}
	if (allowSubmit) form.submit();
	else
	alert("Please only upload files that end in types:  " 
	+ (extArray.join("  ")) + "\nPlease select a new "
	+ "file to upload and submit again.");
	}
	//  End -->
	</script>
	<script src="js/patho.js"></script>
	 <link rel="stylesheet" type="text/css" href="../../CSS/datepicker.css" />
    <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
    <tr><td  id="ds_calclass">
    </td></tr>
    </table>
    <script src="../../Javascript/datepicker.js" type="text/javascript"></script>

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
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Manage Record</span></a>
							<ul style="width:160px;">
								<li>
									<a href="Upload Test Result.php"><span class="l"></span><span class="r"></span><span class="t">Upload Test Result</span></a>
								</li>
								<li>
									<a href="View Test Result.php"><span class="l"></span><span class="r"></span><span class="t">View Test Result</span></a>
								</li>
							</ul>
						</li>					
                		<li>
                			<a href="About Us.php"><span class="l"></span><span class="r"></span><span class="t">About Us</span></a>
                		</li>
                        <li>
                        	<a href="../../Controllers/Controller.php?logout"><span class="l"></span><span class="r"></span><span class="t">Log Out</span></a>
                        </li>
                	</ul>

                </div>
				
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
							<form action="../../controller/patient_record.action.php" name="parent" id="parent" method="post" enctype="multipart/form-data">		
								<center>
								<table id="dataTable" border="0" cellpadding="5">
									<tr>
										<th>Patient Name</th>
										<td><input type="text" name="patientName" id="patientName"><input type="hidden" name="patientId" id="patientId">
										<input type="button" onclick="search_patient()" value="Search">
										</td>
									</tr>
									<tr>
										<th>Doctor</th><td>
										<input type="text" name="doctorName" id="doctorName">
										<input type="hidden" name="accountId" id="doctorId">
										<input type="button" onclick="search_doctor()" value="Search">
										</td>
									</tr>
									<tr>
										<th>Date Recorded</th><td><input id="daterep" class="validate['required','number']" onClick="ds_sh(this)" name="dateStored" size="20" readonly="readonly" style="cursor: text" /></td>
									</tr>
								<!--	<tr>
										<th>File Name</th><td><input id="filename" class="validate['required','number']" type="text" size="50" name="filename"></td>
									</tr> 
								-->
									<tr>
										<th>File Upload</th><td><input type="file" name="file"></td>
									</tr>
								</table>
								</center>
								<center>
								<input type="submit" class="art-button-wrapper" name="add" value="Submit"/>
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