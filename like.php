<?php

require_once("connect.php");

//echo $_REQUEST["id"];
$postID = $_REQUEST["postID"];
//echo $_REQUEST['user'];
$userid = $_REQUEST['user'];
$islike = "SELECT user_id FROM post_likes where user_id='$userid' AND post_id='$postID' ";
$q =  mysqli_query($con, $islike);
$array = mysqli_fetch_array($q);
if($array['user_id']==$userid){
	echo "Already liked";
}
else{
	$save = "INSERT INTO `post_likes`(`user_id`,`post_id`) VALUES('$userid','$postID')";
	$query = mysqli_query($con, $save);
	if($query == true){
		//echo $_REQUEST['page'];
		//$idd = $_REQUEST['id'];
		header("Location: Home.php?id=$userid");
	}
	else{
		echo " Not Inserted";
	}
}

/*$name = $_REQUEST["Name"];
$email = $_REQUEST["email"];
$pass = $_REQUEST["pwd"];

$body = $_POST['postbody'];
$user = $_POST['$_REQUEST["id"]'];

$Query = "INSERT INTO `posts` (`body` , `user_id`) VALUES ('$body','$user ')";
$runQuery = mysqli_query($con,$Query);

if($runQuery == true){
	echo " Done ";
}
else{
	echo " Not Yet";
}*/

?>