<?php
	session_start();
	
	if (!isset($_SESSION["uname"]))
	{
		header("Location: login.php");
	}
?>

<html>
<head></head>
<body>
WELCOME BIJ <br>
<a href="userpage/profile.php">Profile</a>