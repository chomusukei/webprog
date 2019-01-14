<?php
	require("../config.php");

	$uname=$_POST["uname"];
	$email=$_POST["email"];
	$fname=$_POST["fname"];
	$job=$_POST["job"];
	$phone=$_POST["phone"];
	$gender=$_POST["gender"];
	$hobby=$_POST["hobby"];
	$address=$_POST["address"];


	$conn = mysqli_connect($host,$admin,$ps,$db);
	$q="UPDATE user SET email='$email', fullname='$fname', job='$job', phone='$phone', gender='$gender', hobby='$hobby', address='$address' WHERE username='$uname'";
	mysqli_query($conn, $q);
?>