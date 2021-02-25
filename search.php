<?php
include "includes/DB.php";
include "includes/environment.php";
if(isset($_COOKIE['username'])):{
    $name=openssl_decrypt ($_COOKIE['username'], $ciphering,  
        $encryption_key, $options, $encryption_iv); 
	$query = "SELECT user_name FROM admin WHERE email='$name'";
	$data=mysqli_query($con,$query);
	if(mysqli_num_rows($data)>0){
		$result=mysqli_fetch_assoc($data)['user_name'];
	}else{
		echo "<script>location.href='logout.php'</script>";
	}
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
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
		
	</head>
	<style>
		#delete:hover{
			color:#fff!important;
		}
	</style>
	<script>
	 	 $(function(){
	$("#header").load("header.html"); 
	$("#footer-section").load("footer.html")

});
</script>
	<body>
	<div id="header"></div>
	<div class="main-content"style="margin-top:-370px; background:#fff; width:80%; position:relative; left:50%; transform:translate(-50%); box-shadow:4px 8px 16px rgba(0,0,0,.4); border-radius:10px; padding:10px 20px;" >

		<div class="container">
			<br />
			<br />
			<br />
			<h2 align="center" style="font-family:'Garamond','Times New Roman'">COMPONENT&nbsp&nbspLIST</h2><br />
			<div class="form-group">
				<div class="input-group mb-3">
					<input type="text" name="search_text" id="search_text" placeholder="Search by Component Name / Size / Price" class="form-control" />
					<a style="margin-left:1%" href="add-component.php" class="btn btn-outline-primary">ADD Products</a>
					<a style="margin-left:1%;color:#ff3333" id="delete" name="save_value" class="btn btn-outline-danger">Delete Products</a>
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
	</div>

		<div id="footer-section"></div>
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


	$(document).on('click', '#delete', function(){
        var value = [];
        $(':checkbox:checked').each(function(i){
          value[i] = $(this).val();
        })
		var jsonString = JSON.stringify(value);
		if(value.length>0){
				if(window.confirm("Are you sure you want to remove this ?")){
					$.ajax({
						url:"./includes/remove_from_database.php",
						type:"post",
						data:{
							message_id:jsonString
						},
						success:function(response){
							load_data();
						},
						error:function(err){
							console.log(err);
						}
				})
			}
		}			
		
		}); 


});
</script>


