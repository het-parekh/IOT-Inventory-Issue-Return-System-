<?php
if(isset($_COOKIE['username'])):{
    $name=$_COOKIE['username'];
}
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>SEARCH COMPONENTS</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	</head>
	<style>
				.topnav {
			background-color:white;
			overflow: hidden;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
		float: left;
		color: black;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
		font-size: 17px;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
		background-color: #ddd;
		color: black;
		}

		/* Add a color to the active/current link */
		.topnav a.active {
		background-color: grey;
		color: black;
		}

		/* Right-aligned section inside the top navigation */
		.topnav-right {
		float: right;
		}   

		.dropdown{
		margin-top: 30px ;
		text-align: center;
		}

	</style>
	<body>
		<div class="topnav">
			<a class="active" href="#home">IOT Inventory Management</a>
			<a href="#">Create group</a>
			<a href="#">Issue/Return</a>
			<a href="#">Components</a>
			<a href="#">Log</a>
			<div class="topnav-right">
			<a href="#">LOGOUT</a>
			
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
			url:"fetchother.php",
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




