<!DOCTYPE html>
<html>
	<head>
		<title>Profile | Linking</title>
	</head>

	<style type="text/css">
		
		#gray_bar{
			height: 50px;
			background-color: rgb(48,57,58);
			color: rgb(241,241,241);
		}

		#search_box{
			width: 400px;
			height:  20px;
			border-radius: 4px;
			border: none;
			padding: 4px;
			font-size: 14px;
			background-image: url(search.png);
			background-repeat: no-repeat; 
			background-position: right;

		}

		#profile_pic{

			width: 150px;
			margin-top: -200px;
			border-radius: 50%;
			border: solid 2px gray;
			
		}

		#menu_button{
			
			width: 100px;	
			display: inline-block;
			margin: 2px;

		}
		#post_button{

			float: right;
			background-color: #405d9b;
			border: none;
			color: #ddd;
			padding: 4px;
			font-size: 14px;
			border-radius: 4px;
			width: 54px;  	 
		}

		#friends_img{
			width: 40px;
			float: left;
			margin: 8px;
			border-radius: 50%;
			border: solid 2px gray;
			
		}

		#friends_bar{
			background-color: rgb(25,25,25);
			height: 400px;
			margin-top: 20px;
			
			padding: 8px;


		}

		#friends{

			clear: both;
			color: #405d9b;

		}


		#signout_button{
			background-color: #405d9b;
			font-size: 15px;
			width: 60px;
			text-align: center;
			padding: 4px;
			border-radius: 4px;
			margin: 10px;
			margin-top: 12px;
			float: right;
			background-position: right;

		}


		textarea{
			padding: 4px;
			background-color: rgb(25,25,25);
			width: 99%;
			height: 90px;
			border: none;
			font-family: tahoma;
			font-size: 14px;
			color: rgb(241,241,241);;

		}

		
	</style>

	<body style="font-family: tahoma; background-color:rgb(36,36,36);" >
		<!--GEAY BAR OF TOP-->
		<div id="gray_bar">
			<div style=" width: 800px; margin:auto; font-size: 30px;">
			
				Linking &nbsp &nbsp <input type=" text" id="search_box" placeholder="Search whom you know">
				<img src="self2bw.jpg" style="width: 50px ;float: right; border-radius: 60% ; border: solid 2px gray;">	
				<div id="signout_button">Signout</div> 	
			</div>
			
			

		</div>

		<!--Cover Area-->
		<div style=" width: 800px; margin: auto; ; min-height: 400px " >

			<div style="background-color: rgb(25,25,25); text-align: center; color: #405d9b">
				
				<img src="galaxy4.jpg" style="width: 100%;">
				<img id="profile_pic" src="self2bw.jpg" >
				<br/>
					
					<div style="font-size: 20px">Pollock</div>

				<br/>


				<div id="menu_button" > <a href="Home.php?id=<?php echo $_REQUEST['id']; ?>"> Home</a></div>
				<div id="menu_button">About</div>
				<div id="menu_button">Requests</div>
				<div id="menu_button">Friends</div>
				<div id="menu_button">Notifications</div>
				<div id="menu_button">Chat</div>
				
				    
			</div>

			<!--Below Cover Area-->
			<div style="display: flex; color: rgb(241,241,241);">
				

				<!--Friend Area-->
				<div style=" min-height: 400px; flex: 1; ">
					
					<div id="friends_bar">				
						Friends<br/>
			

						<div id="friends">
							<img id="friends_img" src="Albert Einstein1.jpg"><br>
							Albert Einstein
						</div>

						<div id="friends">
							<img id="friends_img" src="Fman.jpg"><br>
							Richard Feynman
						</div>			
				
						<div id="friends">
							<img id="friends_img" src="Stephen Hawking.jpg"><br>
							Stephen Hawking
						</div>
					
				
					</div>
					
				</div>
				<?php 

					require_once("connect.php");
                    $userid = $_REQUEST['id'];
					$query = "SELECT * FROM posts where user_id = '$userid'";
					$run = mysqli_query($con, $query);
					$post="";
					while($q = mysqli_fetch_array($run)){
						
						$qu = "SELECT * FROM users where user_id = '$userid' ";
						$ru = mysqli_query($con, $qu);	
					
						$r = mysqli_fetch_array($ru);
						$userName = $r['name'];
						$post .= $userName."</br>";
						$post .= $q['date']."</br></br>";
						$post .= $q['body']."<hr/></br>";
						
											
					}
										

				?>
				<div style=" min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">
					
					<div style=" border: solid thin #aaa  padding: 10px; background-color: rgb(25,25,25);">
						
						<form action="savePost.php?id=<?php echo $_REQUEST['id']; ?> && from=profile" method="POST">
	                       <textarea name="postbody" placeholder="Whats on your mind?"></textarea>

	                       <input name="post" id="post_button" type="submit" value="post"  ><br/>
							
                        </form>
						

					</div>
					<?php
					echo $post;
					
					
					?>
					



				</div>
			</div>
			

		</div>

	</body>
</html>