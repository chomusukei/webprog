<?php
  session_start();

  $link = mysqli_connect("localhost","root","","party");

  if (!isset($_SESSION["uname"]))
  {
    header("Location: login.php");
  }
  else
  {
    if (!$link) 
    {
      die('Could not connect: ' .mysqli_error());
       echo json_encode(2);
    }
    else
    {	
      $uname=$_SESSION["uname"];
      $pass = $_POST["npass"];
      $username = mysqli_real_escape_string($link,$uname);
    	$password = mysqli_real_escape_string($link,$pass);

      $sql = "UPDATE user SET password='$pass' WHERE username = '$username'";

      mysqli_query($link, $sql);
      header("Location:profile.php");
    }
  }
?>