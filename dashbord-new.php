<?php
include_once("./database/constants.php");
//if (!isset($_SESSION["userid"])) {
//	header("location:".DOMAIN."/");
//}
?>
<!DOCTYPE html>
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
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card mx-auto">
				  <img class="card-img-top mx-auto" style="width:60%;" src="user.png" alt="Card image cap">
				  <div class="card-body">
				    <h4 class="card-title">Profile Info</h4>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Vishal/Raza</p>
				    <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
				    <!-- <p class="card-text">Last Login : xxxx-xx-xx</p> -->
				    <a href="#" class="btn btn-primary"><i class="fa fa-edit">&nbsp;</i>Create Group</a>
					<a href="#" class="btn btn-danger"><!-- <i class="fa fa-edit"> -->&nbsp;<!-- </i> -->Logout</a>
				  </div>
				</div>
			</div>
			<div class="col-md-8">
				<div class="jumbotron" style="width:100%;height:100%;">
					<h1>Welcome Admin,</h1>
					<div class="row">
						<div class="col-sm-6">
							<iframe src="http://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

						</div>
						<div class="col-sm-6">
							<div class="card">
						      <div class="card-body">
						        <h4 class="card-title">New Issue/Return</h4>
						        <p class="card-text">Here you can create new issues/returns</p>
						        <a href="new_order.php" class="btn btn-primary">New Issue</a>
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
						<div class="card-body">
						<h4 class="card-title">Department</h4>
						<p class="card-text">Here you can manage student of which department</p>
						<a href="#" data-toggle="modal" data-target="#form_category" class="btn btn-primary">I.T</a>
						<a href="manage_categories.php" class="btn btn-primary">Others</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Log</h4>
						<p class="card-text">Here you can manage changes made to database</p>
						<a href="#" data-toggle="modal" data-target="#form_brand" class="btn btn-primary">View</a>
						<!-- <a href="manage_brand.php" class="btn btn-primary">Manage</a> -->
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
						<div class="card-body">
						<h4 class="card-title">Components</h4>
						<p class="card-text">Here you can view components</p>
						<a href="#" data-toggle="modal" data-target="#form_products" class="btn btn-primary">View</a>
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
	
	<?php
	//Categpry Form
	include_once("./templates/category.php");
	 ?>
	 <?php
	//Brand Form
	include_once("./templates/brand.php");
	 ?>
	 <?php
	//Products Form
	include_once("./templates/products.php");
	 ?>


</body>
</html>


</body>
</html>