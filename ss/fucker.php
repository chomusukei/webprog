<html>
<head>
<link href="css/jquery-confirm.css" rel="stylesheet">
</head>

<body>
	<table border=1>
		<tr>
			<td>Firdaus</td>
			<td>123</td>
			<?php
			$test = "daus";
			echo"<td><button onclick=cdelete('$test')>Delete</button></td>"
			?>
		</tr>
	</table>

<script src="vendor/jquery/jquery.js"></script>

<script src="vendor/jquery/jquery-confirm.js"></script>

<script type="text/javascript">	

function cdelete(name) 
{

    $.confirm(
    {   	
        title: 'Warning!',
        content: 'Are you sure you want to delete?'+name,
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