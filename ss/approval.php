<?php 
require("config.php");

$conn = mysqli_connect($host,$admin,$ps,$db);
$q = "select * from user where approval = 0";
$result = mysqli_query($conn, $q);

while($row = mysqli_fetch_array($result))
{
	echo ("".$row["username"]."<br>");
}

?>


