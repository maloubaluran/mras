<?php
session_start();

require_once '../../../db/mysql_db.class.php';
require_once '../../../model/history.class.php';
require_once '../../../model/patient_record.class.php';
require_once '../../../model/patient.class.php';

$conn = new mysql_db();
$history = new History($conn);
$pr = new PatientRecord($conn);
$patient = new Patient($conn);
if(isset($_POST['search'])) $pinfo = $patient->search2($_POST);
else $pinfo = $patient->displayAll();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>MRAS - View Patient Record</title>
    <script type="text/javascript" src="../../../Javascript/script.js"></script>
    <link rel="stylesheet" href="../../../style.css" type="text/css" media="screen" />
	
	<!-- view documents as image using jquery - lightbox -->
	<link rel="stylesheet" href="../../../lib/jquery-lightbox2/css/lightbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="../../../lib/jquery/jquery-1.4.2.js"></script>
	
	<script type="text/javascript" src="../../../lib/jquery-lightbox2/jquery.lightbox.js"></script>
	
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
                			<a href="../Home.php"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
                		</li>
						<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Manage Record</span></a>
							<ul style="width:230px;">
								<li>
									<a href="Add Patient Demographics.php"><span class="l"></span><span class="r"></span><span class="t">Add Patient Demographics</span></a>
								</li>
								<li>
									<a href="Add Patient Medical History.php"><span class="l"></span><span class="r"></span><span class="t">Add Patient Medical History</span></a>
								</li>
								<li>
									<a href="View Patient Record.php"><span class="l"></span><span class="r"></span><span class="t">View Patient Record</span></a>
								</li>
								<li>
									<a href="View Patient Medical History.php"><span class="l"></span><span class="r"></span><span class="t">View Patient Medical History</span></a>
								</li>
							</ul>
						</li>							
                		<li>
                			<a href="../About Us.php"><span class="l"></span><span class="r"></span><span class="t">About Us</span></a>
                		</li>
                        <li>
                        	<a href="../../../Controllers/Controller.php?logout"><span class="l"></span><span class="r"></span><span class="t">Log Out (<?php echo $_SESSION['name'] ?>)</span></a>
                        </li>
                	</ul>
			</div>
			
			<br><br>
			<span style="position:absolute; top:215px; width:798px;">
				<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:10px; padding-bottom:10px;">
				
					<form action="View Patient Medical History.php" method="post" class="searchform">
						<br><br>
						<p align="center" style="color:#BB5FB3; font-size:18px;"><b>Last Name:</b> &nbsp; 
							<input type="text" name="l_name" class="textbox" />
							<input type="submit" name="search" class="art-button-wrapper" value="Search"/>
						</p>
						<br>
					</form>
					<form method="post" action="../../../controller/history.action.php">
					<div id="patient">
						<table width="750"border="1" bordercolor="#BB5FB3" bordercolorlight="pink" cellpadding=1 valign="top" align="center">
							<tr>
								<td>Patient ID</td>
								<td>Patient Name</td>								
								<td>Address</td>
								<td>Document/s</td>
								<td></td>
							</tr>
							<?php
							if($pinfo != ""){
								while($row = mysql_fetch_array($pinfo)){
							?>
							<tr>	
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['l_name'].", ".$row['f_name'];?></td>
								<td><?php echo $row['homeadd']; ?></td>
								<td>
								<?php
										$files = $pr->check_doc($row['id']);
										if($files!=""){				
											foreach($files as $file)
												if($file!="") echo $file."<br>";
										}
								?>
								</td>
								<td>
									<center>
									<a href="Edit Patient Medical History.php?id=<?php echo $row['id']; ?>"><img src="../../../image/update.png"></a>
									<a href="Delete Patient Medical History.php?id=<?php echo $row['id'];?>"><img src="../../../image/delete.png"></a>
									</center>
								</td>
							</tr>
							<?php
								}
							}
							?>
						</table>
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
