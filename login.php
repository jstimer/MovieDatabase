<?php
include 'init.php';

if(password_exists('cptm0rg4n', 'joh', $Connection) === true){
	echo 'it exist';
}


if(empty($_POST) === false){
	$username = $_POST['username'];
	$password = $_POST['password'];
	if(empty($username) === true || empty($password) === true){
		echo 'You need to enter username and password';
	} 
	else if (user_exists($username, $Connection) === false){
		echo 'We can\'t find that username.';

	}
	else if(password_exists($password, $username, $Connection) === false){
		echo 'password is invalid';
	}
	else
		echo'user and password exist';
	

}

?>
