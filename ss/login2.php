<?php
require("config.php");

$uname = $_POST["uname"];
$pass = $_POST["psw"];

if($uname=="admin")
{
	session_start();
	$_SESSION["uname"] = $uname;
	header("Location:admindash/dashboard.php");
}
else
{
	session_start();
	$_SESSION["uname"] = $uname;
	header("Location:home.php");
}
?>