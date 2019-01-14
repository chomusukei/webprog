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
     $pass = $_POST["pass"];
     $username = mysqli_real_escape_string($link,$uname);
	   $password = mysqli_real_escape_string($link,$pass);

       $sql = "SELECT password FROM user WHERE username = '$username' AND password = '$password'";

       $result = mysqli_query($link, $sql);

       $count = mysqli_num_rows($result);
		
	   echo $count;
}
?>