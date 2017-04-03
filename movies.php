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

	 <!-- Trigger/Open Edit Modal -->
	 <button id="myBtn" style="float: right";>Add</button><br>

	<!-- Edit Modal -->
	<div id="myModal" class="modal">

  	<!-- Edit Modal content -->
	<div class="modal-content">
  	<div class="modal-header">
    	<span class="close">&times;</span>
    	<h2>Add Movie</h2>
  	</div>
  	<div class="modal-body">
    	<form>
    		<br>
			Film Name:
			<input type="text" name="filmName" style="width: 65%" maxlength="100"><br><br>
			Release Date:
			<input type="text" name="releaseDate" placeholder="YYYY-MM-DD" style="width: 21%" maxlength="10"><br><br>
			Runtime:
			<input type="text" name="runtime" placeholder="in mins" style="width: 15%" maxlength="3"><br><br>
			MPAA Rating:
			<select name="rating">
				<option value="G">G</option>
				<option value="PG">PG</option>
				<option value="PG13">PG-13</option>
				<option value="R">R</option>
				<option value="NC17">NC-17</option>
				<option value="NR">NR</option>
			</select>
			<br><br>
			Plot Summary:
			<textarea name="summary" rows="4" cols="50" maxlength="1000">
			</textarea>
			<br><br>
			<form action="movie_submit.php" method="post">
				<input type="submit" name="submit" value="Submit">	
			</form>
				    	
    	</form>
  	</div>
	</div>

	</div>

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
    	while($row = $result->fetch_assoc()) {
    		$name = $row["filmID"]; 
    	?>
    		 <a href="single.php?filmName=<?php echo $name ?>"><?php echo $row["film_name"] ?></br></a>
<?php
    }
    ?>
	</div
<?php
	
} else {
    echo "0 results";
}
$Connection->close();		
	
?>

