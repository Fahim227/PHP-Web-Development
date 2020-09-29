
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    <title>Practice</title>

</head>
<body>

<?php 

require_once("connect.php");

$query = "SELECT * FROM posts";
$run = mysqli_query($con, $query);
$post="";
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : '';
//echo $userid;
while($q = mysqli_fetch_array($run)){
	/*$userid = $_REQUEST['id'];
    $qu = "SELECT * FROM users where user_id = '$userid' ";
    $ru = mysqli_query($con, $qu);	
	//echo $ru['name'];
	$r = mysqli_fetch_array($ru);
	$userName = $r['name'];*/
	//$post .= $userName."</br>";
	$userid = $q['user_id'];
	$qr = "SELECT * FROM users where user_id = '$userid' ";
	$ru = mysqli_query($con, $qr);	
	$r =  mysqli_fetch_array($ru);
	$userName = $r['name'];
	$post .= $userName."</br>";
	$post .= $q['date']."</br></br>";
	$post .= $q['body']." <form action='like.php?user=$id&postID=".$q['post_id']."' method='POST'>
	    <input name='like' type='submit' value='Like'> 
							
    </form>
	<form action='share.php?user=$id&postID=".$q['post_id']."' method='POST'>
	    <input name='share' type='submit' value='Share'  > 
							
    </form>
	<hr/></br>";
						
	//$post .= $q['body']."<hr/></br>";
						
}
$q = "SELECT * FROM post_share ";
$runq = mysqli_query($con, $q);
$sharepost = "";
while($qu = mysqli_fetch_array($runq)){
	$user = $qu['user_id'];
	$quser = "SELECT name FROM `users` WHERE user_id = '$user'";
	$runquser = mysqli_query($con, $quser);
	$fetcharray = mysqli_fetch_array($runquser);
	//taking the user name from users;
	$name = $fetcharray['name'];
	$pid  = $qu['post_id'];
	//searching for post details 
	$pquery = "SELECT * FROM `posts` WHERE post_id = '$pid'";
	$runpquery = mysqli_query($con,$pquery);
	$fetchpquery = mysqli_fetch_array($runpquery);
	$postbody = $fetchpquery['body'] ;
	$postuserid = $fetchpquery['user_id'];
	$postdate = $fetchpquery['date'];
	//searching for user name that make the post
	$userquery = "SELECT name FROM `users` WHERE user_id = '$postuserid'";
	$runuserquery = mysqli_query($con, $userquery);
	$fetchrunuserquery = mysqli_fetch_array($runuserquery);
	$uname = $fetchrunuserquery['name'];
	
	$sharepost .= $name."</br>";
	$sharepost .= $uname."</br>";
	$sharepost .= $postdate."</br>";
	$sharepost .= $postbody."<hr/></br>";
}
	
 	

					

?>
<form action="savePost.php?id=<?php echo $_REQUEST['id']; ?> && page = <?php echo "home"; ?>" method="POST">
	<textarea name="postbody" placeholder="Whats on your mind?"></textarea>

	<input name="post" id="post_button" type="submit" value="post"  ><br/>
							
</form>

<div class"post">
<?php
echo $post;
echo $sharepost;

?>
</div>

			
</body>
</html>
