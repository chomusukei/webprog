<?php
$link = mysqli_connect("localhost","root","","party");

if (!$link) 
{
  die('Could not connect: ' .mysqli_error());
   echo json_encode(2);
}
else
{
       $uname = $_POST["uname"];
       $username = mysqli_real_escape_string($link,$uname);

       $sql = "SELECT * FROM user WHERE username = '$username'";

       $result = mysqli_query($link, $sql);

       $count = mysqli_num_rows($result);
		
	   echo $count;
}
?>