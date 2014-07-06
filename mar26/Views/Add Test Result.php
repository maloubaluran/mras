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
    <title>BRYCeC - Add Test Result</title>
	<script type='text/javascript' src='../Javascript/formvalidator.js'></script>
	<script type="text/javascript" src="../Javascript/script.js"></script>
    <link rel="stylesheet" href="../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../CSS/tabs.css" type="text/css" media="screen" />
	
	<script type="text/javascript" src="../Javascript/jquery-1.2.1.pack.js"></script>
	<script type="text/javascript" src="../Javascript/addRow.js"></script>
	
	<link rel="stylesheet" href="../lib/jquery/theme/base/jquery.ui.all.css">
	<script src="../lib/jquery/jquery-1.4.2.js"></script>
	<script src="../lib/jquery/ui/jquery.ui.core.js"></script>
	<script src="../lib/jquery/ui/jquery.ui.widget.js"></script>
	<script src="../lib/jquery/ui/jquery.ui.datepicker.js"></script>

	<script>
	$(function() {
		var dates = $( "#date1, #date2" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "date1" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" );
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
	});
	</script>
	
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
										<th>Lab ID No.</th><td><input class="validate['required','number']" type="text" size="20" name="labID"></td>
										<th>Date Requested</th><td><input id="date1" class="validate['required','number']" onClick="ds_sh(this);" name="daterequested" size="20" readonly="readonly" style="cursor: text" /></td>
									</tr>
									<tr>
										<th>Requesting MD</th><td><input class="validate['required','number']" type="text" size="20" name="md"></td>
										<th>Date Reported</th><td><input id="date2" class="validate['required','number']" onClick="ds_sh(this)" name="datereported" size="20" readonly="readonly" style="cursor: text" /></td>
									</tr>
									</table>
									<br>
									<table id="resultTable" border="1" cellpadding="5">
									<tr>
										<td>Hemoglobin</td><td><input type="text" size="10" name="hemoglobin"></td>
										<td>Prothombin Time: Test Value</td><td><input type="text" size="10" name="prothombinTime"></td>
										<td>SGPT</td><td><input type="text" size="10" name="sgpt"></td>
									</tr>
									<tr>
										<td>Hematocrit</td><td><input type="text" size="10" name="hematocrit"></td>
										<td>% Activity</td><td><input type="text" size="10" name="activity"></td>
										<td>HLK Phosphatase</td><td><input type="text" size="10" name="phosphatase"></td>
									</tr>
									<tr>
										<td>Red Blood Cells</td><td><input type="text" size="10" name="rbc"></td>
										<td colspan="2"><b>INR</b></td>
										<td>Serum Amylase</td><td><input type="text" size="10" name="serum_amylase"></td>
									</tr>
									<tr>
										<td>White Blood Cells</td><td><input type="text" size="10" name="wbc"></td>
										<td>Control Value</td><td><input type="text" size="10" name="controlValue"></td>
										<td>Lactic Dehydrogenase</td><td><input type="text" size="10" name="lacticDehydrogenase"></td>
									</tr>
									<tr>
										<td colspan="2"><b>Differential Count</b></td>
										<td colspan="2"><b>Partial Thromboplastin Time</b></td>
										<td>Creatinine-Kinase(CPK)</td><td><input type="text" size="10" name="cpk"></td>
									</tr>
									<tr>
										<td>Neutrophils</td><td><input type="text" size="10" name="neutrophils"></td>
										<td>Test Value</td><td><input type="text" size="10" name="testValue"></td>
										<td>CK-MB</td><td><input type="text" size="10" name="ckmb"></td>
									</tr>
									<tr>
										<td>Lymphocytes</td><td><input type="text" size="10" name="lymphocytes"></td>
										<td>Control Value</td><td><input type="text" size="10" name="controlValue2"></td>
										<td>Total Bilirubin</td><td><input type="text" size="10" name="totalBilirubin"></td>
									</tr>
									<tr>
										<td>Eusinophils</td><td><input type="text" size="10" name="eusinophils"></td>
										<td>Blood Uric Acid</td><td><input type="text" size="10" name="bua"></td>
										<td>Indirect Bilirubin(B1)</td><td><input type="text" size="10" name="b1"></td>
									</tr>
									<tr>
										<td>Monocytes</td><td><input type="text" size="10" name="monocytes"></td>
										<td>Blood Urea Nitrogen</td><td><input type="text" size="10" name="bun"></td>
										<td>Direct Bilirubin (B2)</td><td><input type="text" size="10" name="b2"></td>
									</tr>
									<tr>
										<td>Basophils</td><td><input type="text" size="10" name="basophils"></td>
										<td>Cholesterol</td><td><input type="text" size="10" name="cholesterol"></td>
										<td>Glycosylated Hemoglobin</td><td><input type="text" size="10" name="glycosylated"></td>
									</tr>
									<tr>
										<td>Stabs</td><td><input type="text" size="10" name="stabs"></td>
										<td>Triglycerides</td><td><input type="text" size="10" name="trigycerides"></td>
										<td>Sodium</td><td><input type="text" size="10" name="sodium"></td>
									</tr>
									<tr>
										<td>Platelet Count</td><td><input type="text" size="10" name="plateletCount"></td>
										<td>HDL-Cholesterol</td><td><input type="text" size="10" name="hdl"></td>
										<td>Potassium</td><td><input type="text" size="10" name="potassium"></td>
									</tr>
									<tr>
										<td>Reticulocyte Count</td><td><input type="text" size="10" name="reticulocyteCount"></td>
										<td>LDL-Cholesterol</td><td><input type="text" size="10" name="ldl"></td>
										<td>Chloride</td><td><input type="text" size="10" name="chloride"></td>
									</tr>
									<tr>
										<td>Sedimentation Rate</td><td><input type="text" size="10" name="sedimentationRate"></td>
										<td>Creatinine</td><td><input type="text" size="10" name="creatinine"></td>
										<td>Calcium</td><td><input type="text" size="10" name="calcium"></td>
									</tr>
									<tr>
										<td>Malarial Smear</td><td><input type="text" size="10" name="malarialSmear"></td>
										<td>Glucose(FBS)</td><td><input type="text" size="10" name="fbs"></td>
										<td>Total Protein</td><td><input type="text" size="10" name="totalProtein"></td>
									</tr>
									<tr>
										<td>Blood Type</td><td><input type="text" size="10" name="bloodType"></td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(RBS)</td><td><input type="text" size="10" name="rbs"></td>
										<td>Albumin</td><td><input type="text" size="10" name="albumin"></td>
									</tr>
									<tr>
										<td>RH Type</td><td><input type="text" size="10" name="rhType"></td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(HGT)</td><td><input type="text" size="10" name="hgt"></td>
										<td>Globulin</td><td><input type="text" size="10" name="globulin"></td>
									</tr>
									<tr>
										<td>Bleeding Time</td><td><input type="text" size="10" name="bleedingTime"></td>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2HRS PPBS)</td><td><input type="text" size="10" name="ppbs"></td>
										<td>A/G Ratio</td><td><input type="text" size="10" name="agRatio"></td>
									</tr>
									<tr>
										<td>Clotting Time</td><td><input type="text" size="10" name="clottingTime"></td>
										<td>SGOT</td><td><input type="text" size="10" name="sgot"></td>
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
