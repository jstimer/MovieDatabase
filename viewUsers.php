
<?php require "movie_db.inc";
include 'init.php';

StartHTML( "Movie Database" );
	
	HTMLHeader();

	HTMLNav();

?>
<style>
table, th, td {
     border: .5px solid black;
}
</style>
<?php

$SQLUser = "select user_id, username, first_name, last_name, email, admin from users order by user_id;";
	
	$result = $Connection->query($SQLUser);
	
	if ($result->num_rows > 0) {
    // output data of each row
	?>
		<div class="body">

	
	
	<?php
		echo "<table><tr><th>ID</th><th>Username</th><th>Last Name</th><th>First Name</th><th>Email</th><th>Admin</th><th>Delete</th></tr>";
		
    	while($row = $result->fetch_assoc()) {
    		$name = $row["user_id"];
	 echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["first_name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["admin"]. 
"</td><td>"?><a href="dluser.php?user_id=<?php echo $name ?>"> delete <?php "</br></a></td></tr>";
    	     
    		
    }
    ?>
	</div>
<?php
	
} else {
    echo "0 results";
}
?>
