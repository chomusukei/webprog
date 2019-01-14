<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login Page</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/stylish-portfolio.css" rel="stylesheet">
	
	<style>
	body 
	{
		
	}

	.avatarimg
	{
		height: 150px;
		width: 150px;
	}
	
	/* Full-width input fields */
	input[type=text], input[type=password] {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  display: inline-block;
	  border: 1px solid #ccc;
	  box-sizing: border-box;
	}

	/* Set a style for all buttons */
	button {
	  background-color: #4CAF50;
	  color: white;
	  padding: 14px 20px;
	  margin: 8px 0;
	  border: none;
	  cursor: pointer;
	  width: 100%;
	}

	button:hover {
	  opacity: 0.8;
	}

	/* Extra styles for the cancel button */
	.cancelbtn {
	  width: auto;
	  padding: 10px 18px;
	  background-color: #f44336;
	  margin-left: 119px;
	}

	/* Center the image and position the close button */
	.imgcontainer {
	  text-align: center;
	  margin: 24px 0 12px 0;
	  position: relative;
	}

	img.avatar {
	  width: 40%;
	  border-radius: 50%;
	}

	.container {
	  padding: 16px;
	}

	span.psw {
	  float: right;
	  padding-top: 16px;
	}

	/* The Modal (background) */
	.modal {
	  display: none; /* Hidden by default */
	  position: fixed; /* Stay in place */
	  z-index: 1; /* Sit on top */
	  left: 0;
	  top: 0;
	  width: 100%; /* Full width */
	  height: 100%; /* Full height */
	  overflow: auto; /* Enable scroll if needed */
	  background-color: rgb(0,0,0); /* Fallback color */
	  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	  padding-top: 60px;
	}

	/* Modal Content/Box */
	.modal-content {
	  background-color: #FFF096;
	  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
	  border: 1px solid #888;
	  width: 80%; /* Could be more or less, depending on screen size */
	}

	/* The Close Button (x) */
	.close {
	  position: absolute;
	  right: 25px;
	  top: 0;
	  color: #000;
	  font-size: 35px;
	  font-weight: bold;
	}

	.close:hover,
	.close:focus {
	  color: red;
	  cursor: pointer;
	}

	/* Add Zoom Animation */
	.animate {
	  -webkit-animation: animatezoom 0.6s;
	  animation: animatezoom 0.6s
	}

	@-webkit-keyframes animatezoom {
	  from {-webkit-transform: scale(0)} 
	  to {-webkit-transform: scale(1)}
	}
	  
	@keyframes animatezoom {
	  from {transform: scale(0)} 
	  to {transform: scale(1)}
	}

	/* Change styles for span and cancel button on extra small screens */
	@media screen and (max-width: 300px) {
	  span.psw {
		 display: block;
		 float: none;
	  }
	  .cancelbtn {
		 width: 100%;
	  }
	  
	input[type=submit]
	{
		background: none;
		color: inherit;
		border: none;
		padding: 0;
		font: inherit;
		cursor: pointer;
		outline: inherit;
	}
	}
</style>

<head>
  
  <body id="page-top">
  <!-- The Header/Main Login Page-->
  <header class="masthead d-flex">
      <div class="container text-center my-auto">
		<img src="img/logoparti.jpg" border="10" style="border-left-style: solid;border-left-width: 1-;
		border-top-width: 10px;border-top-style: solid;border-bottom-width: 10px;border-bottom-style: solid;border-right-width: 10px;border-right-style: solid;"> 
        <h1 class="mb-1" style="color: yellow;">PARTI KEADILAN <br>SEJAHTERA</h1>
		<h3 class="mb-5">
          <em style="color: yellow;">Portal rasmi keahlian Parti Keadilan Sejahtera</em>
        </h3>
		
        <a class="btn btn-primary btn-xl" onclick="document.getElementById('id01').style.display='block'">Login</a><br><br>
		<a class="btn btn-primary btn-xl" onclick="document.getElementById('id02').style.display='block'">Register</a><br><br>
		
  
		<!-- Register Modal Form -->
		<div id="id02" class="modal">
			<form name="form" class="modal-content animate" action="register.php" method=post onsubmit="return (checkname()&&check());">
				<div class="imgcontainer">
				  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
				  <img class="avatarimg" src="img/avatar.png" alt="Avatar" class="avatar">
				</div>

				<div class="container">
				  <label for="uname"><b>Username</b></label>
				  <input id="reg-name" type="text" placeholder="Enter Username" name="uname" onchange="checkname()"required>
				  
				  <label for="email"><b>Email</b></label>
				  <input type="text" placeholder="Enter Email" name="email" required>

				  <label for="psw"><b>Password</b></label>
				  <input id="try" type="password" placeholder="Enter Password" name="psw" required>
				  
				  <label for="repsw"><b>Retype Password</b></label>
				  <input id="retry" type="password" placeholder="Retype Password" name="repsw" required>			
				
				  <button type="submit" value="Register">Register</button>
				  <label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				  </label>
				</div>

				<div class="container" style="background-color:#FFF096">
				  <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
				  <span class="psw">Forgot <a href="#">password?</a></span>
				</div>
			</form>
		</div>
  
		<!-- Login Modal Form -->
		<div id="id01" class="modal">
			<form class="modal-content animate" action="login2.php" method=post onsubmit="return (logname()&&logpass());">
				<div class="imgcontainer">
				  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				  <img class="avatarimg" src="img/avatar.png" alt="Avatar" class="avatar">
				</div>

				<div class="container">
				  <label for="uname"><b>Username</b></label>
				  <input id="log-name" type="text" placeholder="Enter Username" name="uname" required>

				  <label for="psw"><b>Password</b></label>
				  <input id="log-pass" type="password" placeholder="Enter Password" name="psw" required>
					
				  <button type="submit">Login</button>
				  <label>
					<input type="checkbox" checked="checked" name="remember"> Remember me
				  </label>
				</div>

				<div class="container" style="background-color:#FFF096">
				  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
				  <span class="psw">Forgot <a href="#">password?</a></span>
				</div>
			</form>
		</div>
		
	
      </div>
      <div class="overlay"></div>
    </header>
	
	<!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/stylish-portfolio.js"></script>
	
	<script>
	/* Check retype password */
	function check()
	{	
		if (document.getElementById('try').value != document.getElementById('retry').value) 
		{
			alert("Password is not the same");
			return false;
		}
		else 
		{
			return true;
		}		
	}
	
	/* Check username used or not */
	function checkname()
	{
		var flag = false;
		var uname = document.getElementById('reg-name').value;
		$.ajax(
		{
		  async: false,
		  method: "POST",
		  url: "loginfunction/validate.php",
		  data: {uname: uname}
		}).done(function(count)
		{
		  if (count > 0)
		  {
			alert("Username "+uname+" is already existed");
			flag = false;
		  }
		  else
			flag = true;
		})
		return flag;	
	}
	
	/* Check username exist or not */
	function logname()
	{
		var flag = false;
		var uname = document.getElementById('log-name').value;
		$.ajax(
		{
		  async: false,
		  method: "POST",
		  url: "loginfunction/validate.php",
		  data: {uname: uname}
		}).done(function(count)
		{
		  if (count > 0)
		  {
			flag = true;
		  }
		  else
		  {
			alert("Username "+uname+" does not exist");
			flag = false;
		  }
		})
		return flag;
	}
	
	/* Check password same or not */
	function logpass()
	{
		var flag = false;
		var pass = document.getElementById('log-pass').value;
		var uname = document.getElementById('log-name').value;
		$.ajax(
		{
		  async: false,
		  method: "POST",
		  url: "loginfunction/validatepass.php",
		  data: {uname: uname, pass: pass}
		}).done(function(count)
		{
		  if (count > 0)
		  {
			flag = true;
		  }
		  else
		  {
			alert("Password is wrong");
			flag = false;
		  }
		})
		return flag;
	}
	</script>
	
	
  </body>

</html>