<html>
<head>
<title>View Comments</title>
</head>
<body>


<!-- logiic to display details in tabular form  at admin form-->

<table align="center" width="83%" bgcolor="skyblue">


  <tr style="background:yellow">
     <th>S.No.</th>
	 <th>Comments</th>
	 <th>Author</th>
	 <th>Date</th>
	 <th>Delete</th>
 </tr>

<?php

include("includes/connection.php");

$sel_com = "select * from comments ORDER by 1 DESC";

$run_com = mysqli_query($con,$sel_com);

$i=0;
while($row_com = mysqli_fetch_array($run_com)){
	
	$com_id    = $row_com['com_id'];
	$user_id   = $row_com['user_id'];
	$com       = $row_com['comment'];
	$date      = $row_com['date'];
	$author    = $row_com['comment_author'];
	$i++;


	?>

<tr align="center">

   <td><?php echo $i; ?></td>
   <td><?php echo $com;?></td>
   <td><?php echo $author;?></td>
   <td><?php echo $date;?></td>
   
  <td><a href="index.php?view_comments&delete=<?php echo $com_id;?>">Delete</a></td>
  
  
</tr>
<?php }   ?>

</table>


   <?php
   
//logic to delete comments

if(isset($_GET['delete'])){
	
	$delete_id = $_GET['delete'];
	
	$delete = "delete from comments where com_id='$delete_id'";
	
	$run_del = mysqli_query($con,$delete);
	
	
	if($run_del)
	
	echo "<script>alert('Comment Has Been Deleted!')</script>";
	echo "<script>window.open('index.php?view_comments','_self')</script>";
}

?>


</body>

</html>