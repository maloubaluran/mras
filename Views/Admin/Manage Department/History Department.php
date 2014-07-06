<?php
session_start();

	require_once("../../../db/mysql_db.class.php");
	require_once("../../../model/department.class.php");
	
	$conn = new mysql_db();
	$dept = new Department($conn);
	$result = "";
	if(isset($_POST['search'])) $result = $dept -> search_dept($_POST);
	else $result = $dept->displayAll();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>MRAS - Edit Department</title>
    <script type="text/javascript" src="../../../Javascript/script.js"></script>
    <link rel="stylesheet" href="../../../style.css" type="text/css" media="screen" />

</head>
<body>

	<div class="art-Sheet">
		<div class="art-Header-png"></div>
				
			<!-- menu -->
				
			<?php require_once "Menu.php"; ?>
				
			<!-- end menu -->			
			<br><br>
			<span style="position:absolute; top:215px; width:798px;">
				<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:10px; padding-bottom:10px;">
					<form action="History%20Department.php" method="post">
					<table border="3" bordercolor="#BB5FB3" bordercolorlight="pink" cellpadding="7" cellspacing="3" valign="top" align="center">
						<tr>
							<td><input type="text" name="deptName"></td>
							<td><input type="submit" name="search" value="Search"></td>
						</tr>
					</table>
					</form>
					<br>
					<table border="3" bordercolor="#BB5FB3" bordercolorlight="pink" cellpadding="7" cellspacing="3" valign="top" align="center">
						<tr>
							<th>Department ID</th>
							<th>Department Name</th>
							<th>Action</th>
						</tr>
						<?php
							if($result!="" && !empty($result)){
								while($row = mysql_fetch_array($result)){
						?>
								<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['deptName'];?></td>
								<td>
								<center>
								<a href="Edit Department.php?id=<?php echo $row['id']; ?>"><img src="../../../image/update.png"></a>
								<a href="Delete Department.php?id=<?php echo $row['id'];?>"><img src="../../../image/delete.png"></a>
								</center>
								</td>
								</tr>
						<?php
								}
							}else{
								echo "<tr>";
								echo "<td colspan=2><center>No records</center></td>";
								echo "</tr>";
							}
						?>
					</table>
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
