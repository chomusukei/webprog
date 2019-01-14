<?php

  require("../config.php");

  $conn = mysqli_connect($host,$admin,$ps,$db);
  $q="select * from user where approval = 1";
  $result = mysqli_query($conn, $q);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <title>
    Admin
  </title>
  <link href="../css/jquery-confirm.css" rel="stylesheet">
  <link href="../css/jquery-modal.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper">
    <div class="sidebar">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red"
    -->
      <div class="sidebar-wrapper">
        <div class="logo">
          <div class="simple-text logo-mini">
            Admin Dashboard
          </div>
        </div>
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard.php">
              <p>Registered User</p>
            </a>
          </li>
          <li>
            <a href="./pendinguser.php">
              <p>Pending User</p>
            </a>
          </li>
          <li>
            <a href="./logout.php">
              <p>Logout</p>
            </a>
          </li>          
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-12">
            <div class="card card-chart" style="padding-bottom: 500px;"">
              <div class="card-header ">
                <div class="row">
                  <div class="col-sm-6 text-left">               
                    <h2 class="card-title">List of Registered User</h2>
                  </div>                 
                </div>
              </div>
              <div class="card-body">
                <div class="chart-area"><font color=white>
                  <!-- Insert data here -->
                  <input type="text" id="myInput" onkeyup="myFilter()" placeholder="Search for names.." title="Type in a name" style="margin-left: 20px;"><br><br><br>
                  <?php
                    echo "<table id='myTable' style='margin-left: 20px;'>";
                    echo "<col width=200>
                        <col width=500>
                        <col width=200>
                        <col width=200>";
                    echo"<th>Name</th>";
                    echo"<th>Email</th>";
                    $i = 0;
                    foreach ($result as $row)
                    {
                      echo"<tr>";
                          $cname = $row["username"];
                          echo"<td id='nama'>".$row["username"]."</td>";
                          echo"<td>".$row["email"]."</td>";
                          echo"<td><button class='btn btn-primary btn-block' onclick=cdelete('$cname')>Delete</button></td>";
                          echo"<td><a class='btn btn-primary btn-block' href='#ex".$i."' rel='modal:open'>View</a></td>";
                    echo"</tr>";
                    $i++;
                    }
                    echo"</table>";
                  ?></font>


                  <?php
                    $i = 0;
                    foreach ($result as $row)
                  {?>
                    <div id="ex<?= $i?>" class="modal">
                        <p><b>Username: </b><?=$row["username"]?></p>
                        <P><b>Email: </b><?=$row["email"]?></P>
                        <P><b>Fullname: </b><?=$row["fullname"]?></P>
                        <P><b>Occupation: </b><?=$row["job"]?></P>
                        <P><b>Phone Number: </b><?=$row["phone"]?></P>
                        <P><b>Gender: </b><?=$row["gender"]?></P>
                        <P><b>Hobby: </b><?=$row["hobby"]?></P>
                        <P><b>Address: </b><?=$row["address"]?></P>
                        </div>
                  <?php $i++; }?>              
                </div>                            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!--   Core JS Files   -->

  <script src="../vendor/jquery/jquery.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="../vendor/jquery/jquery-confirm.js"></script>
  <script src="assets/js/core/jquery-modal.js"></script>
  <!-- Chart JS -->
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/black-dashboard.min.js?v=1.0.0"></script>

  <script>
  function myFilter() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }       
    }
  }
  </script>

<script type="text/javascript"> 
function cdelete(name) 
{
  var nama = name;
    $.confirm(
    {     
        title: 'Warning!',
        content: 'Are you sure you want to delete?',
        theme: 'supervan',
        animation: 'scale',
        closeAnimation: 'scale',
        opacity: 0.5,
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
            async: false,
            method: "POST",
            url: "del_user.php",
            data: {nama: nama}
          }).done(function(count)
          {
            alert("User has been deleted");
            location.reload();    
          })
           
                }
            },
            cancel: function () 
            {
                
            },
        }         
    });
};
</script>

</body>

</html>