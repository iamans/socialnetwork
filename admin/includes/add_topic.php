 
     <center> 
	 <h2 style="padding:5px;">Add New Topic</h2>
	 
     <form action="" method="post" id="f" class="ff">
   
     <input type="text" name="title"/><br>
	
	 <input type="submit" name="insert" value="Add New Topic" />
	 
	 </form>
	 <center>
	 
	 
	 <?php
	 
	 include("includes/connection.php");
	 
	 if(isset($_POST['insert'])){
		 
		 
		$title  = $_POST['title'];

        $insert	= "insert into topics (topic_name) values ('$title')";
		
		
		$run = mysqli_query($con,$insert);


       
	  if($run){
		  
		  
	echo "<script>alert('A New Topic Has Been Added!')</script>";
	echo "<script>window.open('index.php?view_topic','_self')</script>";
		  
		  
	  }		
		 
	 }
	 
	 
	 
	 ?>