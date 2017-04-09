<?php require "movie_db.inc";
session_start();
	StartHTML( "Movie Database" );
	
	HTMLHeader();
	
	HTMLNav();
	
	?>
			
			
			
			<?php
				$Server = "willy";
				$UserName = "comp305_grp2";
				$Password = "Scrumbags1!";
				$Database = "comp305_grp2";
				
				// create connection
				$Connection = new mysqli( $Server, $UserName, $Password, $Database);
				// check connection
				if ( $Connection->connect_error )
				{
					// stop the script and echo an error message
						echo "<h2>Database Error</h2>\n";
						die( "MySQLi Connection Error: ".$Connection->connect_error."\n" );
				}
				//echo "Connection Successful";
				
				
				
?>
			<div class="body">				
			<h2 class="movie-title"><?php echo $film_name; ?> </h2>
			
			
				
				
		      <form class="form-signin" method="POST">
			<h2 class="form-signin-heading">Please Register</h2>
			<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1">@</span>
			  <input type="text" name="username" class="form-control" placeholder="Username" required>
			</div>
		
			<label for="inputPassword" class="sr-only">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
			<a class="btn btn-lg btn-primary btn-block" href="login.php">Login</a>
		      </form>

			</div>
			<?php
			
			if (isset($_POST['username']) && isset($_POST['password'])){
			$username = $_POST['username'];
			
			$password = $_POST['password'];
		 
			$query = "INSERT INTO `userAccount` (username, userPass) VALUES ('$username', '$password')";
			$result = mysqli_query($connection, $query);
			if($result){
			    $smsg = "User Created Successfully.";
			}else{
			    $fmsg ="User Registration Failed";
			}
		    }
				
			
			// close the connection
			$Connection->close();
			?> <!-- end of php -->
