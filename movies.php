<?php require "movie_db.inc";

	StartHTML( "Movie Database" );
	
	HTMLHeader();
	
	HTMLNav();
	
	
	echo "<a href=\"movies.html\" class=\"active\"></a>";

	
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
				
	// make a select statement to get data from the database
  
	
	$SQLFilm = "select filmID, film_name, film_release, runningTime, mpaa_rating from Film order by film_name;";
	
	$result = $Connection->query($SQLFilm);
	
	if ($result->num_rows > 0) {
    // output data of each row
	?>
		<div class="body">

	
	
	<?php
    	while($row = $result->fetch_assoc()) {
    		$name = $row["filmID"]; 
    	?>
    		 <a href="single.php?filmName=<?php echo $name ?>"><?php echo $row["film_name"] ?></br></a>
<?php
    }
    ?>
	</div>
<?php
	
} else {
    echo "0 results";
}
	HTMLFooter();
	
$Connection->close();		
	
?>

