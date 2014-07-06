<?php
/*if(!isset($_SESSION['username']) && !isset($_SESSION['fullname'])){
header("location:login.php");
}*/
require_once '../../model/patient_record.class.php';
require_once '../../db/mysql_db.class.php';
require_once '../../lib/Zend/Service/LiveDocx/MailMerge.php'; 	 
require_once '../../lib/Zend/Service/LiveDocx.php'; 	 

$file_folder_url = "D:/xampp/htdocs/miming/file/";

$conn = new mysql_db();
$pr = new PatientRecord($conn);

if(isset($_POST['add'])){
	$pr ->upload($_POST,$file);
}

$mailMerge = new Zend_Service_LiveDocx_MailMerge();
 
$mailMerge->setUsername('myUsername')
          ->setPassword('myPassword');
 
$mailMerge->setLocalTemplate('document.doc');
 
// necessary as of LiveDocx 1.2
$mailMerge->assign('dummyFieldName', 'dummyFieldValue');
 
$mailMerge->createDocument();
 
$document = $mailMerge->retrieveDocument('pdf');
 
file_put_contents('document.pdf', $document);
 
unset($mailMerge);
?>

<html>
<head>
	
		<link rel="stylesheet" type="text/css" href="../../CSS/datepicker.css" />
		<table class="ds_box" cellpadding="0" cellspacing="0" id="ds_conclass" style="display: none;">
		<tr><td  id="ds_calclass">
		</td></tr>
		</table>
		<script src="../../Javascript/datepicker.js" type="text/javascript"></script>

</head>
<body>
	<iframe id="myFrame" style="display:none" width="500" height="300"></iframe>
	<input type="button" value="Open PDF" onclick = "openPdf()"/>
	<script type="text/javascript">
	function openPdf()
	{
	var omyFrame = document.getElementById("myFrame");
	omyFrame.style.display="block";
	omyFrame.src = "localhost/miming/file/LearningExtJS.pdf";
	}
	</script>
	<a href="http://docs.google.com/?DocAction=updoc&formsubmitted=true&uploadURL=http://localhost/miming/10=10=2011-04-01/1.docx">View</a>
</body>
</html>