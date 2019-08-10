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
		
		
		<!-- left portion i.e user details                  -->
		
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
	
	<div id="content_timeline">
	  
	  <?php
	    
       	 if(isset($_GET['post_id'])){

            $get_id   = $_GET['post_id'];
			
			$get_post = "select * from posts where posts_id='$get_id'"; 
			$run_post = mysqli_query($con,$get_post);
			$row      = mysqli_fetch_array($run_post);
			
			$post_title = $row['post_title'];
			$post_con   = $row['post_content'];
			
		 }			 
	   
	   ?>
	   
	  <form action="" method="post" id="f">
	     <h2>Edit Your Post</h2>
		 
		 <input type="text" name="title" value="<?php echo $post_title ?>"
		 size="82" required="required" /> <br>

	    <textarea cols="83" rows="4" name="content"> <?php echo $post_con ?>
		</textarea><br>

        <select id="topic">
		    <option>Select Topic</option>
			  <?php 
			  $i = 0;
				foreach ($_SESSION['topic_titles'] as $topic) {
					?>
					<option value="<?php echo $_SESSION['topic_ids'][$i] ; $i= $i+1;?>"><?php echo $topic; ?></option><br>
					<?php
				}


			  ?> 
			  
		    
          </select>	

              <input type="submit" name="update" value="Update Post" />		  
			</form>   
		



    <?php
     if(isset($_POST['update'])){
		 
		 $title    = $_POST['title'];
		 $content  = $_POST['content'];
	     $topic    = @$_POST['topic'];    //using '@' bcoz repeating on this page two times
		 
		 
		 $update_post = "update posts set post_title='$title',post_content='$content',
		 topic_id='$topic' where posts_id='$get_id'";
		 
		 $run_update  = mysqli_query($con,$update_post);
		 
		 if($run_update){
			 
			 echo "<script>alert('Post has been Updated!')</script>";
			 echo "<script>window.open('home.php','_self')</script>";
			 
		 }
		 
		 
	 }

    ?>	
	  
	  
	   
	   
	</div>

	<!-- content timeline ends-->
	
	
	
			
	</div>
			
	<!-- content area ends here     -->	
			
			
	</div>
	<!-- container ends here-->


	</body>
</html>