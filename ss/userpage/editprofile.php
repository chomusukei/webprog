<?php
    session_start();

    if(!isset($_SESSION["uname"]))
    {
        header("Location:../login.php");
    }
    else
    {
        $nama=$_SESSION["uname"];
        require("../config.php");

        $conn = mysqli_connect($host,$admin,$ps,$db);
        $q="select * from user where username='$nama'";
        $result = mysqli_query($conn, $q);
        $row=mysqli_fetch_array($result);
    }
?>
    
<html>
<head>

<link href="../css/jquery-confirm.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

<style>
    body
    {
        background-image:url("../img/profile.jpg");
        margin:0;
    }
    .container
    {
        width: 1020px;
        margin: 0 auto;
        padding-top: 15%;
    }
    .imagebar
    {
        color: black;
        border-radius: 25px;
        border: 5px solid pink;
        float: left;
        min-height: 450px;
        width: 250px;
        background-color: white;
    }

    .info
    {
        border-radius: 25px;
        border: 5px solid pink;
        float: right;
        min-height: 450px;
        color: black;
        width: 750px;
        background-color: white;
    }

    .label1
    {
        padding-left: 2%;
        padding-top: 2%;
        color: black; 
        font-family: 'Open Sans','arial'; 
        font-size: 16px; 
        font-weight: bold;
        letter-spacing: 0.8px;
        line-height: 30px;

        float:left;
    }

    .info-label1
    {
        padding-left: 2%;
        padding-top: 2%;
        float:left;
        color: black; 
        font-family: 'Open Sans','arial'; 
        font-size: 16px;
        letter-spacing: 0.8px;
        line-height: 30px;
    }

    .profile-pic 
    {
        padding-left: 25px;
        max-width: 200px;
        max-height: 200px;
        display: block;
    }

    .btn-primary 
    {
      background-color: #1D809F !important;
      border-color: #1D809F !important;
      color: #fff !important;
    }

    .btn-primary:hover, .btn-primary:focus, .btn-primary:active 
    {
      background-color: #155d74 !important;
      border-color: #155d74 !important;
    }

    /* Style the tab */
	.tab {
	  border-radius: 20px;
	  overflow: hidden;
	  border: 1px solid #ccc;
	  background-color: #f1f1f1;
	}

	/* Style the buttons inside the tab */
	.tab button {
	  background-color: inherit;
	  float: left;
	  border: none;
	  outline: none;
	  cursor: pointer;
	  padding: 14px 16px;
	  transition: 0.3s;
	  font-size: 17px;
	}

	/* Change background color of buttons on hover */
	.tab button:hover {
	  background-color: #ddd;
	}

	/* Create an active/current tablink class */
	.tab button.active {
	  background-color: #ccc;
	}

	.tabcontent {
	  display: none;
	}

</style>

</head>

<body>

<div class="container">
	<div class="imagebar">
	    <img class="profile-pic" src='<?php echo $row["picpath"]?>'><br>
        <form action="uploadpic.php" method="post" enctype="multipart/form-data">
            Select image to upload:
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
            <input type="submit" value="Upload Image" name="submit">
        </form>
	</div>

	<div class="info">	
		<div class="tab">
			<button class="tablinks" onclick="openCity(event, 'basicinfo')" id="defaultOpen">Change Basic Info</button>
			<button class="tablinks" onclick="openCity(event, 'changepass')">Change Password</button>
		</div>

		<div id="basicinfo" class="tabcontent">
		        <div class="label1">           	            
		            Email: <br>
		            Fullname: <br>
		            Occupation: <br>
		            Phone number: <br>
		            Gender: <br>
		            Hobby: <br>
		            Address: <br><br>
		            <button class='btn btn-primary btn-block' onclick='cupdate("<?php echo $nama?>")'>Update</button>
		        </div>

		        <div class="info-label1">		            
		            <input id="mail" type=text name="email" style="margin-top: 8.5px;" size=80 value='<?php echo $row["email"]?>'><br>         
		            <input id="fulln" type=text name="fname" style="margin-top: 8.5px;" size=80 value='<?php echo $row["fullname"]?>'><br>
		            <input id="kerja" type=text name="job" style="margin-top: 8.5px;" size=80 value='<?php echo $row["job"]?>'><br>
		            <input id="nombor" type=text name="phone" style="margin-top: 8.5px;" size=80 value='<?php echo $row["phone"]?>'><br>
		            <select id="sex" name="gender" style="margin-top: 8.5px;">
		            	<option value="Male">Male</option>
		            	<option value="Female">Female</option>
		            </select><br>
		            <input id="hobi" type=text name="hobby" style="margin-top: 8.5px;" size=80 value='<?php echo $row["hobby"]?>'><br>
		            <input id="alamat" type=text name="address" style="margin-top: 8.5px;" size=80 value='<?php echo $row["address"]?>'><br>	            
		        </div>
		</div>

		<div id="changepass" class="tabcontent">
			<form action=passupdate.php method=post onsubmit='return (cpass("<?php echo $nama?>")&&checkretype());'>
				<div class="label1">
					<p>Old Password:</p>
					<p>New Password:</p>
					<p>Retype Password:</p>
					<button class='btn btn-primary btn-block' type=submit">Update</button>
				</div>

				<div class="info-label1">
					<p><input id="opass" type=password name=opass style="margin-top: 10px;"></p>
					<p><input id="npass" type=password name=npass style="margin-top: 10px;"></p>
					<p><input id="rpass" type=password name=rpass style="margin-top: 10px;"></p>
                </div>
			</form> 
		</div>		
	</div>
</div>

<script src="../vendor/jquery/jquery.js"></script>

<script src="../vendor/jquery/jquery-confirm.js"></script>

<script>
function openCity(evt, cityName) 
{
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>

<script type="text/javascript">
function cupdate(nama)
{
    var uname=nama;
	var email = document.getElementById('mail').value;
	var fname = document.getElementById('fulln').value;
	var job = document.getElementById('kerja').value;
	var phone = document.getElementById('nombor').value;
	var gender = document.getElementById('sex').value;
	var hobby = document.getElementById('hobi').value;
	var address = document.getElementById('alamat').value;

	$.confirm(
    {   	
        title: 'Warning!',
        content: 'Are you sure you want to update?',
        theme: 'dark',
        type: 'purple',
        draggable: true,
        buttons: 
        {
            'confirm': 
            {
                text: 'Proceed',
                btnClass: 'btn-blue',
                action: function () 
                {
                    $.ajax(
					{
					  method: "POST",
					  url: "infoupdate.php",
					  data: {uname:uname, email:email, fname:fname, job:job, phone:phone, gender:gender, hobby:hobby, address:address}
					}).done(function()
					{
					  alert("User has been updated");
					  window.location.replace("profile.php");	  
					})
					 
                }
            },
            cancel: function () 
            {
                
            },
        }         
    });
}

function cpass(nama)
{
    var flag = false;
    var uname = nama;
    var opass = document.getElementById('opass').value;
    var npass = document.getElementById('npass').value;
    $.ajax(
    {
        async: false,
        method: "POST",
        url: "checkpass.php",
        data: {uname:uname, opass:opass, npass:npass}
    }).done(function(count)
    {
        if (count > 0)
        {
            flag = true;
        }
        else
        {
            $.alert({
                title: 'Warning!',
                content: 'Old Password is not the same',
                theme: 'dark',
                type: 'purple',
            });
            flag = false;
        }
    })
    return flag;    
}

function checkretype()
{
    var npass = document.getElementById('npass').value;
    var rpass = document.getElementById('rpass').value;

    if(npass!=rpass)
    {
        $.alert({
                title: 'Warning!',
                content: 'Retype Password is not the same as New Password!',
                theme: 'dark',
                type: 'purple',
        });
        return false;
    }
    else
        return true;
}

</script>

</body>

</html>