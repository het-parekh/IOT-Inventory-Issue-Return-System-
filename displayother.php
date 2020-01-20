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
	<body>
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




