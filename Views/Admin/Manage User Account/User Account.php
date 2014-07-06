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
    <title>MRAS - User Account</title>
	<script type='text/javascript' src='../../../Javascript/formvalidator.js'></script>
	<script type="text/javascript" src="../../../Javascript/script.js"></script>
    <link rel="stylesheet" href="../../../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../../CSS/tabs.css" type="text/css" media="screen" />

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
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Manage User's Account</span></a>
							<ul style="width:172px;">
								<li>
									<a href="Add User Account.php"><span class="l"></span><span class="r"></span><span class="t">Create User Account</span></a>
								</li>
								<li>
									<a href="History User Account.php"><span class="l"></span><span class="r"></span><span class="t">User Accounts</span></a>
								</li>
							</ul>
						</li>
						<li>
                			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Manage Department</span></a>
							<ul style="width:148px;">
								<li>
									<a href="../Manage Department/Add Department.php"><span class="l"></span><span class="r"></span><span class="t">Add Department</span></a>
								</li>
								<li>
									<a href="../Manage Department/History Department.php"><span class="l"></span><span class="r"></span><span class="t">Department List</span></a>
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
							<li><a href="#patientrecord"><span>USER ACCOUNT</span></a></li>
						</ol>
					
						<div class="content">
							<center>
							<div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>USER ACCOUNT</center>
								</h2>
							</div>
							</center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							<form action="../Controllers/Controller.php?action=addTestResult&id=<?php echo $_GET['id']; ?>" method="post">
								<input type="hidden" name="pno" value="<?= $_GET['id'] ?>" />
								<center>
								<table id="dataTable" border="0" cellpadding="5">
									<tr>
										<th>First Name</th><td><input id="fname" class="validate['required','number']" type="text" size="50" name="fname" /></td>
									</tr>
									<tr>
										<th>Middle Name</th><td><input id="mname" class="validate['required','number']" type="text" size="50" name="mname" /></td>
									</tr>
									<tr>
										<th>Last Name</th><td><input id="lname" class="validate['required','number']" type="text" size="50" name="lname" /></td>
									</tr>
									<tr>
										<th>Department</th><td>
										<select name="dept">
											<option value="Pathology">Pathology</option>
											<option value="Gyne-Oncology">Gyne-Oncology</option>
										</select>
									</tr>
									<tr>
										<th>Position</th><td><input id="position" class="validate['required','number']" type="text" size="20" name="positions"></td>
									</tr>
									<tr>
										<th>Username</th><td><input id="username" class="validate['required','number']" type="text" size="20" name="username"></td>
									</tr>
									<tr>
										<th>Password</th><td><input id="password" class="validate['required','number']" type="text" size="20" name="passwrod"></td>
									</tr>
								</table>
								</center>
								<center>
								<input type="button" class="art-button-wrapper" name="submit" value="Save" onclick="" />
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