<?php require "movie_db.inc";
include 'init.php';
	StartHTML( "Movie Database" );
	
	HTMLHeader();
	
	HTMLNav();
	
	?>
		
		<div class="body">
			 <button id="myBtn" style="float: left";>Login</button><br>
			
			<div id="myModal" class="modal">

		  	<!-- Edit Modal content -->
			<div class="modal-content">
		  	<div class="modal-header">
		    	<span class="close" style="cursor:pointer">&times;</span>
		    	<h2>Login</h2>
		  	</div>
		  	<div class="modal-body">			

			<form action="login.php" method="post">
				<ul id="login">
					<br>
						Username: <br>
						<input type="text" name ="username"><br><br>
					
						Password: <br>
						<input type="password" name ="password"><br><br>
					
						<input type="submit" value="Log in"><br><br>
						<a href="register.php">Register</a>
						<a href="index.php" onclick="<?php session_destroy();?>">Logout</a>
			</form>
  	</div>
	</div>
	</div>
	</div>

	<!-- javascript for the "add movie" modal -->
	 <script>
	 // Get the modal
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
			
			// close the connection
			$Connection->close();
			?> <!-- end of php -->
