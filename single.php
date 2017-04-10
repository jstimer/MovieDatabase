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
				
				$SQLFilm = "select filmID, film_name, film_release, runningTime, mpaa_rating, film_summary from Film where filmID = $var_value;";
	
				$result = $Connection->query($SQLFilm);
	
				if ($result->num_rows > 0) {
    			// output data of each row
    			while($row = $result->fetch_assoc()) {
    				$film_name = $row["film_name"];
    				$film_release = $row["film_release"];
    				$runningTime = $row["runningTime"];
    				$mpaa_rating = $row["mpaa_rating"];
    				$film_summary = $row["film_summary"];
    				
    				
    			}
				} else {
    			echo "0 results";
				}
				$Connection->close();
				
				?>
				
			<div class="body">				
			<h2 class="movie-title"><?php echo $film_name; ?> </h2>
			
			
				
				
			
			<ul>
				<li><strong>Rated: <?php echo $mpaa_rating; ?></strong> 
					
				</li>
				<li><strong>Length: <?php echo $runningTime . " min"; ?></strong></li>
				<li><strong>Release Date: <?php echo $film_release; ?></strong></li>
			</ul>
			<p><strong> Plot: </strong><?php echo $film_summary; ?>
			</p>
			</div>
			
			<?php	
				HTMLFooter(); ?>

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
		
		
		
			<p>Pan's Labyrinth, originally known in Spanish as El Laberinto del Fauno (The Labyrinth of the Faun), </p>
			<p>is a 2006 Spanish-Mexican dark fantasy film written and directed by Mexican filmmaker Guillermo del Toro.</p>
			<p>It was produced and distributed by Esperanto Films.</p>
			</div>
			-->
		
		<?php	
			// close the connection
			$Connection->close();
		?> <!-- end of php -->
