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
	
	echo $_POST;
	

	if (isset($_POST['filmName']))
	{
		$varMovie = mysqli_real_escape_string($Connection, $_POST['filmName']);
		$movRelease = $_POST['releaseDate'];
		$runningTime = $_POST['runtime'];
		$mpaa = $_POST['rating'];
		$synopsis = mysqli_real_escape_string($Connection, $_POST['summary']);
		$movGenre = $_POST['genre'];
	
		$sql = "INSERT INTO Film VALUES (NULL, '".$varMovie."', '$movRelease', $runningTime, '$mpaa', '".$synopsis."', '$movGenre')";


		if ($Connection->query($sql) === TRUE) {
   	 echo "New record created successfully";
   	 //header( "Location: movies.php" ); 	 
		} else {
   	 echo "Error: " . $sql . "<br>" . $Connection->error;
		}
	}

	$Connection->close();		
	
?>

