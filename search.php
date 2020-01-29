<?php
if(isset($_COOKIE['username'])):{
    $name=$_COOKIE['username'];
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>COMPONENT LIST</title>
		<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
	</head>
	<style>
		.topnav {
			background-color:#f5f5f0;
			overflow: hidden;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
		float: right;
		color:Black;
		text-align: center;
		padding: 20px 16px;
		font-family: 'Lato', sans-serif;
		font-weight:Bold;
		text-decoration: none;
		font-size: 17px;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
		color:#A12023;
		}
		.logout a:hover{
			color:red;
		}

		/* Add a color to the active/current link */
		.topnav a.active {
		background-color: grey;
		color:#A12023;
		}

		/* Right-aligned section inside the top navigation */
		.topnav-right {
		float: right;
		}   

		.dropdown{
		margin-top: 30px ;
		text-align: center;
		}
		.an{
			float:left;
			padding-top:2px;
			margin-Bottom:18px;
			padding-left:8px;
			height:80px;
			width:100x;
		}
		.trust{
			float:right;
			padding-top:8px;
			padding-Right:15px;
			height:70px;
			width:100x;
		}

	</style>
	<body>
	<div class="topnav" style="margin-bottom:0px;padding:0px">
		
		<img src="https://kjsieit.somaiya.edu/assets/arigel_general/img/homepage/Trust.svg" alt="" class="trust">
		
			<a><button type="button" style="cursor:pointer;font-size:14px;padding:6px" class="btn btn-outline-danger">LOGOUT</button></a>
			<a href="search.php">Components</a>
			<a href="log.php">Log</a>
			<a href="Issue_and_Return.php">Issue/Return</a>
            <a href="GroupForm.php">New Group</a>
            <a style="padding-right:0px;margin:0px">
            <a class="nav-link dropdown-toggle" style="padding-right:0px;margin:0px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Issue Details
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="display.php">IT</a>
                <a class="dropdown-item" href="displayother.php">Other</a>    
                <div class="dropdown-divider"></div>
            </div>

             </a>
			<a href="dashboard-new.php">Dashboard</a>
			<div class="an"><a href="dashboard-new.php" class="an" ><img style="height:60px;width:320px" src="https://kjsieit.somaiya.edu/assets/kjsieit/images/Logo/kjsieit-logo.svg" alt="KJSIEIT" class="desktop"></a></div>
		</div>
		<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center" style="font-family:'Garamond','Times New Roman'">COMPONENT&nbsp&nbspLIST</h2><br />
			<div class="form-group">
				<div class="input-group mb-3">
					
					<input type="text" name="search_text" id="search_text" placeholder="Search by Component Name / Size / Price" class="form-control" />
				</div>
			</div>
			<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
	</body>
</html>
<?php
else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>



<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"includes/fetch.php",
			method:"post",
			data:{query:query},
			success:function(data)
			{
				$('#result').html(data);
			}
		});
	}
	
	$('#search_text').keyup(function(){
		var search = $(this).val();
		if(search != '')
		{
			load_data(search);
		}
		else
		{
			load_data();			
		}
	});
});
</script>


