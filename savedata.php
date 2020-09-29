<?php

require_once("connect.php");


$name = $_REQUEST["Name"];
$email = $_REQUEST["email"];
$pass = $_REQUEST["pwd"];

/*$body = $_POST['postbody'];
$user = $_POST['$_REQUEST["id"]'];

$Query = "INSERT INTO `posts` (`body` , `user_id`) VALUES ('$body','$user ')";
$runQuery = mysqli_query($con,$Query);
if($runQuery == true){
	echo " Done ";
}
else{
	echo " Not Yet";
}*/



$Query = "INSERT INTO `users` (`name` , `email` ,`password`) VALUES ('$name','$email','$pass')";
$runQuery = mysqli_query($con,$Query);

if($runQuery == true){
	echo "Inserted";
	header("Location: index.php");
}

?>