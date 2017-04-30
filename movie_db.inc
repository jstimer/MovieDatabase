<?php

// start the session
session_start();

	function StartHTML( $Title )
	{
		echo "<!DOCTYPE html>\n";
		echo "<!-- Home page for the movie database website -->\n";
		echo "<html>\n";
		echo "<head>\n";
		echo "<!-- external javascript file -->\n";
		echo "<script src=\"movieScript.js\"></script>\n";
		echo "<!-- external css file -->\n";
		echo "<link href=\"movieStyle.css\" type=\"text/css\" rel=\"stylesheet\"/>\n";
		echo "<!-- w3schools w3.css -->\n";
		echo "<link rel=\"stylesheet\" href=\"https://www.w3schools.com/lib/w3.css\">\n"; 
		echo "<!-- Image for web tab -->\n";
		echo "<link rel=\"shortcut icon\" href=\"images/popcorn.png\">\n";
		echo "<title>".$Title."</title>\n";
		echo "</head>\n";
		echo "<body>\n";
	}
	
	function HTMLHeader()
	{
		echo '<div class="header">';
		echo "<h1>ScrumDB</h1>\n";
		echo "<h3>Scrumbags Love Movies ;^)</h3>\n";
		echo "You are logged in as: ";
		echo $_SESSION["user"];
		echo " \n<br>";
		
		if(!$_SESSION["user"]){
		
?>
		
		<button id="loginBtn" style="float: left";>Log In</button>
			
			<div id="loginModal" class="modal">

		  	<!-- Edit Modal content -->
			<div class="modal-content">
		  	<div class="modal-header">
		    	<span class="close" style="cursor:pointer">&times;</span>
		    	<h2>Log In</h2>
			
	
		  	</div>
		  	<div class="modal-body">			

			<form action="login.php" method="post">
				<ul id="login">
					<br>
						Username: <br>
						<input type="text" name ="username"><br><br>
					
						Password: <br>
						<input type="password" name ="password"><br><br>
					
						<input type="submit" value="Log In"><br><br>
						<a href="register.php">Register</a>
					
			</form>


		  	</div>
			</div>
			</div>

			
<!-- javascript for the "login" modal -->
				 <script>
				 // Get the modal
				 var logmodal = document.getElementById('loginModal');

				 // Get the button that opens the modal
				 var logbtn = document.getElementById("loginBtn");

				 // Get the <span> element that closes the modal
				 var logspan = document.getElementsByClassName("close")[0];

				 // When the user clicks on the button, open the modal
				 logbtn.onclick = function() {
			    	 	logmodal.style.display = "block";
					//var modID = $(this).attr('loginModal');
				 }

				// When the user clicks on <span> (x), close the modal
				logspan.onclick = function() {
			   		logmodal.style.display = "none";
				}

				// When the user clicks anywhere outside of the modal, close it
				window.onclick = function(event) {
			    		if (event.target == modal) {
			       			logmodal.style.display = "none";
			    		}
				}
				</script>
			

		<button id="regBtn" style="float: left";>Register</button><br><br>
			
			<div id="regModal" class="modal">

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

	<!-- javascript for the "register" modal -->
	 <script>
	 // Get the modal
	 var regmodal = document.getElementById('regModal');

	 // Get the button that opens the modal
	 var regbtn = document.getElementById("regBtn");

	 // Get the <span> element that closes the modal
	 var regspan = document.getElementsByClassName("close")[0];

	 // When the user clicks on the button, open the modal
	 regbtn.onclick = function() {
    	 	regmodal.style.display = "block";
		//var modID = $(this).attr('regModal');
	 }

	// When the user clicks on <span> (x), close the modal
	regspan.onclick = function() {
   		regmodal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function() {
    		if (event.target == modal) {
       			regmodal.style.display = "none";
    		}
	}
	</script>







		 
<?php	
		}
		if($_SESSION["user"]){
		
		echo "<a href=\"logout.php\">Log Out</a>";
		}
		echo "<div class=\"search\">\n";
		echo "<input type=\"text\" name=\"search\" placeholder=\"Search...\">\n";
		echo "</div>\n";
		echo "</div>\n";
		echo "</div>\n";
		
	}
	
	function HTMLNav() 
	{
		echo "<ul class=\"menu\">";
		echo "<li><a href=\"index.php\">Home</a></li>\n";
		echo "<li><a href=\"indexx.php?letter=\">Movies</a></li>\n";
		
		echo "<li><a href=\"contact_us.php\">Contact Us</a></li>\n";
		
		//echo "<li><a href=\"register.php\">Register</a></li>\n";
		
		if($_SESSION["admin"] == 'y'){
		echo "<li><a href=\"admin.php\">Admin</a></li>\n";		
		}
		
		if($_SESSION["user"]){
		echo "<li><a href=\"user.php\">My Home</a></li>\n";
		
		}
		echo "</ul>\n";
	}
	
	function HTMLFooter()
	{
		echo "<div class=\"footer\">";
		echo "<p>COMP305 - Database Application Development. Lock Haven University, Spring 2017</p>\n";
		echo "</div>\n";
		echo "</body>\n";
		echo "</html>\n";
	}
	?>
