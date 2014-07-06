<?php
include("../Models/MainModel.php");
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
    <title>BRYCeC - Search Results</title>
	<script type='text/javascript' src='../Javascript/formvalidator.js'></script>
	<script type="text/javascript" src="../Javascript/script.js"></script>
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../CSS/tabs.css" type="text/css" media="screen" />

	<link rel="stylesheet" type="text/css" href="../CSS/datepicker.css" />
	<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
	<tr><td  id="ds_calclass">
	</td></tr>
	</table>
	<script type="text/javascript" src="../Javascript/datepicker.js"></script>
	
	<script type="text/javascript">
		function execute (val) {
			if	(val == "patient name"){
				document.getElementById("div_id").innerHTML = "(input type = 'text')";
			}	else if (val == "date") {
				document.getElementById("div_id").innerHTML = "(input type = 'text' name= 'oher')";
			}
	</script>
	
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
					<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:20px; padding-bottom:10px;">
					
						<ol id="toc">
							<li><a href="#patientrecord"><span>SEARCH RESULTS</span></a></li>
						</ol>
					
						<div class="content">
							<center>
							<div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>SEARCH RESULTS</center>
								</h2>
							</div>
							</center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							<form action="../Controllers/Controller.php?action=addTestResult&id=<?php echo $_GET['id']; ?>" method="post">
								<input type="hidden" name="pno" value="<?= $_GET['id'] ?>" />
								<center>
								<select name="option">
										<option value="patient name">Patient Name</option>
										<option value="date recorded">Date Recorded</option>
										<option value="file name">File Name</option>
										<option value="Doctor">Doctor</option>
								</select>
								
								<div id="div_id">
									<input type="text" size="16">
								</div>
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