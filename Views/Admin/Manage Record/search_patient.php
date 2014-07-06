<?php
require_once '../../../db/mysql_db.class.php';
require_once '../../../model/patient.class.php';
require_once '../../../model/account.class.php';

$conn = new mysql_db();
$patient = new Patient($conn);
$doctor = new Account($conn);

if(isset($_POST['search'])){
	$patients = $patient->search1($_POST);
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
		<title>MRAS - Upload Test Results</title>
		<script type='text/javascript' src='../../../Javascript/formvalidator.js'></script>
		<script type="text/javascript" src="../../../Javascript/script.js"></script>
		<link rel="stylesheet" href="../../../style.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="../../../CSS/tabs.css" type="text/css" media="screen" />

		<link rel="stylesheet" type="text/css" href="../../../CSS/datepicker.css" />
		<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
		<tr><td  id="ds_calclass">
		</td></tr>
		</table>
		<script src="../../../Javascript/datepicker.js" type="text/javascript"></script>
		<script src="js/record.js"></script>
	</head>
	<body>
		<form id="child" name="child" method="post">
			<center>
			<input type="text" name="l_name">
			<input type="submit" name="search" value="Search">
		<table width="300"border="1" bordercolor="#BB5FB3" bordercolorlight="pink" cellpadding=1 valign="top" align="center">
			<tr>
				<td>Patient ID</td>
				<td>Patient Name</td>
				<td>Action</td>
			</tr>
			<?php
			if($patients!=""){
				while($row = mysql_fetch_array($patients)){
			?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><input type="button" value="select" onclick="child_to_parent('<?php echo $_GET['id']; ?>','<?php echo $_GET['name']; ?>','<?php echo $row['id']; ?>','<?php echo $row['name']; ?>')">
			</tr>
			<?php
				}
			}else if(isset($_POST['search'])){
				echo "<tr><td colspan=3><center>No Records Found</center></td></tr>";
			}
			?>
			
		</table>	
		</form>
	</body>
</html>
