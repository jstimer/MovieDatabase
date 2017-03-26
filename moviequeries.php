<?php

function DatabaseConnect($Category)
{
    // set the connection information
    $Server = "willy";
	$UserName = "comp305_grp2";
	$Password = "Scrumbags1!";
	$Database = "comp305_grp2";

    // connect to the database
    //      create a new instance of a mysqli object. this
    //      object contains the connection to the mysql server
    $Connection = new mysqli( $Server, $UserName, $Password, $Database );

    // check for a successful connection
    //      connect_error will evaluate to true if there is an error
    if ( $Connection->connect_error )
    {
        echo "<h2>Database Error</h2>\n";
        die( "MySQLi Connection Error: ".$Connection->connect_error."\n" );
    }


    // make a select statement to get data from the database
    $SQL = "select title, description, price from menu_items where category = '".$Category."';";
	// make a select statement to get data from the database
	$SQLActorActress = "select actor_id, fname, lname, dob, dod from ActorActress;";
	$SQLActorListInMovie = "select filmId, actorId, roleName from ActorListInMove;";
	$SQLFilm = "select filmID, film_name, film_release, runningTime, mpaa_rating from Film;";
	$SQLGenre = "select catid, catName from Genre;";
	$SQLuserAccount = "select userid, username, userPass from userAccount;";
	$SQLFilmName ="select film_name from Film;";

	$film_name = mysql_query($SQLFilmName);

    // execute the query
    //      use the query method of the $Connection object
    $Results = $Connection->query( $SQLFilm );

    // check for results
    //      $Results will evaluate to true if there data is returned
    //      from the database, false if no data is returned
    if ( $Results )
    {

        // start the table HTML
        echo "<table class=\"menu_table\">\n";

        // add the HTML for a table header row
        echo "   <thead>\n";
        echo "      <th>".$Category."</th>\n";
        echo "   </thead>\n";

        // loop through the results
        //      the fecth_row method returns an array of the column
        //      data - one item in the array for each column in the
        //      select statement.
        //
        //      the statement in the while will evaluate to false when
        //      there are no more rows
        while( $Row = $Results->fetch_row() )
        {
            // add  table row
            echo "   <tr>\n";

            // loop through the items in the array
            //      the count function returns the number of items
            //      in the array.
            for( $i=0; $i<count($Row); $i++ )
            {
                // add table cells
                echo "     <td>".$Row[$i]."</td>\n";
            }

            // end of the table row
            echo "   </tr>\n";
        }
        
        // stop the table HTML
        echo "</table>\n";
    }
    else
    {
        // no results returned
        echo "<p>No results returned from the query</p>\n";
    }

    // close the connection
    $Connection->close();
}
?>
