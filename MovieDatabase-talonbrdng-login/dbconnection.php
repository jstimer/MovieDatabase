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
				
				
				
?>