<?php
	require("../config.php");

	$uname = $_POST["uname"];
	$conn = mysqli_connect($host,$admin,$ps,$db);
    $sql = "UPDATE user SET approval=1 WHERE username='$uname'";
	mysqli_query($conn, $sql);
?>