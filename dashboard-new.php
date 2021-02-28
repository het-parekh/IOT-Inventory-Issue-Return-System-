<?php
include "includes/DB.php";
include "includes/environment.php";
if(isset($_COOKIE['username'])):{
    $name=openssl_decrypt ($_COOKIE['username'], $ciphering,  
        $encryption_key, $options, $encryption_iv); 
		$data=mysqli_query($con,"Select user_name from admin where email='$name'");
	if(mysqli_num_rows($data)>0){
		$result=mysqli_fetch_assoc($data)['user_name'];
		$get_user_role_obj = mysqli_query($con,"SELECT role from admin where email='$name' ");
		$get_user_role = mysqli_fetch_assoc( $get_user_role_obj)["role"];
		$ask_user = ($get_user_role=='ADMIN')?"manage users":"";
		$user_profile_obj = mysqli_query($con,"SELECT profile_photo from admin where email='$name' ");
		$user_profile_encoded = mysqli_fetch_assoc($user_profile_obj)['profile_photo'];
		$user_profile = "data:image/jpeg;base64,".base64_encode($user_profile_encoded);
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
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	 
 	<script type="text/javascript" src="./js/main.js"></script>
	 <script src="./js/log.js"></script>

 </head>
 <script>
	 $(function(){
	$("#header").load("header.html"); 

});
</script>
<style>
	body{
		background-image:url('./images/back.jpg');
		font-family:lato,Arial,Georgia,;
		font-size:17px;
	}
	h1{
		font-family:Times,Georgia,sans-serif ;
	}
	.card-body:hover {
		box-shadow: 0 0 61px rgba(63,63,63,.22); 
		}
	.jumbotron:hover {
		box-shadow: 0 0 61px rgba(63,63,63,.22); 
		}
	.add_user{
		color:blue!important;
		cursor:pointer;
		}
	.add_user:hover{
		text-decoration:underline!important;
	}
	.card-dashboard{
		box-shadow:4px 8px 16px rgba(0,0,0,.4);
		background-color:#fff;
		position:relative;
		z-index:1;
		overflow:hidden;
	}
	.card-dashboard::before{
		content:'';
		position:absolute;
		top:0;
		left:0;
		right:0;
		height:100%;
		width:100%;
		background-image:linear-gradient(to right, #00308F,#00308F);
		clip-path:polygon(100% 0, 70% 0, 100% 40%);
	}
	.card-dashboard > *{
		position:relative;
		z-index:100;
	}
	.prof-dash::after,
	.prof-dash::before{
		content:'';
		width:0;
	}
	.full-main-content{
		margin-top:-370px;
	}
	.btn{
		box-shadow: 4px 8px 16px rgba(0,0,0,.15);
	}
</style>
<body>
	<div class="bg-clip"></div>
	<div id="header"></div>
	<br/><br/>
	<div class="full-main-content">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="card mx-auto card-dashboard prof-dash" style="height:100%;">
						<img class="card-img-top mx-auto" style="width:60%;height:200px" src="<?php echo ($user_profile!=true)?$user_profile:"images/user.png"; ?>" alt="Profile Photo">
						<div class="card-body">
							<h4 class="card-title"><b>PROFILE INFO</b></h4>
						<?php echo"Mr.$result"?>
							&nbsp;<p style="margin-right:100px;" class="card-text badge badge-secondary"><i class="fa fa-user ">&nbsp;</i><?php echo $get_user_role ?></p>
							<!-- <p class="card-text">Last Login : xxxx-xx-xx</p> -->
							<a href="GroupForm.php" class="btn btn-outline-primary"><i class="fa fa-edit">&nbsp;</i>Create Group</a>
							<a href="modify.php" class="btn btn-outline-primary"><i class="fa fa-edit">&nbsp;</i>Modify Group</a>
						<a href="showGroup.php" style="self-align:right;margin-top:15px;width:95%" class="btn btn-outline-success">Display All Groups&nbsp;<i class="fa fa-eye"></i></a>
						<a href="logout.php" style="self-align:right;margin-top:15px;width:95%" class="btn btn-outline-danger">Logout&nbsp;<i class="fa fa-sign-out"></i></a>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="jumbotron card-dashboard" style="width:100%;height:100%;">
					<h1 align="center"><b>WELCOME <?php echo $get_user_role ?></b></h1></br>
						<div class="row">
							<div class="col-sm-6">
								<iframe style="pointer-events: none;" src="https://free.timeanddate.com/clock/i616j2aa/n1993/szw160/szh160/cf100/hnce1ead6" frameborder="0" width="160" height="160"></iframe>

							</div>
							<div class="col-sm-6">
								<div class="card" style="box-shadow:4px 8px 16px rgba(0,0,0,.2);">
										<div class="card-body" border-radius:24px>
											<h4 class="card-title"><b>New Issue/Return</b></h4>
											<p class="card-text">Issue new components or Return issued components</p>
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
					<div class="card card-dashboard">
							<div class="card-body" border-radius:24px>
							<h4 class="card-title"><b>Department</b></h4>
							<p class="card-text">View list of components given to Student of I.T as well as other department</p>
							<a href="display.php" class="btn btn-outline-primary">I.T</a>
							<a href="displayother.php" class="btn btn-outline-primary">Others</a>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-dashboard">
							<div class="card-body" border-radius:24px>
							<h4 class="card-title"><b>Log</b></h4>
							<p class="card-text">Log table for issued and returned components</p>
							<a href="log.php" data-target="#form_brand" class="btn btn-outline-primary">View</a>
							<!-- <a href="manage_brand.php" class="btn btn-primary">Manage</a> -->
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="card card-dashboard" style="height:100%">
							<div class="card-body" border-radius:24px>
							<h4 class="card-title"><b>Components</b></h4>
							<p class="card-text">List of available components in department</p>
							<a href="search.php" data-target="#form_products" class="btn btn-outline-primary">View</a>
							<!-- <a href="manage_product.php" class="btn btn-primary">Manage</a> -->
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container mt-3 mb-4">
		<div class="row">
			<div class="col-md-4">
				<div class="card card-dashboard">
						<div class="card-body" border-radius:24px>
							<h4 class="card-title"><b>View Damaged List</b></h4>
							<p class="card-text">Add or view list of damaged components. Mark them as repaired if they have been fixed.</p>
							<a href="damagedComponents.php" class="btn btn-outline-danger">Damaged Components</a>
						</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card card-dashboard">
						<div class="card-body" border-radius:24px>
							<h4 class="card-title"><b>Manage Users</b></h4>
							<p class="card-text">View complete details of all the users of this app. You can add, remove and edit other users if you are an admin.</p>
							<a href="manage_users.php" class="btn btn-outline-primary">Manage Users</a>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer-section"></div>

</body>
</html>


</body>
</html>
<?php else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>
