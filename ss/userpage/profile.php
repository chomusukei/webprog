<?php
    session_start();

    if(!isset($_SESSION["uname"]))
    {
        header("Location:../login.php");
    }
    else
        $nama=$_SESSION["uname"];
        require("../config.php");

        $conn = mysqli_connect($host,$admin,$ps,$db);
        $q="select * from user where username='$nama'";
        $result = mysqli_query($conn, $q);
        $row=mysqli_fetch_array($result);
?>
    
<html>
<head>

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

    .down
    {
        margin-left: 23.5%;
        border-radius: 25px;
        border: 5px solid pink;
        float:left;
        color: black; 
        font-family: 'Open Sans','arial'; 
        font-size: 16px;
        letter-spacing: 0.8px;
        line-height: 30px;
        background-color: white;
    }

    .profile-pic 
    {
        margin-top: 50%;
        margin-left: 10%;
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
        <img class="profile-pic" src='<?php echo $row["picpath"]?>'>
  </div>

  <div class="info">

    <?php 
        if($row["approval"]==1)
            {?>
        <div class="label1">           
            Username: <br>
            Email: <br>
            Fullname: <br>
            Occupation: <br>
            Phone number: <br>
            Gender: <br>
            Hobby: <br>
            Address: <br>
            Approval: <br>          
            <button class="btn-primary" type="button" style="margin-top: 100%"; onclick="location.href='editprofile.php';">Edit Profile</button>
        </div>
        <div class="info-label1">
            <?php                
                echo $row["username"]."<br>";
                echo $row["email"]."<br>";
                echo $row["fullname"]."<br>";
                echo $row["job"]."<br>";
                echo $row["phone"]."<br>";
                echo $row["gender"]."<br>";
                echo $row["hobby"]."<br>";
                echo $row["address"]."<br>";
                if($row["approval"]==0)
                {
                    echo"<font color=red>Your account is not yet approved</font>";
                }
                else
                {
                    echo"<font color=green>Your account has been approved</font>";
                }
            ?>
        </div><?php }?>

    <?php
        if($row["approval"]==0)
        { ?>
            <div class="label1"> 
                Approval: <br>
            </div>
            <div class="info-label1">
            <?php
                echo"<font color=red>Your account is not yet approved</font>"; 
            } ?></div>
  </div>
</div>
<div class="down">
    <div class="tab">
        <button class="btn-primary" onclick="location.href='../home.php';">Back to Homepage</button>
    </div>
</div>  
</body>

</html>