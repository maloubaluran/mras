<?php
include("../Models/MainModel.php");
$model = new Model();
$test_result = $model->viewResult($_GET['id']);
?>
<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>BRYCeC - Test Result</title>
	<script type='text/javascript' src='../Javascript/formvalidator.js'></script>
	<script type="text/javascript" src="../Javascript/script.js"></script>
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../CSS/tabs.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="../Javascript/jquery-1.2.1.pack.js"></script>
	<script type="text/javascript" src="../Javascript/addRow.js"></script>

	
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
							<li><a href="#patientrecord"><span>TEST RESULT</span></a></li>
						</ol>
					
						<div class="content" id="page-1">
							<center><div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>TEST RESULT</center>
								</h2>
							</div></center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							<div id="notification">&nbsp;</div>
								<form action="../Controllers/Controller.php?action=addTestResult&id=<?php echo $_GET['id']; ?>" method="post">
									<input type="hidden" name="pno" value="<?= $_GET['id'] ?>" />
									<center>
										<table id="dataTable" border="1" cellpadding="5">
											<tr>
												<th>Lab ID No.</th><td><u><?php echo $test_result['labID'] ?></u></td>
												<th>Date Requested</th><td><u><?php echo $test_result['daterequested'] ?></u></td>
											</tr>
											<tr>
												<th>Requesting MD</th><td><u><?php echo $test_result['md'] ?></u></td>
												<th>Date Reported</th><td><u><?php echo $test_result['datereported'] ?></u></td>
											</tr>
										</table>
										<br>
										<table id="resultTable" border="1" cellpadding="5">
											<tr>
												<td>Hemoglobin</td><td><u><?php echo $test_result['hemoglobin'] ?></u></td>
												<td>Prothombin Time: Test Value</td><td><u><?php echo $test_result['prothombinTime'] ?></u></td>
												<td>SGPT</td><td><u><?php echo $test_result['sgpt'] ?></u></td>
											</tr>
											<tr>
												<td>Hematocrit</td><td><u><?php echo $test_result['hematocrit'] ?></u></td>
												<td>% Activity</td><td><u><?php echo $test_result['activity'] ?></u></td>
												<td>HLK Phosphatase</td><td><u><?php echo $test_result['phosphatase'] ?></u></td>
											</tr>
											<tr>
												<td>Red Blood Cells</td><td><u><?php echo $test_result['rbc'] ?></u></td>
												<td colspan="2"><b>INR</b></td>
												<td>Serum Amylase</td><td><u><?php echo $test_result['serum_amylase'] ?></u></td>
											</tr>
											<tr>
												<td>White Blood Cells</td><td><u><?php echo $test_result['wbc'] ?></u></td>
												<td>Control Value</td><td><u><?php echo $test_result['controlValue'] ?></u></td>
												<td>Lactic Dehydrogenase</td><td><u><?php echo $test_result['lacticDehydrogenase'] ?></u></td>
											</tr>
											<tr>
												<td colspan="2"><b>Differential Count</b></td>
												<td colspan="2"><b>Partial Thromboplastin Time</b></td>
												<td>Creatinine-Kinase(CPK)</td><td><u><?php echo $test_result['cpk'] ?></u></td>
											</tr>
											<tr>
												<td>Neutrophils</td><td><u><?php echo $test_result['neutrophils'] ?></u></td>
												<td>Test Value</td><td><u><?php echo $test_result['testValue'] ?></u></td>
												<td>CK-MB</td><td><u><?php echo $test_result['ckmb'] ?></u></td>
											</tr>
											<tr>
												<td>Lymphocytes</td><td><u><?php echo $test_result['lymphocytes'] ?></u></td>
												<td>Control Value</td><td><u><?php echo $test_result['controlValue2'] ?></u></td>
												<td>Total Bilirubin</td><td><u><?php echo $test_result['totalBilirubin'] ?></u></td>
											</tr>
											<tr>
												<td>Eusinophils</td><td><u><?php echo $test_result['eusinophils'] ?></u></td>
												<td>Blood Uric Acid</td><td><u><?php echo $test_result['bua'] ?></u></td>
												<td>Indirect Bilirubin(B1)</td><td><u><?php echo $test_result['b1'] ?></u></td>
											</tr>
											<tr>
												<td>Monocytes</td><td><u><?php echo $test_result['monocytes'] ?></u></td>
												<td>Blood Urea Nitrogen</td><td><u><?php echo $test_result['bun'] ?></u></td>
												<td>Direct Bilirubin (B2)</td><td><u><?php echo $test_result['b2'] ?></u></td>
											</tr>
											<tr>
												<td>Basophils</td><td><u><?php echo $test_result['basophils'] ?></u></td>
												<td>Cholesterol</td><td><u><?php echo $test_result['cholesterol'] ?></u></td>
												<td>Glycosylated Hemoglobin</td><td><u><?php echo $test_result['glycosylated'] ?></u></td>
											</tr>
											<tr>
												<td>Stabs</td><td><u><?php echo $test_result['stabs'] ?></u></td>
												<td>Triglycerides</td><td><u><?php echo $test_result['triglycerides'] ?></u></td>
												<td>Sodium</td><td><u><?php echo $test_result['sodium'] ?></u></td>
											</tr>
											<tr>
												<td>Platelet Count</td><td><u><?php echo $test_result['plateletCount'] ?></u></td>
												<td>HDL-Cholesterol</td><td><u><?php echo $test_result['hdl'] ?></u></td>
												<td>Potassium</td><td><u><?php echo $test_result['potassium'] ?></u></td>
											</tr>
											<tr>
												<td>Reticulocyte Count</td><td><u><?php echo $test_result['reticulocyteCount'] ?></u></td>
												<td>LDL-Cholesterol</td><td><u><?php echo $test_result['ldl'] ?></u></td>
												<td>Chloride</td><td><u><?php echo $test_result['chloride'] ?></u></td>
											</tr>
											<tr>
												<td>Sedimentation Rate</td><td><u><?php echo $test_result['sedimentationRate'] ?></u></td>
												<td>Creatinine</td><td><u><?php echo $test_result['creatinine'] ?></u></td>
												<td>Calcium</td><td><u><?php echo $test_result['calcium'] ?></u></td>
											</tr>
											<tr>
												<td>Malarial Smear</td><td><u><?php echo $test_result['malarialSmear'] ?></u></td>
												<td>Glucose(FBS)</td><td><u><?php echo $test_result['fbs'] ?></u></td>
												<td>Total Protein</td><td><u><?php echo $test_result['totalProtein'] ?></u></td>
											</tr>
											<tr>
												<td>Blood Type</td><td><u><?php echo $test_result['bloodType'] ?></u></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(RBS)</td><td><u><?php echo $test_result['rbs'] ?></u></td>
												<td>Albumin</td><td><u><?php echo $test_result['albumin'] ?></u></td>
											</tr>
											<tr>
												<td>RH Type</td><td><u><?php echo $test_result['rhType'] ?></u></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(HGT)</td><td><u><?php echo $test_result['hgt'] ?></u></td>
												<td>Globulin</td><td><u><?php echo $test_result['globulin'] ?></u></td>
											</tr>
											<tr>
												<td>Bleeding Time</td><td><u><?php echo $test_result['bleedingTime'] ?></u></td>
												<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2HRS PPBS)</td><td><u><?php echo $test_result['ppbs'] ?></u></td>
												<td>A/G Ratio</td><td><u><?php echo $test_result['agRatio'] ?></u></td>
											</tr>
											<tr>
												<td>Clotting Time</td><td><u><?php echo $test_result['clottingTime'] ?></u></td>
												<td>SGOT</td><td><u><?php echo $test_result['sgot'] ?></u></td>
											</tr>
										</table>
									</center>
									<br><br>
									<input type="submit" class="art-button-wrapper" name="addAssessment" value="Add Assessment" onClick='window.location.href="Add Assessment.php"'>
									&nbsp; &nbsp;<input class="art-button-wrapper" type="button" name="cancel" value="Cancel" onClick="window.location.href='Display Patient.php?id=<?php echo $_GET['id']; ?>'">
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
