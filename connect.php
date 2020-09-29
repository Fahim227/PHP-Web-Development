<?php
    $hostName = "localhost";
	$userName = "root";
	$userPwd = "";
	$dbName = "project";
	
	$con = mysqli_connect($hostName,$userName,$userPwd,$dbName);
	
	if($con==false){
		echo "<h1>Error in database<h1/>";
	}
	/*else{
		echo "Connected";
	}*/