<?php require "movie_db.inc";
include 'init.php';
	StartHTML( "Movie Database" );
	
	HTMLHeader();
	
	HTMLNav();
	
	?>
		
		<div class="body">
			<h2>Log in </h2>
			<form action="login.php" method="post">
				<ul id="login">
					<li>
						Username: <br>
						<input type="text" name ="username"
					</li>
					<li>
						Password: <br>
						<input type="password" name ="password"</li>
					<li>
						<input type="submit" value="Log in"
					</li>
					<li>
						<a href="register.php">Register</a>
						<a href="index.php" onclick="<?php session_destroy();?>">Logout</a>
					</li>
				</ul>
			</form>
		</div>
			<?php
			
			// close the connection
			$Connection->close();
			?> <!-- end of php -->
