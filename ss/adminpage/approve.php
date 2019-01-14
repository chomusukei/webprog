<?php
	require("../config.php");

	$uname = $_POST["uname"];
    $username = mysqli_real_escape_string($link,$uname);

    $sql = "SELECT * FROM user WHERE username = '$username' AND approval=1";

    $result = mysqli_query($link, $sql);

    $count = mysqli_num_rows($result);
		
	echo $count;
?>