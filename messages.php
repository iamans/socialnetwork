<!DOCTYPE html>
<?php
session_start();
if($_SESSION['user_email'] == null ){
	header("location: index.php?msg=you don't have permission to access this page");
}
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
				 
				 <p><a href='my_message.php?inbox&u_id=$user_id'>Message($count_msg)
				 </a></p>
				 
				 <p><a href='my_posts.php?u_id=$user_id'>My Posts($posts)</a></p>
				 
				 <p><a href='edit_profile.php?u_id=$user_id'>Edit Account</a></p>
				 
				 <p><a href='logout.php'>Logout</a></p>
				 
				 </div>
			
			
			";
			
			?>
				
		</div>
		
	</div>
	
	<!-- user time line ends here-->
	
	<!--content timeline starts  -->
	
	<!--send message logic starts here-->
	
	<div id="message">
	
	<?php
	 
	 if(isset($_GET['u_id'])){
		 
		 $u_id = $_GET['u_id'];  //those id to whom we gonna send message
		 
		 $sel = "select * from users where user_id='$u_id'";
		 $run = mysqli_query($con,$sel);
         $row = mysqli_fetch_array($run);

		 $user_name = $row['user_name'];
		 $user_image = $row['user_image'];
		 $reg_date = $row['user_reg_date'];
        		 
	     }
	 
	  ?>
	  
	  <h2>Send a message to <span style='color:white;'><?php echo $user_name; ?></span></h2>
	  
	  <form action="messages.php?u_id=<?php echo $u_id; ?>" method="post" id="f">
	 
	 <input type="text"  name="msg_title" placeholder="Message Subject" size="56" /><br>
	  
	  <textarea name="msg" cols="60" rows="5" placeholder="Write Your Message Here...."/></textarea><br/>
	  
	  <input type="submit" name="message" value="Send Message" />
	  
	  </form><br/>
	  
	  <img style="border:2px solid orange; border-radius:5px;" src='users/<?php echo $user_image ;?>' width="50" height="50" />
	  
	  <p><strong><?php echo $user_name; ?></strong> is memeber of this <b>Since<b>: <?php echo $reg_date ;?></p>
	  
	  
	   
	   
	  <!--send message logic ends here-->
	  
	</div>
<!-- content timeline ends-->
	
	
	  <?php
	       
		   if(isset($_POST['message'])){
			   
			  $msg_title = @$_POST['msg_title'];
			   $msg = $_POST['msg'];
			   
		   
		  
		  $insert = "insert into messages
		  (sender,receiver,msg_sub,msg_topic,reply,status)
		   values ('$user_id','$u_id','$msg_title','$msg','no_reply','unread')"; 
		   
		   $run_insert = mysqli_query($con,$insert);
		   
		   if($run_insert){
			   
		 echo "<center><h2>Message was sent to ".$user_name ." successfully</h2></center>";
			   
		   }
		    else {
				
				echo "<center><h2>Message was not sent to  ".$user_name ." !</h2></center>";
			}
		}
	
	
	  ?>
	
	<!--send message logic ends here-->
	
			
	</div>
<!-- content area ends here     -->	
			
			
	</div>
	<!-- container ends here-->


	</body>
</html>