<?php
if(isset($_COOKIE['username'])):{
    $name=$_COOKIE['username'];
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SEARCH COMPONENTS</title>
		<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
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
		.desktop{
			float:left;
			padding-top:8px;
			margin-Bottom:8px;
			padding-left:15px;
			height:70px;
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
	<div class="topnav">
		<img src="https://kjsieit.somaiya.edu/assets/kjsieit/images/Logo/kjsieit-logo.svg" alt="KJSIEIT" class="desktop">
		<img src="https://kjsieit.somaiya.edu/assets/arigel_general/img/homepage/Trust.svg" alt="" class="trust">
			<div class="logout"><a href="logout.php">LOGOUT</a></div>
			<a href="search.php">Components</a>
			<a href="log.php">Log</a>
			<a href="dashboard-new.php">Dashboard</a>
			<a href="Issue_and_Return.php">Issue/Return</a>
			<a href="GroupForm.php">Create group</a>

		</div>
		<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center"> Issue Details Of Other Department </h2><br />
			<div class="form-group">
				<div class="input-group" style='width:100%'>
					<input type="text" name="search_text" id="search_text" placeholder="Search by Component ID" class="form-control" />
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


<script>
$(document).ready(function(){
	load_data();
	function load_data(query)
	{
		$.ajax({
			url:"includes/fetchother.php",
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
<?php
else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif?>




