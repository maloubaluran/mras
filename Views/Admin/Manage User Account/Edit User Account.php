<?php
require_once '../../../db/mysql_db.class.php';
require_once '../../../model/account.class.php';
require_once '../../../model/department.class.php';

$conn = new mysql_db();
$account = new Account($conn);
$department = new Department($conn);

$depts = $department->displayAll();

$user_acct = $account->search1($_GET['id']);

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
							<li><a href="#patientrecord"><span>UPDATE ACCOUNT</span></a></li>
						</ol>
					
						<div class="content">
							<center>
							<div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>UPDATE ACCOUNT</center>
								</h2>
							</div>
							</center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							<form action="../../../controller/account.action.php" method="post">
								<input type="hidden" name="pno" value="<?= $_GET['id'] ?>" />
								<center>
								<table id="dataTable" border="0" cellpadding="5">
								<?php
								if($user_acct!=""){
									while($row = mysql_fetch_array($user_acct)){
								?>
									<tr>
										<th>First Name</th><td><input id="f_name" value="<?php echo $row['f_name']; ?>" class="validate['required','number']" type="text" size="50" name="f_name" /></td>
									</tr>
									<tr>
										<th>Middle Name</th><td><input id="m_name" value="<?php echo $row['m_name']; ?>" class="validate['required','number']" type="text" size="50" name="m_name" /></td>
									</tr>
									<tr>
										<th>Last Name</th><td><input id="l_name" value="<?php echo $row['l_name']; ?>" class="validate['required','number']" type="text" size="50" name="l_name" /></td>
									</tr>
									<tr>
										<th>Department</th><td>
										<select name="departmentId">
											<option value="<?php echo $row['departmentId']; ?>"><?php echo $row['deptName']; ?></option>
											<?php
												if($depts!=""){
													while($row1 = mysql_fetch_array($depts))
														echo "<option value=".$row['id'].">".$row1['deptName']."</option>";
												}
												
											?>
										</select>
									</tr>
									<tr>
										<th>Position</th><td><input id="position" value="<?php echo $row['position']; ?>" class="validate['required','number']" type="text" size="20" name="position"></td>
									</tr>
									<tr>
										<th>Username</th><td><input id="username" value="<?php echo $row['username']; ?>" class="validate['required','number']" type="text" size="20" name="username"></td>
									</tr>
									<tr>
										<th>Password</th><td><input id="password" value="<?php echo $row['password']; ?>" class="validate['required','number']" type="password" size="20" name="password"></td>
									</tr>
									<tr>
										<th>IP address</th><td><input id="ip" value="<?php echo $row['ip']; ?>" class="validate['required','number']" type="text" size="20" name="ip"></td>
									</tr>
									<tr>
										<th>MAC address</th><td><input id="mac" value="<?php echo $row['mac']; ?>" class="validate['required','number']" type="text" size="20" name="mac"></td>
									</tr>
								<?php
									}
								}
								?>
								</table>
								</center>
								<center>
								<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
								<input type="submit" class="art-button-wrapper" name="update" value="Update" onclick="" />
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