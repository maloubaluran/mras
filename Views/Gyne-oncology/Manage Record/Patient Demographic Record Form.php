<?php
include("../../../Models/MainModel.php");
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
    <title>MRAS - Patient Demographic Record Form</title>
	<script type="text/javascript" src="../../../Javascript/formvalidator.js"></script>
	<script type="text/javascript" src="../../../Javascript/script.js"></script>
    <link rel="stylesheet" href="../../../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../../CSS/tabs.css" type="text/css" media="screen" />
	
	<script type="text/javascript">
	var startyear = "1950";
	var endyear = "1996";
	var dat = new Date();
	var curday = dat.getDate();
	var curmon = dat.getMonth()+1;
	var curyear = dat.getFullYear();
	function checkleapyear(datea)
	{
		if(datea.getYear()%4 == 0)
		{
			if(datea.getYear()% 10 != 0)
			{
				return true;
			}
			else
			{
				if(datea.getYear()% 400 == 0)
					return true;
				else
					return false;
			}
		}
	  return false;
	}
	function DaysInMonth(Y, M) {
		with (new Date(Y, M, 1, 12)) {
			setDate(0);
			return getDate();
		}
	}
	function datediff(date1, date2) {
		var y1 = date1.getFullYear(), m1 = date1.getMonth(), d1 = date1.getDate(),
		 y2 = date2.getFullYear(), m2 = date2.getMonth(), d2 = date2.getDate();
		if (d1 < d2) {
			m1--;
			d1 += DaysInMonth(y2, m2);
		}
		if (m1 < m2) {
			y1--;
			m1 += 12;
		}
		return [y1 - y2, m1 - m2, d1 - d2];
	}
	function calage()
	{
	  var calday = document.form1.day.options[document.form1.day.selectedIndex].value;
	  var calmon = document.form1.month.options[document.form1.month.selectedIndex].value;
	  var calyear = document.form1.year.options[document.form1.year.selectedIndex].value;
		if(curday == "" || curmon=="" || curyear=="" || calday=="" || calmon=="" || calyear=="")
		{
			alert("please fill all the values and click go -");
		}	
		else
		{
			var curd = new Date(curyear,curmon-1,curday);
			var cald = new Date(calyear,calmon-1,calday);
			var diff =  Date.UTC(curyear,curmon,curday,0,0,0) - Date.UTC(calyear,calmon,calday,0,0,0);
			var dife = datediff(curd,cald);
			document.form1.age.value=dife[0];
			
		}
	}
	</script>
	
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
							<li><a href="#patientrecord"><span>PATIENT DEMOGRAPHIC RECORD</span></a></li>
						</ol>
					
						<div class="content" id="page-1">
							<center><div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>PATIENT DEMOGRAPHIC RECORD</center>
								</h2>
							</div></center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
								<div id="notification">&nbsp;</div>

								<form action="../Controllers/Controller.php?action=add&id=<?php echo $model->getPatientId() ?>" method="post" name="form1">
									<br>
									&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; First Name: <input type="text" size="16" id="fname" name="fname"> 
									Middle Name: <input type="text" size="16" id="mname" name="mname"> 
									Last Name: <input type="text" size="16" id="lname" name="lname">&nbsp;
									<br><br>&nbsp; &nbsp;
								
									MM: <select name="month" size="1">
										<script type="text/javascript">
										for(var i=1;i<13;i++)
										document.write("<option value="+i+">"+i+"</option>");
										</script></select> 
									
									DD: <select name="day" size="1">
										<script type="text/javascript">
										for(var j=1;j<32;j++)
										document.write("<option value="+j+">"+j+"</option>");
										</script></select>
									
									YYYY: <select name="year" size="1">
										  <script type="text/javascript">
										  for(var k=startyear;k<endyear;k++)
										  document.write("<option value="+k+">"+k+"</option>");
										  </script></select>
									
									Age: <input class="validate['required','number']" id="age" name="age" size="2" onKeyPress='return numbersonly(event, false)' onclick="calage()" > years
									Height: <input class="validate['required','number']" type="text" size="5" id="height" name="height"> ft.
									Weight: <input class="validate['required','number']" type="text" size="5" id="weight" name="weight"> kg. &nbsp; 
									<br><br>
									
									&nbsp; &nbsp; &nbsp; &nbsp; Address (Home): <input class="validate['required','alphanum']" type="text" size="30" id="homeaddress" name="homeaddress">&nbsp; 
									
									Contact # 
									<select name="contact#1">
										<option value="tel1">Telephone</option>
										<option value="cel1">Cellphone</option>
									</select>&nbsp;
									<input class="validate['required','number']" type="text" size="13" maxlength="11" onKeyPress='return numbersonly(event, false)' name="tel1">
									<br><br>
									
									&nbsp; &nbsp; Occupation: <input type="text" size="50" id="occupation" name="occupation">&nbsp; <br><br>
									<center>
									<input type="button" class="art-button-wrapper" name="submit" value="Save" onclick="" />
									</center>
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
