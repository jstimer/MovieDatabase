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
    			echo "No movie data sumbitted.";
				}
			
			$SQLGenre = "SELECT Genre.catid, Genre.catName, Film.filmID, Film.genre FROM Genre, Film WHERE Genre.catid = Film.genre AND Film.filmID = $var_value;";

			$genreResult = $Connection->query($SQLGenre);

			
			
				?>
				
			<div class="body">	
			<button id="editBtn" style="float: right";>Edit Movie</button>

			<button id="delBtn" style="float: right";>Delete</button><br>
			<div id="delModal" class="modal">

  			<!-- Delete Modal content -->
			<div class="modal-content">
  			<div class="modal-header">
    			<span class="close" style="cursor:pointer">&times;</span>
    			<h2>Delete Movie</h2>
  			</div>
  			<div class="modal-body">
    			<!-- <form action="movie_delete.php" method="POST"> -->
    			<br>
    			(In progress)
    			<br><br>
    			<!-- <input type="submit" name="submit" value="Confirm">-->
    			</form>
  			</div>
			</div>
			</div>
			
			<!-- javascript for the "delete movie" modal -->
	 		<script>
	 		// Get the modal
	 		var modal = document.getElementById('delModal');
		
	 		// Get the button that opens the modal
	 		var btn = document.getElementById("delBtn");

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
			
			<h2 class="movie-title"><?php echo $film_name; ?> </h2>
			
			
				<?php echo "<img width=\"250\" height=\"350\" src= " . $poster . ">"; ?>
				
			
			<ul>
				<li><strong>Rated: <?php echo $mpaa_rating; ?></strong> 
					
				</li>
				<li><strong>Length: <?php echo $runningTime . " min"; ?></strong></li>
				<li><strong>Release Date: <?php echo $film_release; ?></strong></li>
				<li><strong>Genre: 
				<?php if ($genreResult->num_rows > 0) {
    				while($row = $genreResult->fetch_assoc()) {
    					$genre = $row["catName"];
    				}
				} else {
    					//echo "N/A";
				}echo $genre; ?></strong></li>

			</ul>
			<p><strong> Plot: </strong><?php echo $film_summary; ?></p>
			<p><?php echo "<center><iframe width=\"545\" height=\"315\" src=\"https://www.youtube.com/embed/$embedCode\" frameborder=\"0\" allowfullscreen></iframe></center>";?></p></br>
			<!-- Start of actor role code -->

			<p><strong> Main Cast: </strong></p>

			<?php 
			$SQLAct = "SELECT film_name, actorFirst, actorLast, role from ActorPlaysIn NATURAL JOIN Film WHERE filmID = $var_value;";
			
			$ActResult = $Connection->query($SQLAct);

			if ($ActResult ->num_rows > 0) {
				//echo $RoleResult->num_rows . "</br>";
			while($row = $ActResult->fetch_assoc()) {
    				
    				echo $row["actorFirst"]." ". $row["actorLast"]." as ".$row["role"] ."</br>";
			}
			} else {
				echo "No actor roles submitted.";
				}			
			?>
			</div>
			
			<?php HTMLFooter(); ?>

		
		<?php	
			// close the connection
			$Connection->close();
		?> 
