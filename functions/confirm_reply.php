<?php 
$con = mysqli_connect("localhost","root","","social_media");

session_start();
echo $post_id = $_GET['post_id'];
echo $user_id = $_GET['user_id'];
echo $user_com_name = $_GET['user_com_name'];

	if(isset($_POST['reply'])){   //if anyone have cliked on reply
		echo $comment = $_POST['comment'];
		if($comment!=null){
			$insert = "insert into comments(post_id,user_id,comment,comment_author)
			values('$post_id','$user_id','$comment','$user_com_name')";  //Now function is use to add the date
			$run = mysqli_query($con,$insert);
			$_POST['comment'] = "My nmnhd";
			header("Location: ../single.php?post_id=".$post_id);
			exit;
		} 
		else{
			header("Location: ../single.php?post_id=".$post_id);
			exit;
		}	
	} 
	else{
		header("Location: ../single.php?post_id=".$post_id);
		exit;
			
	}











?>