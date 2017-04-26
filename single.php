<?php require "movie_db.inc";

	StartHTML( "Movie Database" );
	
	HTMLHeader();
	
	HTMLNav();
	
	?>
			
			<a href="single.html" class= "active"></a>
			
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
				
				// make a select statement to get data from the database
				$var_value = $_GET['filmName'];
				
				$SQLFilm = "select filmID, film_name, film_release, runningTime, mpaa_rating, film_summary, poster, trailer_embed from Film where filmID = $var_value;";
	
				$result = $Connection->query($SQLFilm);
	
				if ($result->num_rows > 0) {
    			// output data of each row
    			while($row = $result->fetch_assoc()) {
    				$film_name = $row["film_name"];
    				$film_release = $row["film_release"];
    				$runningTime = $row["runningTime"];
    				$mpaa_rating = $row["mpaa_rating"];
    				$film_summary = $row["film_summary"];
    				$poster = $row["poster"];
    				$embedCode = $row["trailer_embed"];
    				
    			}
				} else {
    			echo "0 results";
				}

			
				
				?>
				
			<div class="body">	
			<button id="editBtn" style="float: right";>Edit Movie</button>
			<button id="deleteBtn" style="float: right";>Delete</button><br>			
			<h2 class="movie-title"><?php echo $film_name; ?> </h2>
			
			
				<?php echo '<img src= ' . $poster . '>'; ?>
				
			
			<ul>
				<li><strong>Rated: <?php echo $mpaa_rating; ?></strong> 
					
				</li>
				<li><strong>Length: <?php echo $runningTime . " min"; ?></strong></li>
				<li><strong>Release Date: <?php echo $film_release; ?></strong></li>
			</ul>
			<p><strong> Plot: </strong><?php echo $film_summary; ?></p>
			<p><?php echo "<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/$embedCode\" frameborder=\"0\" allowfullscreen></iframe>";?></p></br>

			<?php 
			$SQLRole = "SELECT ActorListInMovie.roleName, ActorListInMovie.filmId, Film.filmID FROM ActorListInMovie, Film WHERE ActorListInMovie.filmId=Film.filmID and ActorListInMovie.filmId = $var_value;";

			$RoleResult = $Connection->query($SQLRole);

			if ($RoleResult->num_rows > 0) {
				//echo $RoleResult->num_rows . "</br>";
			while($row = $RoleResult->fetch_assoc()) {
    				echo $row["roleName"] . "</br>";
			}
			} else {
				echo "No actor roles.";
				}			
			?>
			</div>
			
			<?php HTMLFooter(); ?>

			<!--
			<ul>
			<?php
				$sql = "SELECT director_name FROM table_name";  //change table/attribute names accordingly
				$result = $conn->query($sql);
		
				if ($result->num_rows > 0) {
					//output the data of each row
					echo "Directors: ";
					while($row = $result->fetch_assoc()) {
						echo $row["director_name"] . ", ";
					}
				} else {
					echo " Directors: No data found";
				}
				
			?>
				<li><strong>Directors:</strong> Director names</li>
				<li><strong>Writers:</strong> Writer names</li>
				<li><strong>Stars:</strong> Actor names</li>
			</ul>
		
			-->
		
		<?php	
			// close the connection
			$Connection->close();
		?> 
