<?
session_start();
?>

<?php

$username=$_POST['username'];
$password=$_POST['password'];

$db = mysql_connect("localhost","root","");
mysql_select_db("sampledb",$db);

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$sql="SELECT * FROM doctor WHERE username='$username' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$result1 = mysql_fetch_array($result);
$count=mysql_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "home.php"
$_SESSION['user_id'] = $result1['doctorID'];
$_SESSION['name'] = $result1['name'];

echo '<script>function loadSuccess(){ location.href="Views/Home.php"; }</script>';
echo '<body onload="loadSuccess()">';


}
else {
		$_SESSION['invalid'] = "Wrong Username or Password";
		echo '<script> function suc(){location.href="Log In.php";}</script>';
		echo '<body onload=suc()>';
}
?>

 
    
  