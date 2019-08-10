        
				<div id="content">
				   <img src="images/image.jpg" style="float:left; margin-left:40px;"/>
				</div>

				<div id="form2">
				    <form class="" action="index.php" method="post" style="float:right">
					<h2>Sign Up Today </h2>
					
				<table>
						<tr>
						  <td align="right"><strong>Name:</strong></td>
						   <td><input type="text" name="u_name" required="required" placeholder="enter your name"></td>
						 </tr>
						 
						<tr>
							<td align="right"><strong>Password:</strong></td>
						    <td><input type="text" name="u_pass" required="required" placeholder="enter your password"></td>
						</tr>
						
						<tr>
						    <td align="right"><strong>Email:</strong></td>
							<td><input type="text" name="u_email" required="required" placeholder="enter your email"></td>
						</tr>

						<tr>
						  <td align="right"><strong>Country:</strong></td>
							 <td>
								<select name="u_country">
									<option>Select Your Country</option>
									<option>India</option>
									<option>America</option>
									<option>China</option>
								</select>
							</td>
						</tr>
						
						<tr> 
						     <td align="right"><strong>Gender:</strong> </td>
							 <td>
							      <select name="u_gender">
								         <option>Select Your Gender</option>
										 <option>Male</option>
										 <option>Female</option>
								  </select>
							 
							 </td>
						</tr>


						<tr>
							<td align="right"><strong>Birthday</strong></td>
							<td><input type="date" name="u_birthday"></td>
						</tr>

						<tr>
							<td  colspan="6">
								<button  name="sign_up">Sign Up</button>
							</td>
					    </tr>

				</table>
			</form>
			<?php include("insert_user.php");  ?>
		</div>
		
		    
		
	</div>
