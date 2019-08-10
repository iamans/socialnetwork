<?php

include("includes/connection.php");


// what happened if signup button press 

 if(isset($_POST['sign_up'])){
    	 
// mysql_real_escape_string to save from sql injection
		 
 $name = mysqli_real_escape_string($con,$_POST['u_name']);
 $pass = mysqli_real_escape_string($con,$_POST['u_pass']);
 $email = mysqli_real_escape_string($con,$_POST['u_email']);
 $country=mysqli_real_escape_string($con,$_POST['u_country']);
 $gender = mysqli_real_escape_string($con,$_POST['u_gender']);
 $birthday=mysqli_real_escape_string($con,$_POST['u_birthday']);
 $status = "unvarified";
 $posts = "no";
 
 //For random code generation  for email verification
 
 $ver_code = mt_rand();
 
 //password validation
 
   if(strlen($pass)<8){
	   
  echo "<script> alert ('password should be minimum 8 character!')</script>";
    exit();
   }
 
 //email validation
    $check_email= "select * from users where user_email = '$email'";
	$run_email = mysqli_query($con,$check_email);
	$check = mysqli_num_rows($run_email);
	
	if($check==1){
	echo "<script> alert('email already exists !')</script>";
    exit();
 
       }
	   // Now for reg_date  default value
	   
	 $insert = "insert into users(user_name,user_pass,user_email,user_country,user_gender,user_birthday,user_image,user_reg_date,status,ver_code,posts) 
	 values('$name','$pass','$email','$country','$gender','$birthday','default.png',Now(),'$status','$ver_code','$posts')";
	 

  $query = mysqli_query($con,$insert);
  if($query){
 
  echo "<h3 style='width:400px; text-align:justify;color:green;'> Hi,$name Congratulatin ,Registration is almost complete ,plese check your email for Final verification!</h3>";
      }
 else {
	 echo "Registration Failed,Try Again";
   }
	
 }

?>