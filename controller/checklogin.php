<?php
	require_once '../db/mysql_db.class.php';
	//session_start();
				
	$conn = new mysql_db();

	$user = $_POST['username'];
	$pass = $_POST['password'];
	$ip = GetHostByName($REMOTE_ADDR);
	
	ob_start(); // Turn on output buffering
	system('ipconfig /all'); //Execute external program to display output
	$mycom=ob_get_contents(); // Capture the output into a variable
	ob_clean(); // Clean (erase) the output buffer

	$findme = "Physical";
	$pmac = strpos($mycom, $findme); // Find the position of Physical text
	$mac=substr($mycom,($pmac+36),17); // Get Physical Address

	/*$sql = "SELECT * 
		FROM account
		WHERE username = '".$user."'
		AND password = '".$pass."'
		AND ip = '".$ip."'
		AND mac = '".$mac."'
		";
	*/
	$sql = "
		SELECT * 
		FROM account
		WHERE username = '".$user."'
		AND password = '".$pass."'
	";
	$results = "";
	$user_ui = "Log In.php";

	$results = $conn->query($sql);
	
	if($results!="" && !empty($results) && $results!=null){
		
		while($row = mysql_fetch_array($results)){
			//session_start();
			$_SESSION['l_name'] = $row['l_name']; 
			$_SESSION['f_name'] = $row['f_name']; 
			$_SESSION['id'] = $row['id'];  
			if(isset($row['departmentId'])){
				$sql = "SELECT DISTINCT id , deptName FROM department WHERE id=".$row['departmentId'];
				$results = $conn->query($sql);
				if($results!=""){
					
					while($row2 = mysql_fetch_array($results)){
					
						if(strtolower($row2['deptName']) == "gyne"){
							$user_ui = "Views/Gyne-oncology/Home.php";
							//header("location: ../Views/Gyne-oncology/Home.php");
							
						}
						else
						if(strtolower($row2['deptName']) == "pathology"){
							$user_ui = "Views/Pathology/Home.php";
							//header("location:../Views/Pathology/");
							
						}
						else
						if(strtolower($row2['deptName']) == "imaging"){
							$user_ui = "Views/Imaging/Home.php";
							//header("location:../Views/Imaging/");
							
						}
						else	
						if(strtolower($row2['deptName']) == "admin"){
							$user_ui = "Views/Admin/Home.php";
							//header("location:../Views/Admin/");
							
						}
					}
				}else $user_ui = "Log In.php";
			}
		}
	}else $user_ui = "Log In.php";	
	//header("location:../".$user_ui);
	echo "<script>window.location ='../Views/Admin/'</script>";
?>