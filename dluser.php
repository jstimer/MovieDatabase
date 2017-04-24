<?php

require "movie_db.inc";
include 'init.php';

StartHTML( "Movie Database" );
	
	HTMLHeader();

	HTMLNav();

?>

<div class="body">

	

<?php
$var_value = $_GET['user_id'];

$sql = "delete from users where user_id = $var_value;";

if (mysqli_query($Connection, $sql)) {
    header("location:viewUsers.php");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
exit();
