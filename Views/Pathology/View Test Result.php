<?php
require_once '../../db/mysql_db.class.php';
require_once '../../model/patient.class.php';
require_once '../../model/patient_record.class.php';

$conn = new mysql_db();
$pr = new PatientRecord($conn);

$patients = "";

if(isset($_POST['search'])){
	$patients = $pr->search1($_POST);
}else{
	$patients = $pr->display();
}
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
	<script src="js/patho.js"></script>
	 <link rel="stylesheet" type="text/css" href="../../CSS/datepicker.css" />
    <table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
    <tr><td  id="ds_calclass">
    </td></tr>
    </table>
    <script src="../../Javascript/datepicker.js" type="text/javascript"></script>

	<!-- view documents as image using jquery - lightbox -->
	<link rel="stylesheet" href="../../lib/jquery-lightbox/css/lightbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../../lib/jquery/jquery-1.4.2.js"></script>
	
	<script type="text/javascript" src="../../lib/jquery-lightbox/jquery.lightbox.js"></script>
	
	<script>
		$(document).ready(function(){
			$(".lightbox").lightbox();
		});
	</script>
	<!-- End src--->
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
							<li><a href="#patientrecord"><span>VIEW TEST RESULTS</span></a></li>
						</ol>
					
						<div class="content">
							<center>
							<div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>VIEW TEST RESULTS</center>
								</h2>
							</div>
							</center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							<form action="View Test Result.php" class="searchform" method="post">
								<p align="center" style="color:#BB5FB3; font-size:18px;">
								<b>Last Name:</b> &nbsp; <input type="text" name="l_name" class="textbox" />
									<input type="submit" name="search" class="art-button-wrapper" value="Search" onclick="makerequest('Display User.php','patient'); return false;"/>
								</p>
								<br>
							</form>
							<form action="../../controller/patient_record.action.php" name="parent" id="parent" method="post" enctype="multipart/form-data">		
								<center>
								<form action="../../../controller/patient.action.php" method="post">
									<table width="700"border="1" bordercolor="#BB5FB3" bordercolorlight="pink" cellpadding=1 valign="top" align="center">
							<tr>
								<th>Patient ID</th>
								<th>Patient Name</th>
								<th>Doctor</th>
								<th>Date Stored</th>
								<th>Document</th>
								
							</tr>
							<?php
							if($patients != ""){
								while($row = mysql_fetch_array($patients)){
							?>
							<tr>
								<td><center><?php echo $row['patientId']; ?></td>
								<td><center><?php echo $row['pname']; ?></td>
								<td><center><?php echo $row['aname']; ?></td>
								<td><center><?php echo $row['dateStored']; ?></td>				
								<td>
									<center>
									<?php
										$files = $pr->check_doc_office($row['patientId']."=".$row['dateStored']."/");
										if($files!=""){				
											foreach($files as $file)
												if($file!="") echo $file."<br>";
										}
									?>
								</td><!--				
								<td>
									<center>
									<a href="Edit Test Result.php?id=<?php echo $row['id']; ?>&patientId=<?php echo $row['patientId']; ?>&dateStored=<?php echo $row['dateStored'];?>"><img src="../../image/update.png"></a>
									<a href="" onclick='del_confirm("Delete Test Result.php?id=<?php echo $row['id']; ?>&patientId=<?php echo $row['patientId']; ?>&dateStored=<?php echo $row['dateStored'];?>"')><img src="../../image/delete.png")></a>
									</center>
									</td>-->
							</tr>
							<?php
								}
							}else{
								echo "<tr><td colspan=6><Center>No Records Found</td></tr>";
							}
							?>
							</table>
							</center>
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