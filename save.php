<?php
	 require_once("connect.php");		    
	  if(isset($_POST['post'])){
		$postbody = $_POST['postbody'];	
		//$user = Login::isLoggedIn();
		
		$sql = "INSERT INTO `posts` (`id`, `body`, `date`, `user_id`, `likes`) VALUES ('','$postbody','','1',0)";
		$query = mysqli_query($con , $sql);	
        if($query==true){
			header("location: profile.php");
		}
        else{
			echo "Not inserted";
		}		
    	
	}
					
?>