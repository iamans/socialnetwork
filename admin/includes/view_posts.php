<html>
<head>
<title>View Posts</title>
</head>
<body>


<!-- logiic to display details in tabular form  at admin form-->

<table align="center" width="83%" bgcolor="skyblue">


  <tr style="background:yellow">
     <th>S.No.</th>
	 <th>Title</th>
	 <th>Author</th>
	 <th>Date</th>
	 <th>Delete</th>
	 <th>Edit</th>
   </tr>

<?php

include("includes/connection.php");

$sel_posts = "select * from posts 	ORDER by 1 DESC";
$run_posts = mysqli_query($con,$sel_posts);

$i=0;
while($row_posts = mysqli_fetch_array($run_posts)){
	
	$posts_id    = $row_posts['posts_id'];
	$user_id     = $row_posts['user_id'];
	$post_title  = $row_posts['post_title'];
	$post_date   = $row_posts['post_date'];
	$i++;


    $sel_user = "select * from users where user_id='$user_id'";
	
    $run_user = mysqli_query($con,$sel_user);
	
	while($row_users=mysqli_fetch_array($run_user)){
		
    $user_name = $row_users['user_name'];
		

	?>

<tr align="center">

   <td><?php echo $i; ?></td>
   <td><?php echo $post_title;?></td>
   <td><?php echo $user_name;?></td>
   <td><?php echo $post_date;?></td>
   
   
  
  <td><a href="index.php?view_posts&delete=<?php echo $posts_id;?>">Delete</a></td>
  
  <td><a href="index.php?view_posts&edit=<?php echo $posts_id;?>">Edit</a></td>
  
</tr>
<?php } }  ?>

</table>


<!-- logic  to  edit post starts here-->

<?php

 if(isset($_GET['edit'])){
	 
	$edit_id = $_GET['edit']; 
	 
	$sel_posts = "select * from posts where posts_id='$edit_id'";
	
    $run_posts = mysqli_query($con,$sel_posts);
	$row_posts = mysqli_fetch_array($run_posts);
	
	$post_new_id  = $row_posts['posts_id'];
	$post_title   = $row_posts['post_title'];
	$post_content = $row_posts['post_content'];
	
	
	   
	 
?>  
   
  <center> <h2 style="padding:5px; border-radius:5px;">Update The Post</h2>
   <form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
   
     <input type="text" name="post_title" size="88" value="<?php echo $post_title;?>"/><br><br>
	 
	 <textarea cols="80" rows="4" name="post_content"><?php echo $post_content;?></textarea><br>
	 
	 <select name="topic_id">
	   <option value="0">Select Topic</option>
	   <?php getTopics(); ?>
	 </select>
	 
	 <input type="submit" name="update" value="Update Post" />
	 
	 </form>
	 <center>
	
<?php  } ?>

<!-- logic  to  edit post ends here-->

<!-- logic to update edit post-->
<?php
  
  if(isset($_POST['update'])){
	  
	  //storing old password into new varialble 
	  
	  $title   = $_POST['post_title'];
	  $content = $_POST['post_content'];
	  $topic   = $_POST['topic_id'];
	  
	 //updating new pass into old pass
	 
	 $update = "update posts set post_title='$title',post_content='$content',
	 topic_id='$topic' where posts_id='$post_new_id'";

    $run = mysqli_query($con,$update);
	
	if($run){
		
		echo "<script>alert('Post Has Been Updated')</scipt>";
		echo "<script>window.open('index.php?view_posts','_self')</script>";
	}
	
	
  }

//logic to delete posts

if(isset($_GET['delete'])){
	
	$delete_id = $_GET['delete'];
	
	$delete = "delete from posts where posts_id='$delete_id'";
	
	$run_del = mysqli_query($con,$delete);
	
	
	if($run_del)
	
	echo "<script>alert('Post Has Been Deleted!')</script>";
	echo "<script>window.open('index.php?view_posts','_self')</script>";
}

?>


</body>

</html>