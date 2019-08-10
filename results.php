<!DOCTYPE html>
<?php
session_start();

include("includes/connection.php"); 
include("functions/functions.php");
?>

<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="styles/home_style.css" media="all" />
	</head>

	<body>
		<!--- container   -->
		<div class="container">
		
			   <!--- Head wrapper  -->
		<div id="head_wrap">

			    <!---  Header starts here  -->
				<div id="header">
                          <ul id="menu">
						     <li><a href="home.php">Home</a></li>
						     <li ><a href="members.php">Members</a></li>
							 <strong >Topic:</strong>
							 <?php
							    
								$get_topics = "select * from topics";
								
								$run_topics = mysqli_query($con,$get_topics);
									
									$topics = array();
									$topics_id = array();
									$i=0;
							while($row=mysqli_fetch_array($run_topics)){
								$topics[$i] = $row['topic_name'];
								$topics_id[$i] = $row['topic_id'];
								$i = $i+1;
								$topic_id = $row['topic_id'];
								$topic_title = $row['topic_name'];
								
								echo "<li><a href='topic.php?topic=$topic_id'>$topic_title</a></li>";
								}
								  
							 ?>
							 
						  
						  </ul>
						  
						  <form method="get" action="results.php" id="form1">
							<input type="text" name="user_query" placeholder="search a topic" />
							<input type="submit" name="search"  value="search" />

						  </form>
			   </div>
			   <!-- header ends here-->
		</div>
		<!-- header wrap ends here-->
			
			
     <!-- content area start here-->
	 <div class="content">

	    <!-- user time line starts-->
	    <div id="user_timeline"> 
		
		 <div id="user_details"> 
		      <?php
			  
			  //getting user data from databse 
			  
              $user     = $_SESSION['user_email'];
			  
			  $get_user = "select * from users where user_email='$user'";
			  $run_user = mysqli_query($con,$get_user);
			  $row      = mysqli_fetch_array($run_user);
			
			  $user_id        = $row['user_id'];
			  $user_name      = $row['user_name'];
			  $user_country   = $row['user_country'];
			  $user_image     = $row['user_image'];
			  $register_date  = $row['user_reg_date'];
			  $last_login     = $row['user_last_login'];
			  
		       //getting the number of posts
			   
	   		  $user_posts = "select * from posts where user_id='$user_id'";
			  $run_posts  = mysqli_query($con,$user_posts);
			  $posts      = mysqli_num_rows($run_posts);
			
			
			
		      //getting the number of unread mesages
			  
			  $sel_msg = "select * from messages where receiver='$user_id'AND
			  status   = 'unread' ORDER by 1 DESC";
			  $run_msg = mysqli_query($con,$sel_msg);
			  
			  $count_msg = mysqli_num_rows($run_msg);
			
			echo "
			     <center>
				 <img src = 'users/$user_image' width='200' height='200' />
				 </center>
				 <div id='user_mention'>
				 
				 <p><strong>Name:</strong>$user_name</p>
				 <p><strong>Country:</strong>$user_country</p>
				 <p><strong>Last Login:</strong>$last_login </p>
				 <p><strong>Member Since:</strong>$register_date</p>
				 
				 <p><a href='my_messages.php?inbox&u_id=$user_id'>Message($count_msg)
				 </a></p>
				 
				 <p><a href='my_posts.php?u_id=$user_id'>Posts($posts)</a></p>
				 
				 <p><a href='edit_profile.php?u_id=$user_id'>Edit Account</a></p>
				 
				 <p><a href='logout.php'>Logout</a></p>
				 
				 </div>
			
			
			";
			
			?>
				
		</div>
		
	</div>
	
	<!-- user time line ends here-->
	
	<!--content timeline starts  -->
	
	<div id="content_timeline">
	  
	   
	   
	   <h3> See Your Results Here: </h3>
	   
	  <?php results(); ?>   
	   
	</div>
	

	<!-- content timeline ends-->
	
	
	
			
	</div>
			
	<!-- content area ends here     -->	
			
			
	</div>
	<!-- container ends here-->


	</body>
</html>