<?php
session_start();
	require_once("../../../db/mysql_db.class.php");
	require_once("../../../model/department.class.php");
	
	$conn = new mysql_db();
	$dept = new Department($conn);
	if(isset($_GET['id'])){
		$dept_id = $_GET['id'];
		$result = $dept->search($dept_id);
	}
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
				<div id="welcome" style="padding-left:20px; padding-right:10px; padding-top:20px; padding-bottom:10px;">
						<div class="content">
							<center>
							<div class="art-PostMetadataHeader">
								<h2 class="art-PostHeader">
								<center>EDIT DEPARTMENT</center>
								</h2>
							</div>
							</center>
							<hr noshade size="3" style="margin-left:200px;" width="300px" />
							<br>
							<form action="../../../controller/department.action.php" method="post">
								<table id="dataTable" border="0" cellpadding="5">
								<?php
									while($row = mysql_fetch_array($result)){
								?>
								<input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
								<center>
								<tr>
								<th>Department Name</th><td>
										<input type="text" name="deptName" value="<?php echo $row['deptName'];?>"><br>
								</tr>
								<?php
									}
								?>
								</table>
								</center>
								<center>
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
