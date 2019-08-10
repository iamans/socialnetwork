<!DOCTYPE html>
<?php
//session_start();
if($_SESSION['user_email'] == null ){
	header("location: index.php?msg=you don't have permission to access this page");
}
include("includes/connection.php"); 
//include("functions/functions.php");
?>

<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="styles/home_style.css" media="all" />
	</head>

	<body>
		<!--- container   -->
		<div class="container">
		
			
		<!-- header wrap ends here-->
			
			
     <!-- content area start here-->
	 <div class="content">

	   
		
	</div>
	
	<!-- user time line ends here-->
	
	<!--content timeline starts  -->
	
	<!--   logic to  display messages strats here    -->
	
	<div id="msg">
	
	 
	
	<?php 
	   if(isset($_GET['sent'])){
		   
		   
		   ?>
		   
		   <table width="700" >
		      <tr>
		          <th>Sender</th>
				  <th>Subject</th>
				  <th>Date</th>
				  <th>View Reply</th>
		       </tr>
			   
			   
		   
		   
		   <?php
		   $sel_msg   = "select * from messages where sender ='$user_id' ORDER by 1 DESC ";
		   $run_msg   = mysqli_query($con,$sel_msg);
		   $count_msg = mysqli_fetch_array($run_msg);
		   
		   
		   while($row_msg=mysqli_fetch_array($run_msg)){
			   
			   $msg_id       = $row_msg['msg_id'];
			   $msg_receiver = $row_msg['receiver'];
			   $msg_sender   = $row_msg['sender'];
			   $msg_sub      = $row_msg['msg_sub'];
		       $msg_topic	 = $row_msg['msg_topic'];
			   $msg_date 	 = $row_msg['msg_date'];
			   
			   
			  $get_receiver = "select * from users where user_id='$msg_receiver'";
              $run_receiver = mysqli_query($con,$get_receiver);
              $row		  = mysqli_fetch_array($run_receiver); 

			$receiver_name  = $row['user_name'];
			?>
			
			<tr align="center">
			
		<td>
			<a href="user_profile.php?u_id=<?php echo $msg_receiver;?>" target="blank">
			 <?php echo $receiver_name;?>
			 </a>
	    </td>
		
		<td>
			<a href="my_messages.php?sent&msg_id=<?php echo $msg_id;?>">
			 <?php echo $msg_sub;?>
			 </a>
	    </td>
			
		<td> <?php echo $msg_date;?></td>
		
		<td><a href="my_messages.php?sent&msg_id=<?php echo $msg_id;?>"> View Reply</a></td>
		
	</tr>  
			
			<?php
		   
	   } 
	   }
	
	 ?>
	 
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
             
  
   
        echo "<center><br/><hr>
		
		 <h2>$msg_subject</h2>
		 <p><b> Message: </b>$msg_topic</p>
		 <p><b> My Reply: </b>$reply_content</p>
		
		</center>
		"; 
		  }			
		

	 ?>
	   
	 
	 
	
	<!--   logic to  display messages ends here  
	
	 <div class="content">

	   
		
	</div>
	
    <!-- content timeline ends-->
	
	
	
			
	</div>
			
	<!-- content area ends here     -->	
			
			
	</div>
	<!-- container ends here-->

 
   </body>
  </html>