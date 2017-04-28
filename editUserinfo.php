<?php
   define('DB_SERVER', 'willy');
   define('DB_USERNAME', 'comp305_grp2');
   define('DB_PASSWORD', 'Scrumbags1!');
   define('DB_DATABASE', 'comp305_grp2');
$con=mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_DATABASE,$con) or die("Failed to connect to MySQL: " . mysql_error());
echo $_POST['username'];
$var_value = $_GET['user_id'];
echo $var_value;
function NewUser()
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	$first_name = $_POST['first_name'];
	$last_name =  $_POST['last_name'];
	$email = $_POST['email'];
	$admin = $_POST['admin'];
	$user_id = $_POST['user_id'];
	echo $user_id;
	if($admin == 'y'){
		$query = "update users set username = '$username',password = '$password',first_name= '$first_name',last_name= '$last_name',email = '$email',admin = '$admin' WHERE user_id = '$user_id'";
		$data = mysql_query ($query)or die(mysql_error());
		if($data)
		{
		echo "YOUR REGISTRATION IS COMPLETED...";
		header("location:viewUsers.php");
		exit();
		}
	}
	else{
		$query = "update users set username = '$username',password = '$password',first_name= '$first_name',last_name= '$last_name',email = '$email',admin = '$admin' WHERE user_id = '$user_id'";
		$data = mysql_query ($query)or die(mysql_error());
		if($data)
		{
		echo "YOUR REGISTRATION IS COMPLETED...";
		header("location:viewUsers.php");
		exit();
		}
	}
}
function SignUp()
{
if(!empty($_POST['username']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
	$query = mysql_query("SELECT * FROM users WHERE username = '$_POST[username]' AND password = '$_POST[password]'") or die(mysql_error());
	if(!$row = mysql_fetch_array($query) or die(mysql_error()))
	{
		NewUser();
	}
	else
	{
		echo "SORRY...YOU ARE ALREADY REGISTERED USER...";
	}
}
}
if(isset($_POST['submit']))
{
	SignUp();
}
?>
