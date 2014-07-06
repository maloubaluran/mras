<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>MRAS - Add Patient Demographics</title>
	<script type="text/javascript" src="../../../Javascript/formvalidator.js"></script>
	<script type="text/javascript" src="../../../Javascript/script.js"></script>
    <link rel="stylesheet" href="../../../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../../CSS/tabs.css" type="text/css" media="screen" />
	<script src="js/gyne.js"></script>
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
					<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:20px; padding-bottom:10px;">
					
						<ol id="toc">
							<li><a href="#patientrecord"><span>ADD PATIENT MEDICAL HISTORY
							</span></a></li>
						</ol>
					
						<div class="content" id="page-1">
							<center><div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								</h2>
							</div></center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
								<div id="notification">&nbsp;</div>

	
								<form action="../../../controller/history.action.php" method="post" name="parent">
									<center>
									<table width=500>
										<tr>
											<td width=100>Patient Name</td>
											<td width=400> 
												<input type="text" name="patientName"  id="patientName">
												<input type="button" value="Search" onclick="search_patient()">
											</td>
											<input type="hidden" name="patientId" id="patientId">
										</tr>
										<tr>
											<td width=100>Family:</td>
											<td width=400><textarea rows=7 cols=50 name="family"></textarea></td>
										</tr>
										<tr>
											<td>Social:</td>
											<td><textarea rows=7 cols=50 name="social"></textarea></td>
										</tr>
										<tr>
											<td>Obstetric:</td>
											<td><textarea rows=7 cols=50 name="obstetric"></textarea></td>
										</tr>
										<tr>
											<td>Medical Allergies:</td>
											<td><textarea rows=7 cols=50 name="medicalAllergies"></textarea></td>
										</tr>
										<tr>
											<td>Surgical:</td>
											<td><textarea rows=7 cols=50 name="surgical"></textarea></td>
										</tr>
									</table>
									<input type="submit" name="add" value="Add Medical History">
									<br>		
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
