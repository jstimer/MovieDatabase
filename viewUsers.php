
<?php require "movie_db.inc";
include 'init.php';

if(!$_SESSION["admin"] == 'y'){
	header("location:index.php");
}
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

	
			 <button id="myBtn" style="float: left";>Add User</button><br><br>
			
			<div id="myModal" class="modal">

		  	<!-- Edit Modal content -->
			<div class="modal-content">
		  	<div class="modal-header">
		    	<span class="close" style="cursor:pointer">&times;</span>
		    	<h2>Register</h2>
		  	</div>
		  	<div class="modal-body">			

		
			<form method="POST" action="adminadd.php">
			<td>FirstName</td><br><td> <input type="text" name="first_name"></td>
			</tr><br><br>
			<tr>
			<td>LastName</td><br><td> <input type="text" name="last_name"></td>
			</tr><br><br>
			<tr>
			<td>Email</td><br><td> <input type="text" name="email"></td>
			</tr><br><br>
			<tr>
			<td>UserName</td><br><td> <input type="text" name="username"></td>
			</tr><br><br>
			<tr>
			<td>Password</td><br><td> <input type="password" name="password"></td>
			</tr><br><br>
			<tr>
			<td>Admin</td><br><td><input type="checkbox" name="admin" value="y"></td></tr><br><br>
			<tr>
			<td><input id="button" type="submit" name="submit" value="Sign-Up"></td>
			</tr><br><br>
			</form>
  	</div>
	</div>
	</div>
	

	<!-- javascript for the "add movie" modal -->
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
	</script><h3> Users</h3>
		
	




	<?php
		echo "<table><tr><th>ID</th><th>Username</th><th>Last Name</th><th>First Name</th><th>Email</th><th>Admin</th><th>Settings</th></tr>";
		
    	while($row = $result->fetch_assoc()) {
    		$name = $row["user_id"];
	 echo "<tr><td>" . $row["user_id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["first_name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["admin"]. 
"</td><td>"?><a href="dluser.php?user_id=<?php echo $name ?>"> delete <?php "</br></a></td><td>".
"<td>"?><a href="editUser.php?user_id=<?php echo $name ?>">edit <?php "></br></a></td></tr><td>";
    	     
    		
    }
    ?>
	</div>
<?php
	
} else {
    echo "0 results";
}
?>
