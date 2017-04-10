<?php require "movie_db.inc";
include 'init.php';
	StartHTML( "Movie Database" );
	
	HTMLHeader();
	
	HTMLNav();
	
	?>
		
		<div class="body">
			 <button id="myBtn" style="float: left";>Register</button><br><br>
			
			<div id="myModal" class="modal">

		  	<!-- Edit Modal content -->
			<div class="modal-content">
		  	<div class="modal-header">
		    	<span class="close" style="cursor:pointer">&times;</span>
		    	<h2>Register</h2>
		  	</div>
		  	<div class="modal-body">			

		
			<form method="POST" action="connectSignup.php">
<td>FirstName</td><br><td> <input type="text" name="first_name"></td>
</tr><br><br>
<tr>
<td>LastName</td><br><td> <input type="text" name="last_name"></td>
</tr><br><br>
<tr>
<td>Email</td><br><td> <input type="text" name="email"></td>
</tr><br><br>
<tr>
<td>UserName</td><br><td> <input type="text" name="username"></td>
</tr><br><br>
<tr>
<td>Password</td><br><td> <input type="password" name="password"></td>
</tr><br><br>
<tr>
<td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
</tr><br><br>
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

<?php	
		HTMLFooter();
?>
