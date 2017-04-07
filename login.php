<?php require "movie_db.inc";
include 'init.php';

StartHTML( "Movie Database" );
	
	HTMLHeader();

	HTMLNav();



if(empty($_POST) === false){
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) === true || empty($password) === true){
		echo 'You need to enter username and password';
		session_unset();
	} 

	else if (!user_exists($username, $Connection)){
		echo 'We can\'t find that username.';
		session_unset();
	}
	else if(!password_exists($password, $username, $Connection) ){
		echo 'password is invalid';
		session_unset();
	}
	else{
	$_SESSION["user"]= $username;
}
}

?>

<div class="body">
<h2>Welcome <?php echo $_SESSION["user"]?> </h2>


