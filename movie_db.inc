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
		echo $_SESSION["user"];
		echo "<div class=\"search\">\n";
		echo "<input type=\"text\" name=\"search\" placeholder=\"Search...\">\n";
		echo "</div>\n";
		echo "</div>\n";	
	}
	
	function HTMLNav() 
	{
		echo "<ul class=\"menu\">";
		echo "<li><a href=\"index.php\">Home</a></li>\n";
		echo "<li><a href=\"movies.php\">Movies</a></li>\n";
		
		echo "<li><a href=\"contact_us.php\">Contact Us</a></li>\n";
		echo "<li><a href=\"logon.php\">Log In</a></li>\n";
		echo "<li><a href=\"register.php\">Register</a></li>\n";
		
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
