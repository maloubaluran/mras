<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("iit_graduates",$conn);

	$sql = "SELECT * FROM image";
	$results = mysql_query($sql,$conn);
	if($results!=""){
		while($row = mysql_fetch_array($results)){
			echo "<img src=/".$row['image'].">";
		}
	}
	mysql_close($conn);
?>
