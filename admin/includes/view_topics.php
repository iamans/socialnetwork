<html>
<head>
<title>View Topics</title>
</head>
<body>


<!-- logiic to display details in tabular form  at admin form-->

<table align="center" width="83%" bgcolor="skyblue">


  <tr style="background:yellow">
     <th>S.No.</th>
	 <th>Topic Name</th>
	 <th>Delete</th>
	 <th>Edit</th>
 </tr>

<?php

include("includes/connection.php");

$sel_topic = "select * from topics ORDER by 1 DESC";

$run_topic = mysqli_query($con,$sel_topic);

$i=0;
while($row_topic = mysqli_fetch_array($run_topic)){
	
	$id    = $row_topic['topic_id'];
	$name  = $row_topic['topic_name'];
	$i++;


?>

<tr align="center">

   <td><?php echo $i;?></td>
   <td><?php echo $name;?></td>
   
  <td><a href="index.php?view_topics&delete=<?php echo $id;?>">Delete</a></td>
  <td><a href="index.php?view_topics&edit=<?php echo $id;?>">Edit</a></td>
  
  
</tr>
<?php }   ?>

</table>




<!-- logic  to  edit post starts here-->

<?php

 if(isset($_GET['edit'])){
	 
	$edit_id = $_GET['edit']; 
	 
	$sel = "select * from topics where topic_id='$edit_id'";
	
    $run = mysqli_query($con,$sel);
	$row = mysqli_fetch_array($run);
	
	$id      = $row['topic_id'];
	$title   = $row['topic_name'];
 }
	
?>  
  
 <?php
  if(isset($_GET['edit']))
	  { 
  ?>
	 
     <center> <h2 style="padding:5px; border-radius:5px;">Update Topic</h2>
	 
     <form action="" method="post" id="f" class="ff" >
   
     <input type="text" name="title"  value="<?php echo $title;?>"/><br><br>
	
	 <input type="submit" name="update" value="Update Post" />
	 
	 </form>
	 <center>
	 
   <?php 

   } 
   ?>



<?php 
  if(isset($_POST['update']))
	  {
		
		  //method is post and update is button name

	  $new_title = $_POST['title'];
	  	 
	  $update   = "update topics set topic_name='$new_title' where topic_id='$id'";
	  
      $run_update = mysqli_query($con,$update);
	  
	  if($run_update){
		  
		  
	echo "<script>alert('Topic Has Been Updated!')</script>";
	echo "<script>window.open('index.php?view_topics','_self')</script>";
		  
		  
	  }
  
  }


//logic to delete comments

if(isset($_GET['delete'])){
	
	$delete_id = $_GET['delete'];
	
	$delete = "delete from topics where topic_id='$delete_id'";
	
	$run_del = mysqli_query($con,$delete);
	
	
	if($run_del){
	
	echo "<script>alert('Topic Has Been Deleted!')</script>";
	echo "<script>window.open('index.php?view_topics','_self')</script>";
	}
  }
?>

</body>
</html>