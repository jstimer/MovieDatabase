//
if (isset($_POST['Submit']) )
{
	$varMovie = $_POST['filmName'];
	$movRelease = $_POST['releaseDate'];
	$runningTime = $_POST['runtime'];
	$mpaa = $_POST['rating'];
	$synopsis = $_POST['summary'];
	
	$sql = "INSERT INTO Film VALUES (NULL, $varMovie, $movRelease, $runningTime, $mpaa, $synopsis)";


	if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

}
