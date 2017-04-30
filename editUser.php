<?php require "movie_db.inc";
include 'init.php';

if(!$_SESSION["admin"] == 'y'){
	header("location:index.php");
}
StartHTML( "Movie Database" );
	
	HTMLHeader();

	HTMLNav();



	$var_value = $_GET['user_id'];
				
				$SQLFilm = "select username, first_name, last_name, password, email,admin from users where user_id = $var_value;";
	
				$result = $Connection->query($SQLFilm);
	

if ($result->num_rows > 0) {
    			// output data of each row
    			while($row = $result->fetch_assoc()) {
    				$username = $row["username"];
    				$first_name = $row["first_name"];
    				$last_name = $row["last_name"];
    				$password = $row["password"];
    				$email = $row["email"];
				$admin = $row["admin"];
    				
    				
    			}
				} else {
    			echo "0 results";
				}
				$Connection->close();
				
				?>
				
			<div class="body">				
			<h2 class="Username"><?php echo $username; ?> </h2>
			
			
				
				
			
			<ul>
				<li><strong>first name: <?php echo $first_name; ?></strong></li>
				<li><strong>last name: <?php echo $last_name; ?></strong></li>
				<li><strong>password: <?php echo $password; ?></strong></li>
				<li><strong>email: <?php echo $email; ?></strong></li>
				<li><strong>admin: <?php echo $admin; ?></strong></li>
			</ul>
			
			
			
 <button id="myBtn" style="float: left";>Edit User</button><br><br>
			
			<div id="myModal" class="modal">

		  	<!-- Edit Modal content -->
			<div class="modal-content">
		  	<div class="modal-header">
		    	<span class="close" style="cursor:pointer">&times;</span>
		    	<h2>Edit User</h2>
		  	</div>
		  	<div class="modal-body">			

		
			<form method="POST" action="editUserinfo.php?user_id=<?php echo $user_id ?>">
								
			<td>FirstName</td><br><td> <input type="text" name="first_name" value= "<?php echo htmlspecialchars($first_name); ?>"></td>
			</tr><br><br>
			<tr>
			<td>LastName</td><br><td> <input type="text" name="last_name" value= "<?php echo htmlspecialchars($last_name); ?>"></td>
			</tr><br><br>
			<tr>
			<td>Email</td><br><td> <input type="text" name="email" value= "<?php echo htmlspecialchars($email); ?>"></td>
			</tr><br><br>
			<tr>
			<td>UserName</td><br><td> <input type="text" name="username" value= "<?php echo htmlspecialchars($username); ?>"></td>
			</tr><br><br>
			<tr>
			<td>Password</td><br><td> <input type="password" name="password" value= "<?php echo htmlspecialchars($password); ?>"></td>
			</tr><br><br>
			<tr>
			<td>Admin</td><br><td><input type="checkbox" name="admin" value="y"></td></tr><tr>
			
			<tr>

			
			<td><input id="button" type="submit" name="submit" value="Update"></td>
			</tr><br><br>
			</form>
  	</div>
	</div>
	</div>
</div>
	

	<!-- javascript for the "add movie" modal -->
	 <script>
	 var modal = document.getElementById('myModal');

	 // Get the button that opens the modal
	 var btn = document.getElementById("myBtn");

	 // Get the <span> element that closes the modal
	 var span = document.getElementsByClassName("close")[0];

	 // When the user clicks on the button, open the modal
	 btn.onclick = function() {
    	 	modal.style.display = "block";
	 }

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
   		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
    		if (event.target == modal) {
       			modal.style.display = "none";
    		}
	}
	</script>
		
			<?php	
				HTMLFooter(); ?>
