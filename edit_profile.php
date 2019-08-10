
<?php
session_start();
include("includes/connection.php"); 
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Welcome User!</title>
		<link rel="stylesheet" href="styles/home_style.css" media="all" />
       <style>
         input[type='file']{width:180px;}
      </style>	   
	</head>

	<body>
		<!--- container   -->
		<div class="container" style="background: #fff">
		
			   <!--- Header wrapper Starts  -->
		<div id="head_wrap" style="background: #174A61">

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
	 <div class="content" >

	    <!-- user time line starts-->
	    <div id="user_timeline"> 
		
		 <div id="user_details"> 
		      <?php
			  
			  
			  //logic to fetch the data from database
			  
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
			  $user_gender = $row['user_gender'];
			  $user_email = $row['user_email'];
			  $user_pass = $row['user_pass'];
			  
			  
			  
			  
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
	
	<div>
	  
	   <form action=""  id="f" class="ff" method="post" enctype="multipart/form-data">
	    
		<table>
		<tr align="center">
		   <td colspan="6"><h2>Edit Profile</h2></td>
		 </tr>
		
	       <tr>	
		      <td align="right">Name</td>
			  <td>
			    <input type="text" name="u_name" required="required" 
				value="<?php echo $user_name;  ?>" />
				
			  </td>
		   </tr>
		   
		   
		   
	       <tr>	
		      <td align="right">Password</td>
			  <td>
			    <input type="password" name="u_pass" required="required" 
				value="<?php echo $user_pass;  ?>" />
				
			  </td>
		   </tr>
		    
		   
	       <tr>	
		      <td align="right">Email</td>
			  <td>
			    <input type="email" name="u_email" required="required" 
				value="<?php echo $user_email;  ?>">
				
			  </td>
		   </tr>
		   
		   
	       <tr>	
		      <td align="right">Country</td>
			  <td>
			    <select  name="u_country" disabled="disabled"> 
				   <option><?php echo $user_country; ?></option>
				   <option>India</option>
				   <option>Russia</option>
				   <option>America</option>
				   <option>Australia</option>
				   <option>Canada</option>
				
				</select>
			  </td>
		   </tr>
		   
		   
		   
		   
		   <tr>	
		      <td align="right">Gender</td>
			  <td>
			    <select  name="u_gender" disabled="disabled"> 
				   <option><?php echo $user_gender; ?></option>
				   <option>Male</option>
				   <option>Female</option>
				 </select>
			  </td>
		   </tr>
		   
		   
		   
		    <tr>	
		      <td align="right">Photo</td>
			  <td>
			    <input type="file" name="u_image" required="required"  />
				
			  </td>
		   </tr>
		   
		   
		   
		    <tr align="center">	
		       <td colspan="6">
			    <input type="submit" name="update" value="Update" />
				
			  </td>
		   </tr>
		   
		   		
	</table>   
 </form>
	   
	   
	   
<?php

 // logic to update data into database 
 
 if(isset($_POST['update'])){
  
    $u_name = $_POST['u_name'];
	$u_pass = $_POST['u_pass'];
	$u_email = $_POST['u_email'];
	$u_image = $_FILES['u_image']['name'];
	$image_tmp = $_FILES['u_image']['tmp_name'];
	
	move_uploaded_file($image_tmp,"users/$u_image");
	
	$update = "update users set user_name='$u_name', user_pass='$u_pass', user_email='$u_email', user_image='$u_image' where user_id='$user_id' ";
	
   $run = mysqli_query($con,$update);
   
    if($run){
		
		echo "<script>alert('Your Profile Updated!')</script>";
		echo "<script>window.open('home.php','_self')</script>";
		
	}
   
 }
 
 //edit profile logic ends here
 
?>	
	   
	
	   
	</div>
	
	<!-- content timeline ends-->
	
	
	
			
	</div>
			
	<!-- content area ends here     -->	
			
			
	</div>
	<!-- container ends here-->


	</body>
</html>