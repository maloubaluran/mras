<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
    <title>BRYCeC - Login Page</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	
</head>
<body>

        <div class="art-Sheet">
			<div class="art-Header-png"></div>
				
            <br><br>
			<span style="position:absolute; top:200px; width:798px;">
				<div id="welcome" style="padding-left:143px; padding-right:10px; padding-top:60px;">
					<img src="Images/bg-login.png" width="504" height="500" />
						<span style="position:absolute; left:320px; top:310px;">
							<div class="comment" style="align:center;">
							<? if(isset($_SESSION['logout'])){ echo $_SESSION['logout']; session_destroy();} ?>
							<? if(isset($_SESSION['invalid'])){ echo $_SESSION['invalid']; session_destroy();} ?>
							</div>
							<img src="Images/login.png" width="100px" height="100px" style= "position:absolute; left:25px; top:-150px;" />
						</span>	
						
						<div class="login_form">
							<form method="post" action="checklogin.php">
							  <p style="font:'Times New Roman', Times, serif; color:#ee6091;">
								<br>
								<br>
								  User Name: <br><input type="text" name="username" maxlength="100" size="30" />
								  <br>
								  <br>
								  Password: <br><input type="password" name="password" size="30" /> 
							  </p>
							  <input type="submit" style="margin-left:70px;" class="art-button-wrapper" value="Log In" />
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
