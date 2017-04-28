<?php

	
function user_exists($username,$Connection){
	
	return (mysqli_query($Connection,"SELECT user_id FROM users WHERE username = '$username'")->num_rows == 1 ? true : false);
}
function password_exists($password, $username,$Connection){
	
	return (mysqli_query($Connection,"SELECT user_id FROM users WHERE username = '$username' and password = '$password'")->num_rows == 1 ? true : false);
}
function admin_check($username,$Connection){
	
	return (mysqli_query($Connection,"SELECT user_id FROM users WHERE username = '$username' and admin = 'y'")->num_rows == 1 ? true : false);
}
?>
