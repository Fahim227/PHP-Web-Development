
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Social Media</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="//cdn.materialdesignicons.com/3.7.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="style.css">
	
   
    <title>Practice</title>

</head>
<body>

<?php

require_once("connect.php");

$query = "SELECT * FROM posts";
$run = mysqli_query($con, $query);
$post="";
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : '';


$q = "SELECT * FROM post_share ";
$runq = mysqli_query($con, $q);
$sharepost = "";
?>


        <div class="col-md-offset-3 col-md-6 col-xs-12">
            <div class="well well-sm well-social-post">
        <form action="savePost.php?id=<?php echo $_REQUEST['id']; ?> && page = <?php echo "home"; ?>" method="POST">
            
            <textarea  name="postbody" class="form-control" placeholder="What's in your mind?"></textarea>
            <ul class='list-inline post-actions'>
                <input name="post" class='btn btn-primary btn-xs' id="post_button" type="submit" value="Post"  ><br/>
               
            </ul>
        </form>
            </div>
       
</div>  
<br/><br/>
<?php
while($q = mysqli_fetch_array($run)){
	
	$userid = $q['user_id'];
	$pid = $q['post_id'];
	$totalLikes = "SELECT * FROM `post_likes` where post_id= '$pid'";
    $likes = mysqli_query($con, $totalLikes);
	
	$count_likes = mysqli_num_rows($likes);
	$totalShares = "SELECT * FROM `post_share` where post_id= '$pid'";
    $shares = mysqli_query($con, $totalShares);
	
	$count_shares = mysqli_num_rows($shares);
	$qr = "SELECT * FROM users where user_id = '$userid' ";
	$ru = mysqli_query($con, $qr);	
	$r =  mysqli_fetch_array($ru);
	$userName = $r['name'];
	
						


?>
<div class="ml-4">
                      <h5 >
                         <?php echo $userName;?>
                          <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i><?php echo $q['date'];?></small>
                        </h5>
                        <p class="s">
                          <?php echo  $q['body'];?>
                        </p>
						
                        <form action='like.php?user=<?php echo $id;?> & postID=<?php echo $q['post_id'];?>' method='POST'>
						<span class="l">
	                      <input class="btn btn-outline-primary l" name='like' type='submit' value='Like'>
						  
						  </span>
						   <p><?php echo $count_likes; ?></p>
                        </form>
						
						
						
						
						<form action='share.php?user=<?php echo $id;?> & postID=<?php echo $q['post_id'];?>' method='POST'>
	                         <input class="btn btn-outline-info" name='share' type='submit' value='Share'> 
							 <p><?php echo $count_shares; ?></p>
							
                        </form>
						
                     </div></br>
<?php } ?>
<?php 
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

?>
<div class="ml-4">
                      <h5>
                         <?php echo $name;?>
                        </h5>
						<div class="share">
						    <h6>
							<?php echo $uname;?>
							<small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i><?php echo $postdate;?></small>
							</h6>
							<p class="s">
							  <?php echo  $postbody;?>
							</p>
							
						</div>
						
                        <form action='like.php?user=<?php echo $id;?> & postID=<?php echo $q['post_id'];?>' method='POST'>
	                      <input class="btn btn-outline-info" name='like' type='submit' value='Like'>
                        </form>
						
						
						<form action='share.php?user=<?php echo $id;?> & postID=<?php echo $q['post_id'];?>' method='POST'>
	                         <input class="btn btn-outline-info" name='share' type='submit' value='Share'> 
							
                        </form>
						
     </div></br>
<?php } ?>


			
</body>
</html>
