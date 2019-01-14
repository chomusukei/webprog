<?php
require("config.php");

$uname = $_POST["uname"];
$email = $_POST["email"];
$pass = $_POST["psw"];

$conn = mysqli_connect($host,$admin,$ps,$db);
$q="INSERT INTO user (username, email, password) VALUES ('$uname','$email','$pass')";
mysqli_query($conn, $q);
echo "Registering...";

session_start();
$_SESSION["uname"] = $uname;
header("refresh:5;url=home.php");
?>