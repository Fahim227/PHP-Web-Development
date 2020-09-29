<?php

require_once("connect.php");

$name = $_POST["Name"];
//$email = $_REQUEST["email"];
$pass = $_POST["pwd"];

$query = "SELECT * FROM users where name = '$name' and password = '$pass' " or die("Can not find ID");

$runquery = mysqli_query($con, $query);
$row = mysqli_fetch_array($runquery);

if($row['name'] == $name && $row['password'] == $pass){
	$user_id = $row['user_id'];
	echo "Login Succeess";
	header("Location: profile.php?id=$user_id");
}
else{
	echo "<h1>Lpgin Error <h1/>";
}


/*$Query = "INSERT INTO `users` (`name` , `email` ,`password`) VALUES ('$name','$email','$pass')";
$runQuery = mysqli_query($con,$Query);*/



/*if($runQuery == true){
	echo "Inserted";
	header("Location: index.php");
}*/

?>