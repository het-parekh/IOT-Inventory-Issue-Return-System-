<?php
include 'includes/environment.php';
include "includes/DB.php";
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
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<link rel="stylesheet" type="text/css" href="./css/group.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
 <script>
	 $(function(){
	$("#header").load("header.html"); 
});
</script>
<style>
	body{
		background-image: url(./images/2.jpg);
		margin-bottom:15px;
	}
	.card-body:hover {
		box-shadow: 0 0 61px rgba(63,63,63,.22); 
		}
	.jumbotron:hover {.j
		box-shadow: 0 0 61px rgba(63,63,63,.22); 
		}
</style>
<body>
	<div id="header"></div>
	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto" style="height:100%">
				  <img class="card-img-top mx-auto" style="width:60%;" src="images/user.png" alt="Card image cap">
				  <div class="card-body">
				    <h4 class="card-title"><b>Profile Info</b></h4>
				  <?php echo"Mr.$result"?>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
				    <!-- <p class="card-text">Last Login : xxxx-xx-xx</p> -->
				    <a href="GroupForm.php" class="btn btn-outline-primary"><i class="fa fa-edit">&nbsp;</i>Create Group</a>
				    <a href="modify.php" class="btn btn-outline-primary"><i class="fa fa-edit">&nbsp;</i>Modify Group</a>
					<a href="showGroup.php" style="self-align:right;margin-top:15px;width:95%" class="btn btn-outline-success">Display All Groups&nbsp;<i class="fa fa-eye"></i></a>
					<a href="logout.php" style="self-align:right;margin-top:15px;width:95%" class="btn btn-outline-danger">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1 align="center"><b>Welcome Admin</b></h1></br>
					<div class="row">
						<div class="col-sm-6">
							<iframe style="pointer-events: none;" src="https://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body" border-radius:24px>
						        <h4 class="card-title"><b>New Issue/Return</b></h4>
						        <p class="card-text">Here you can create new issues/returns</p>
						        <a href="Issue_and_Return.php" class="btn btn-outline-primary">New Issue</a>
						      </div>
						    </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<p></p>
	<p></p>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
						<div class="card-body" border-radius:24px>
						<h4 class="card-title"><b>Department</b></h4>
						<p class="card-text">Here you can manage student of which department</p>
						<a href="display.php" class="btn btn-outline-primary">I.T</a>
						<a href="displayother.php" class="btn btn-outline-primary">Others</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body" border-radius:24px>
						<h4 class="card-title"><b>Log</b></h4>
						<p class="card-text">Here you can manage changes made to database</p>
						<a href="log.php" data-target="#form_brand" class="btn btn-outline-primary">View</a>
						<!-- <a href="manage_brand.php" class="btn btn-primary">Manage</a> -->
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card" style="height:100%">
						<div class="card-body" border-radius:24px>
						<h4 class="card-title"><b>Components</b></h4>
						<p class="card-text">Here you can view components</p>
						<a href="search.php" data-target="#form_products" class="btn btn-outline-primary">View</a>
						<!-- <a href="manage_product.php" class="btn btn-primary">Manage</a> -->
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<script type="text/javascript" src="./js/main.js"></script>
 </head>
<body>
	<!- Navbar --> 
	
	


</body>
</html>


</body>
</html>
<?php else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>
