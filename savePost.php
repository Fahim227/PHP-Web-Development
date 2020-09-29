<?php

require_once("connect.php");

//echo $_REQUEST["id"];
$body = $_REQUEST["postbody"];
$userid = $_REQUEST["id"];
$from = $_REQUEST['from'];
$save = "INSERT INTO `posts`(`body`,`user_id`) VALUES('$body','$userid')";
$query = mysqli_query($con, $save);
if($query == true){
	//echo $_REQUEST['page'];
	$idd = $_REQUEST['id'];
	
	//echo $_REQUEST['from'];
	if($from == profile){
		header("Location: profile.php?id=$idd");
	}
	else{
		header("Location: Home.php?id=$idd");
	}
	
}
else{
	echo " Not Inserted";
}

?>