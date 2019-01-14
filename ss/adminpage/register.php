<?php

	require("../config.php");

	$conn = mysqli_connect($host,$admin,$ps,$db);
	$q="select * from user where approval = 1";
	$result = mysqli_query($conn, $q);
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="../vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/stylish-portfolio.css" rel="stylesheet">

    <link href="../css/jquery-confirm.css" rel="stylesheet">

    <link href="../css/jquery-modal.css" rel="stylesheet">

<style>

body {
  font-family: "Lato", sans-serif;
  background-image: url("../img/bgwoi.jpg");
}

table{
	margin-left: 50px;
}

th{
	background-color: yellow;
	margin-left: 10px;padding-left: 10px;
}

tr{
	background-color: #f9b2cb;
}

td{
	margin-left: 10px;padding-left: 10px;
}

#myInput{
	margin-left: 50px;
}

.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: black;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
}

.sidenav a:hover {
  color: #f1f1f1;
  background-color: grey;
}

.main {
  margin-left: 160px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<!-- Sidebar Navigation bar -->
<div class="sidenav">
  <a href="../admin.php">Home</a>
  <a href="#">View User</a>
  <a href="pending.php">Pending User</a>
  <a href="logout.php">Logout</a>
</div>

<!-- Main body beside sidebar -->
<div class="main">
  <h1 class="mb-1" style="margin-top: 20px;margin-left: 50px;">List of Registered Users + Info.</h1><br><br><br>
  <!-- This one line is for Filter -->
  <input type="text" id="myInput" onkeyup="myFilter()" placeholder="Search for names.." title="Type in a name"><br><br>
  <?php
	  echo "<table border=4 id='myTable'>";
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
  ?>
</div>

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

<!-- Import Jquery-->
<script src="../vendor/jquery/jquery.js"></script>

<!-- Import Jquery Confirm-->
<script src="../vendor/jquery/jquery-confirm.js"></script>

<!-- Import Jquery Modal-->
<script src="../js/jquery-modal.js"></script>

<!-- Confirmation box for deleting user-->
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

<!-- Filter Table Function -->
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

</body>

</html> 
