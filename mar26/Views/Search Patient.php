<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>BRYCeC - View Patient</title>
    <script type="text/javascript" src="../Javascript/script.js"></script>
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
						<ul class="art-menu2">
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
				
					<form action="" class="searchform">
						<br><br>
						<p align="center" style="color:#BB5FB3; font-size:18px;"><b>First Name/Last Name:</b> &nbsp; <input type="text" name="userInfo" class="textbox" />
							<input type="submit" name="search" class="art-button-wrapper" value="Search" onclick="makerequest('Display User.php','patient'); return false;"/>
						</p>
						<br><br>
					</form>
					
					<div id="patient">
					
						<?php if(isset($_GET['search'])){
							if($_GET['userInfo']!=""){
							require_once("../Models/MainModel.php");

							$model = new Model();
							$user = $model->displayPatient($_GET['userInfo']);
							echo '<table border="3" bordercolor="#BB5FB3" bordercolorlight="pink" cellpadding="7" cellspacing="3" valign="top" align="center">
									<tr>
									<th><center />Action</th>
									<th>Last Name</th>
									<th>First Name</th>
									<th>Middle Name</th>
									</tr>';
							if(mysql_num_rows($user)>0){		
							 while($row = mysql_fetch_array($user)){?>
								
								<tr>
								<td><a href="../Views/Display Patient.php?id=<?php echo $row['patientID'];?>"><input type="submit" name="view" class="art-button-wrapper" value="View" /></a></td>
								<td><?php echo $row['l_name'];?></td>
								<td><?php echo $row['f_name'];?></td>
								<td><?php echo $row['m_name'];?></td>
								</tr>

						<?php }
							echo '<table>';
							echo '<br>';
							echo '<div id="view"></div>';
						}else{
							
								echo " "."No match found for ".$_GET['userInfo']."."." "."Please use the Add Patient submenu.";
						
						}
						}else{
								echo " "."No match found for ".$_GET['userInfo']."."." "."Please use the Add Patient submenu.";
						}
						}?>
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
