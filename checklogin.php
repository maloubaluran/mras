<?
session_start();
?>

<?php

$username=$_POST['username'];
$password=$_POST['password'];
$db = mysql_connect("localhost","root","");
mysql_select_db("mras",$db);

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM account WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$result1 = mysql_fetch_array($result);
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
// Register $myusername, $mypassword and redirect to file "home.php"
$sql_admin="SELECT * FROM admin WHERE username='$username' and password='$password'";
$result_admin=mysql_query($sql_admin);
$result1_admin = mysql_fetch_array($result_admin);
$count_admin=mysql_num_rows($result_admin);
$_SESSION['user_id'] = $result1_admin['adminID'];
$_SESSION['name'] = $result1_admin['name'];
if($count_admin==1){
echo '<script>function loadSuccess(){ location.href="Views/Admin/Home.php"; }</script>';
echo '<body onload="loadSuccess()">';
}
}
if($count==1){
// Register $myusername, $mypassword and redirect to file "home.php"
$sql_gyne="SELECT * FROM gyne WHERE username='$username' and password='$password'";
$result_gyne=mysql_query($sql_gyne);
$result1_gyne= mysql_fetch_array($result_gyne);
$count_gyne=mysql_num_rows($result_gyne);
$_SESSION['user_id'] = $result1_gyne['gyneID'];
$_SESSION['name'] = $result1_gyne['name'];
if($count_gyne==1){
echo '<script>function loadSuccess(){ location.href="Views/Gyne-oncology/Home.php"; }</script>';
echo '<body onload="loadSuccess()">';
}
}

if($count==1){
// Register $myusername, $mypassword and redirect to file "home.php"
$sql_patho="SELECT * FROM patho WHERE username='$username' and password='$password'";
$result_patho=mysql_query($sql_patho);
$result1_patho= mysql_fetch_array($result_patho);
$count_patho=mysql_num_rows($result_patho);
$_SESSION['user_id'] = $result1_patho['pathoID'];
$_SESSION['name'] = $result1_patho['name'];
if($count_patho==1){
echo '<script>function loadSuccess(){ location.href="Views/Pathology/Home.php"; }</script>';
echo '<body onload="loadSuccess()">';
}
}

else {
		$_SESSION['invalid'] = "Wrong Username or Password";
		echo '<script> function suc(){location.href="Log In.php";}</script>';
		echo '<body onload=suc()>';
}

?>

 
    
  