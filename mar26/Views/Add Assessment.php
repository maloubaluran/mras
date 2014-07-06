<?php
session_start();
include("../Models/MainModel.php");
$model = new Model();
$con = mysql_connect("localhost", "root");
mysql_select_db("db",$con);
$sql = "SELECT id from labtestresult WHERE patientID = ".$_GET['id']."";
$result = mysql_query($sql);
$test_id = "";
while($datum = mysql_fetch_array($result)){
  $test_id = $datum['id'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>BRYCeC - Add Assessment</title>
	<script type="text/javascript" src="../Javascript/formvalidator.js"></script>
	<script type="text/javascript" src="../Javascript/script.js"></script>
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../CSS/tabs.css" type="text/css" media="screen" />
	<!--
	<link rel="stylesheet" type="text/css" href="../CSS/imgareaselect-animated.css" /> 
	<script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="../js/jquery.imgareaselect.pack.js"></script>
	<script type="text/javascript" src="../js/jquery.load.js"></script>
	
	-->
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
							<li><a href="#patientrecord"><span>ASSESSMENT</span></a></li>
						</ol>
					
						<div class="content" id="page-1">
							<center><div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>ASSESSMENT</center>
								</h2>
							</div></center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							
							<form action="../Controllers/Controller.php?action=addAssessment&id=<?php echo $_GET['id']; ?>" method="post">
									<input type="hidden" name="testid" value="<?php echo $test_id; ?>">			
								
							<div id="notification">&nbsp;</div>
									<strong>I. Location and Pain Description</strong>
									<br><br>
									&nbsp; &nbsp; &nbsp; On the diagram, mark the area where you feel pain.<br>
									<i>&nbsp; &nbsp; Use any of the following marks to describe the pain.</i><br><br>
										&nbsp; &nbsp; &nbsp;<b>pr</b> - pricking<br>
										&nbsp; &nbsp; &nbsp;<b>th</b> - throbbing<br>
										&nbsp; &nbsp; &nbsp;<b>du</b> - dull<br>
										&nbsp; &nbsp; &nbsp;<b>ac</b> - aching<br>
										&nbsp; &nbsp; &nbsp;<b>pu</b> - pulling<br>
										&nbsp; &nbsp; &nbsp;<b>st</b> - stabbing<br>
										&nbsp; &nbsp; &nbsp;<b>bu</b> - burning<br>
										&nbsp; &nbsp; &nbsp;<b>sh</b> - sharp<br>
										&nbsp; &nbsp; &nbsp;<b>sp</b> - splitting
										&nbsp; &nbsp; &nbsp;<br><br>
										&nbsp; &nbsp; &nbsp;
										<img src="../Images/human.png" id="toAnnotate" width="558px" height="500px" alt="Human Body" class="no-border" />
										<br><br><br>
									<strong>II. Intensity</strong><br><br>
										<i>&nbsp; &nbsp; &nbsp; Please select the intensity of pain experienced using this <b>Wong-Baker FACES Pain Rating Scale.</b></i><br><br>
										<br>
										<table style="position:relative; left:15px;">
											<tr>
												<td><img src="../Images/face1.png"  /></td>
												<td>&nbsp;</td>
												<td><img src="../Images/face2.png" /></td>
												<td>&nbsp;</td>
												<td><img src="../Images/face3.png" /></td>
												<td>&nbsp;</td>
												<td><img src="../Images/face4.png" /></td>
												<td>&nbsp;</td>
												<td><img src="../Images/face5.png" /></td>
												<td>&nbsp;</td>
												<td><img src="../Images/face6.png" /></td>
											</tr>
											
											<tr>
												<td>0<input type=radio name="intensity" value="0" checked="checked"></td>
												<td>1<input type=radio name="intensity" value="1">&nbsp; &nbsp; &nbsp;</td>
												<td>2<input type=radio name="intensity" value="2"></td>
												<td>3<input type=radio name="intensity" value="3">&nbsp; &nbsp; &nbsp;</td>
												<td>4<input type=radio name="intensity" value="4"></td>
												<td>5<input type=radio name="intensity" value="5">&nbsp; &nbsp; &nbsp;</td>
												<td>6<input type=radio name="intensity" value="6"></td>
												<td>7<input type=radio name="intensity" value="7">&nbsp; &nbsp; &nbsp;</td>
												<td>8<input type=radio name="intensity" value="8"></td>
												<td>9<input type=radio name="intensity" value="9">&nbsp; &nbsp; &nbsp;</td>
												<td>10<input type=radio name="intensity" value="10"></td>
											</tr>
										</table>
										<br><br><br>
										
									<strong>III. Duration</strong><br><br>
									
										&nbsp; &nbsp; &nbsp; Is the pain always there? 
										<select name="pain">
											<option value="yes">Yes</option>
											<option value="no">No</option>
										</select>
										<!--<input type="radio" name="pain" checked="checked" value=true>Yes <input type="radio" name="pain" value=false>No<br>-->
										&nbsp; &nbsp; &nbsp; Does the pain come and go? 
										<!--<input type="radio" name="come" checked="checked" value=true>Yes  <input type="radio" name="come" value=false>No-->
										<select name="come">
											<option value="yes">Yes</option>
											<option value="no">No</option>
										</select>
										<br><br><br>
										
									<strong>IV.	Aggravating and Alleviating Factors</strong><br><br>
										
										&nbsp; &nbsp; &nbsp; What makes the pain better?<br>
										<textarea cols="50" rows="8" class="validate['required','nodigit']" name="better"></textarea>
										<br><br>
										&nbsp; &nbsp; &nbsp; What makes the pain worse?<br>
										<textarea cols="50" rows="8" class="validate['required','nodigit']" name="worse"></textarea>
										<br><br><br>
									
									<strong>V. Effects</strong><br><br>
									
										&nbsp; &nbsp; &nbsp; What are the accompanying symptoms?<br>
										<textarea cols="50" rows="8" class="validate['required','nodigit']" name="symptoms"></textarea>
										<br>
										&nbsp; &nbsp; &nbsp; Has the pain interfered with your:
										<br><br>
										&nbsp; &nbsp; &nbsp;
										<input type="checkbox" name="sleep">Sleep &nbsp;
										<input type="checkbox" name="energy">Energy &nbsp;
										<input type="checkbox" name="mood">Mood &nbsp;
										<input type="checkbox" name="concentration">Concentration
										<br><br><br>
										
										<input class="art-button-wrapper" type="submit" name="submit" value="Submit">&nbsp; &nbsp;
										&nbsp; &nbsp;<input class="art-button-wrapper" type="button" name="cancel" value="Cancel" onClick="window.location.href='Display Patient.php?id=<?php echo $_GET['id']; ?>'">
								
										<br><br>					
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
