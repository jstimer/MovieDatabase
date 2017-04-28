<?php

require "movie_db.inc";
include 'init.php';

StartHTML( "Movie Database" );
	
	HTMLHeader();

	HTMLNav();

?>

<div class="body">

	<h2>You have been logged out</h2>

<?php
session_destroy();
header("location:index.php");
exit();
