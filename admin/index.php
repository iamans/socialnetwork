<?php
session_start();
include("../functions/functions.php");

if($_SESSION['admin_email'] == null){
	
header("location:admin_login.php?msg=You don't have permission to access this page!");	
	
}
else{

?>

<!DOCTYPE html>

<html>
<head>
<title>Welcome To Admin Panel</title>
<link rel="stylesheet" href="admin_style.css" media="all" />
</head>

<body>
   <div class="container">
   
   <div id="content">
   <div id="head">

 <a href="index.php"><h2>Admin Panel</h2></a>

</div>
      <div id="sidebar">
	  <h2>Manage Content</h2>
	   
       <ul id="menu">
            <li><a href="index.php?view_users"><b>View Users<b></a></li><br>
			<li><a href="index.php?view_posts"><b>View Posts<b></a></li><br>
			<li><a href="index.php?view_comments"><b>View Comments<b></a></li><br>
			<li><a href="index.php?view_topics"><b>View Topics<b></a></li><br>
			<li><a href="index.php?add_topic"><b>Add New Topic<b></a></li><br>
			<li><a href="admin_logout.php"><b>Admin Logout<b></a></li><br>
			
        </ul>	   
	</div>

<div id="content">


    <h2 style="color:blue; text-align:center; padding:5px;">
	<?php echo @$_GET['welcome'];?> :Manage Your Content! </h2>
	
	
	
	<?php
	  
	  //variable to view users
	  
	 if(isset($_GET['view_users'])){
	include("includes/view_users.php");
	  }
	  
	  //variable to view posts
	  
	if(isset($_GET['view_posts'])){
	include("includes/view_posts.php");
	  }
	  
	  //variable to view comments
	    
	if(isset($_GET['view_comments'])){
	include("includes/view_comments.php");
	  }
	  
	  
	  
	//variable to view topics
	    
	if(isset($_GET['view_topics'])){
	include("includes/view_topics.php");
	  }
	  
	  
	    
	//variable to add topic
	    
	if(isset($_GET['add_topic'])){
	include("includes/add_topic.php");
	  }
	  
	  
	  
	?>
	
</div>

<div id="foot">
   <h5 style="color:blue; padding:10px; text-align:center;">
   Copyright 2020 By ansariboy.com
   </h5>


 </div>
</div>

</body>

</html>

<?php    }  ?>