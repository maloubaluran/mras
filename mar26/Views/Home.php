<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>BRYCeC - Home</title>
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />

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
							<a href="../Controllers/Controller.php?logout"><span class="l"></span><span class="r"></span><span class="t">Log Out (<?= $_SESSION['name'] ?>)</span></a>
						</li>
					</ul>
				</div>
					
				<br><br>
				<span style="position:absolute; top:215px; width:798px;">
					<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:10px; padding-bottom:10px;">
						<img src="../Images/welcome.png"/>
							<div id="welcome" style="padding:7px;">
							<p align="justify" style="margin-left:10px; margin-right:10px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <strong>BRYCeC: Patient Monitoring System</strong> is a system that will monitor the medical services that each cervical cancer patient undergo, provide a correct patient information, make the recording of all patient information more organized and generate automated reports of patients.</p>
							<p align="justify" style="margin-left:10px; margin-right:10px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This system will also minimize the number of paper works and provide security 	of patient information and medical records of each patient.</p>
							<p align="justify" style="margin-left:10px; margin-right:10px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This system covers only the development and implementation of computerized patient medical records systems. This system includes storing and accessing patient information record in electronic form. The system can record patient&#39;s information, vital signs, pertinent physical examination, laboratory findings, diagnosis or doctor&#39;s findings, prescription and progress reports with the use of a database management.</p>
							<p align="justify" style="margin-left:10px; margin-right:10px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; This study tries to get rid of the manual patient monitoring that is currently used by Mercy Community Hospital. All information from the admission of a patient to his discharge will be recorded, even the medication reports and prescriptions. It also includes the maintenance of the medical record system to provide effective storage and retrieval of clinical information and for more complete and updated patient care information.</p>
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

					
