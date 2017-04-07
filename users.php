<?php

function user_exists($username,$Connection){
	
	return (mysqli_query($Connection,"SELECT COUNT(user_id) FROM users WHERE username = '$username'")->num_rows === 1) ? true : false;

}
function password_exists($password, $username,$Connection){
	
	return (mysqli_query($Connection,"SELECT COUNT(user_id) FROM users WHERE username = '$username' and password = '$password'")->num_rows === 1) ? true : false;

}
function password_check($password, $username, $Connection){
	$userId = mysqli_query($Connection,"SELECT user_id FROM users WHERE username = '$username'");
	return (mysqli_query($Connection,"SELECT COUNT(user_id) FROM users WHERE user_id = $userId and password = '$password'")->num_rows === 1) ? true : false;

}
?>
