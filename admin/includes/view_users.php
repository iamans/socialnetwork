<html>
<head>
<title>View Page</title>
</head>
<body>


<!-- logiic to display details in tabular form  at admin form-->

<table align="center" width="83%" bgcolor="skyblue">


  <tr style="background:yellow">
     <th>S.No.</th>
	 <th>Name</th>
	 <th>Country</th>
	 <th>Gender</th>
	 <th>Image</th>
	 <th>Delete</th>
	 <th>Edit</th>
   </tr>

<?php

include("includes/connection.php");

$sel_users = "select * from users 	ORDER by 1 DESC";
$run_users = mysqli_query($con,$sel_users);

$i=0;
while($row_users = mysqli_fetch_array($run_users)){
	
	$user_id       = $row_users['user_id'];
	$user_name     = $row_users['user_name'];
	$user_country  = $row_users['user_country'];
	$user_gender   = $row_users['user_gender'];
	$user_image    = $row_users['user_image'];
	$register_date = $row_users['user_reg_date'];
	$i++;

	?>

<tr align="center">

   <td><?php echo $i; ?></td>
   <td><?php echo $user_name ;?></td>
   <td><?php echo $user_country;?></td>
   <td><?php echo $user_gender;?></td>
   
   <td><img src="../users/<?php echo $user_image;?>" width='50' height='50' /></td>
  
  <td><a href="delete_user.php?delete=<?php echo $user_id;?>">Delete</a></td>
  
  <td><a href="index.php?view_users&edit=<?php echo $user_id;?>">Edit</a></td>
  
</tr>



<?php }  ?>


</table>


<!-- logic  to update data in admin panel-->

<?php

 if(isset($_GET['edit'])){
	 
	$edit_id = $_GET['edit']; 
	 
	$sel_users = "select * from users where user_id='$edit_id'";
	
    $run_users = mysqli_query($con,$sel_users);
	$row_users = mysqli_fetch_array($run_users);
	
	
	   $user_id       = $row_users['user_id'];
	   $user_name     = $row_users['user_name'];
	   $user_country  = $row_users['user_country'];
	   $user_gender   = $row_users['user_gender'];
	   $user_image    = $row_users['user_image'];
	   $register_date = $row_users['user_reg_date'];
	   $user_email    = $row_users['user_email'];
	   $user_pass     = $row_users['user_pass'];
	   
	 
?>  
    <center>	
	 <form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
	 
	 <table>
	 
	      <tr align="center">
		     <td colspan="6"><h2>Edit User:</h2></td>
		  </tr>
		  
		  
		  
		  
	     <tr>
		     <td align="right">Name:</td>
		     <td>
			  <input type="text" name="u_name" requird="requird"
			  value="<?php  echo $user_name;?>"/>
			 </td>
		  </tr>
		  
		  
		  
	     <tr>
		     <td align="right">Password:</td>
		     <td>
			  <input type="password" name="u_pass" requird="requird" 
			  value="<?php  echo $user_pass;?>"/>
			 </td>
		  </tr> 
		  
		  <tr>
		     <td align="right">Email:</td>
		     <td>
			  <input type="text" name="u_email" requird="requird" 
			  value="<?php  echo $user_email;?>"/>
			 </td>
		  </tr> 
		  
		  <tr>
		     <td align="right">Country:</td>
		     <td>
			 <select name="u_country">
			   <option value="<?php echo $user_country;?>"><?php echo $user_country;?></option>
			   <option value="India">India</option>
			   <option value="USA">USA</option>
			   <option value="Nepal">Nepal</option>
			   <option value="Bhutan">Bhutan</option>
			   <option value="Canada">Canada</option>
			 
			 </select>
			 </td>
		  </tr> 
		 
		 
		 
		  <tr>
		     <td align="right">Gender:</td>
		     <td>
			 <select name="u_gender">
			   <option value="<?php echo $user_gender;?>"><?php echo $user_gender;?></option>
			   <option value="Male">Male</option>
			   <option value="Female">Female</option>
			 </select>
			 </td>
		  </tr> 
		 
		  
		   
		  <tr>
		     <td align="right">Photo:</td>
		     <td>
			  <input type="file" name="u_image" required="required" value="Update" />
			 </td>
		  </tr> 
		  
		  
	 <tr align="center">
		  <td colspan="6">
		  <input type="submit" name="update" value="Update" />
		  </td>
		  </tr>  
	</table>
	</form>
	</center>
	
<?php  } ?>


<?php
  
  if(isset($_POST['update'])){
	  
	  //storing old password into new varialble 
	  
	  $u_name    = $_POST['u_name'];
	  $u_pass    = $_POST['u_pass'];
	  $u_email   = $_POST['u_email'];
	  $u_country = $_POST['u_country'];
	  $u_image   = $_FILES['u_image']['name'];
	  $image_tmp = $_FILES['u_image']['tmp_name'];
	
     move_uploaded_file($image_tmp,"../users/$u_image");
	 
	 //updating new pass into old pass
	 
	 $update = "update users set user_name='$u_name',user_pass='$u_pass'
	 ,user_email='$u_email',user_country='$u_country',user_image='$u_image'
	 where user_id='$edit_id'";

    $run = mysqli_query($con,$update);
	
	if($run){
		
		echo "<script>alert('User Has Been Updated')</scipt>";
		echo "<script>window.open('index.php?view_users','_self')</script>";
	}
	
	
  }

?>




</body>

</html>