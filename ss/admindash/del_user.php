<?php
	require("../config.php");

	$nama = $_POST['nama'];

	$conn = mysqli_connect($host,$admin,$ps,$db);
	$q="DELETE FROM user WHERE username='$nama'";
	mysqli_query($conn, $q);
?>