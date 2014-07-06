<?php
require_once '../../../db/mysql_db.class.php';
require_once '../../../model/account.class.php';
require_once '../../../model/department.class.php';

$conn = new mysql_db();
$account = new Account($conn);
$department = new Department($conn);

$result = "";
if(isset($_POST['search'])) $result = $account -> search_acct($_POST);
else $result = $account->displayAll1();

$depts = $department->displayAll();

session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>MRAS - Add User Account</title>
	<script type='text/javascript' src='../../../Javascript/formvalidator.js'></script>
	<script type="text/javascript" src="../../../Javascript/script.js"></script>
    <link rel="stylesheet" href="../../../style.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../../../CSS/tabs.css" type="text/css" media="screen" />

</head>
<body>

	<div class="art-Sheet">
			<div class="art-Header-png"></div>
				<!-- menu -->
				
				<?php require_once "Menu.php"; ?>
					
				<!-- end menu -->
				
				<br><br>
				<span style="position:absolute; top:215px; width:798px;">
					<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:20px; padding-bottom:10px;">
					
						<ol id="toc">
							<li><a href="#patientrecord"><span>VIEW USER ACCOUNTS</span></a></li>
						</ol>
					
						<div class="content">
							<form action="History User Account.php" method="post">
							<table border="3" bordercolor="#BB5FB3" bordercolorlight="pink" cellpadding="7" cellspacing="3" valign="top" align="center">
								<tr>
									<td>Last Name</td><td><input type="text" name="l_name"></td>
									<td>First Name</td><td><input type="text" name="f_name"></td>
								</tr>
								<tr>
									<td>Department Name</td><td><input type="text" name="deptName"></td>
									<td>Position</td><td><input type="text" name="position"></td>
								</tr>
								<tr>
									<td colspan=4><input type="submit" name="search" value="Search"></td>
								</tr>
							</table>
							</form>
							<br>
							<table width="740" border="3" bordercolor="#BB5FB3" bordercolorlight="pink" cellpadding="2" cellspacing="3" valign="top" align="center">
							<tr>
								<th>Account ID</th>
								<th>Name</th>
								<th>Department</th>
								<th>Position</th>
								<th>Username</th>
								<td></td>
							</tr>	
							<?php
								if($result!="" && !empty($result)){
									while($row = mysql_fetch_array($result)){
							?>
									<tr>
									<td><center><?php echo $row['id']; ?></td>
									<td><center><?php echo $row['name']; ?></td>
									<td><center><?php echo $row['deptName'];?></td>
									<td><center><?php echo $row['position'];?></td>
									<td><center><?php echo $row['username'];?></td>
									<td>
									<a href="Edit User Account.php?id=<?php echo $row['id']; ?>"><img src="../../../image/update.png"></a>
									<a href="Delete User Account.php?id=<?php echo $row['id'];?>"><img src="../../../image/delete.png"></a>
									</td>
									</tr>
							<?php
									}
								}else{
									echo "<tr>";
									echo "<td colspan=6><center>No records</center></td>";
									echo "</tr>";
								}
							?>
							</table>
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