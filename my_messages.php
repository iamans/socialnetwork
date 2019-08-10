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
				 
				 <p><a href='my_messages.php?inbox&u_id=$user_id'> My Message($count_msg)
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
	
	<!--   logic to  display messages strats here    -->
	
	<div id="msg">
	
	 <p align="center">
	    <a href="my_messages.php?inbox">My Inbox</a> || 
		<a href="my_messages.php?sent">Sent Items</a>
	</P>
	
	<?php 
	   if(isset($_GET['sent'])){
		   
		   include("sent.php");
		   
	   }
	
	 ?>
	 
	 <?php  
		if(isset($_GET['inbox']))
		{ 
		 ?>
	 
	 
		   <table width="700" id="ta" >
		      <tr>
		          <th>Sender</th>
				  <th>Subject</th>
				  <th>Date</th>
				  <th>Reply</th>
		       </tr>
		 
		 
		 <?php
		 
		   $sel_msg = "select * from messages where receiver = '$user_id' ORDER by 1 DESC ";
		   $run_msg = mysqli_query($con,$sel_msg);
		   $count_msg = mysqli_fetch_array($run_msg);
		   
		   while($row_msg=mysqli_fetch_array($run_msg)){
			   
			   $msg_id       = $row_msg['msg_id'];
			   $msg_receiver = $row_msg['receiver'];
			   $msg_sender   = $row_msg['sender'];
			   $msg_sub      = $row_msg['msg_sub'];
		       $msg_topic	 = $row_msg['msg_topic'];
			   $msg_date 	 = $row_msg['msg_date'];
			   
			   
			  $get_sender = "select * from users where user_id='$msg_sender'";
              $run_sender = mysqli_query($con,$get_sender);
              $row		  = mysqli_fetch_array($run_sender); 

			$sender_name  = $row['user_name'];
			
			  ?>
			  
			  
	<tr align="center">
			
		<td>
			<a href="user_profile.php?u_id=<?php echo $msg_sender;?>" target="blank">
			 <?php echo $sender_name;?>
			 </a>
	    </td>
		
		<td>
			<a href="my_messages.php?inbox&msg_id=<?php echo $msg_id;?>" target="blank">
			 <?php echo $msg_sub;?>
			 </a>
	    </td>
			
		<td> <?php echo $msg_date;?></td>
		
		<td><a href="my_messages.php?inbox&msg_id=<?php echo $msg_id;?>">Reply</a></td>
		
	</tr>  

			
		   <?php   }?>	
		   
	</table>
	  
	  <!-- to display message by clicking on message subject               -->
	<?php   
	    if(isset($_GET['msg_id'])){
         
		  $get_id = $_GET['msg_id'];
		  
		  $sel_message = "select * from messages where msg_id='$get_id'";
		  $run_message = mysqli_query($con,$sel_message);

          $row_message = mysqli_fetch_array($run_message);
		  
		  $msg_subject   = $row_message['msg_sub'];
		  $msg_topic     = $row_message['msg_topic'];
		  $reply_content = $row_message['reply'];
             
//updating the unread message to read

   $update_unread = "update messages set status='read' where msg_id='$get_id'";
   $run_unread    = mysqli_query($con,$update_unread);
   
   
        echo "<center><br/><hr>
		
		 <h2>$msg_subject</h2>
		 <p><b> Message: </b>$msg_topic</p>
		 <p><b> My Reply: </b>$reply_content</p>
		 
		<form action='' method='post'>
		   <textarea cols='30' rows='5' name='reply'></textarea><br/>
		   <input type='submit' name='msg_reply' value='Reply to this' />
		 </form>
		</center>
		"; 
		  }			
		
        if(isset($_POST['msg_reply'])){
			
			$user_reply = $_POST['reply'];
			
			if($reply_content!='no_reply'){
				
			echo "<h2 align='center'>This message was already replied</h2>";
            exit();			
				
			}
			else {
				$update_msg = "update messages set reply='$user_reply' where msg_id='$get_id' AND reply='no_reply'";
				
				$run_update = mysqli_query($con,$update_msg);
				
				
				echo "<h2 align='center'>Message was Replied!</h2>";
			}
			  }
			}
		
	 ?>
	   
	 
	 
	
	<!--   logic to  display messages ends here  
	
	 
	
<!-- content timeline ends-->
	
	
	
			
	</div>
			
	<!-- content area ends here     -->	
			
			
	</div>
	<!-- container ends here-->


</body>
</html>