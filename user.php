<?php require "movie_db.inc";
include 'init.php';

StartHTML( "Movie Database" );
	
	HTMLHeader();

	HTMLNav();
?>

<div class="body">

	<h2>Welcome <?php echo $_SESSION["user"]?> to your user home!</h2>

<?php

