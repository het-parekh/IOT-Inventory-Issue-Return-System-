<?php
    if(isset($_COOKIE['username'])){
        echo"<script>location.href='dashboard-new.php'</script>";        
    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 	<link rel="stylesheet" type="text/css" href="./includes/style.css">
	 <script type="text/javascript" rel="stylesheet" src="./js/main.js"></script>
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	 
 </head>
<body>
	<style>
	body{
		overflow-x:hidden;
		background-color:rgb(245,245,245);
	}
	.card-header{
		background-color:rgb(200,200,200);

	}
	
	</style>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
    <?php 
            //include_once("./templates/header.php"); ?>
	<br/><br/>
	<div class="container">
		<div class="card  border-dark mb-3 mx-auto" style="width: 20rem;">
        <!-- <div class="card border-dark mb-3" style="width: 20rem;"> -->

        <div class="card  border-dark mb-3">
        <h5 class="card-header" style='text-align:center;'>
                IOT Inventory System
        </div>
		  <img class="card-img-top mx-auto" style="width:60%;" src="images/logo_2.png" alt="Somaiya Icon">
		  <div class="card-body">
		    <form action='loginpro7.php' method="POST">
			  <div class="form-group"></br>
			    <label for="exampleInputEmail1"><b>Email address</b></label>
			    <input required type="email" class="form-control" name="email" id="log_email" placeholder="Enter email">
			    <small id="e_error" class="form-text text-muted">We'll never share your email with anyone else.</small>
			  </div>
			  <div class="form-group">
			    <label for="exampleInputPassword1"><b>Password</b></label>
			    <input required type="password" class="form-control" name="password" id="log_password" placeholder="Password">
			  	<small id="p_error" class="form-text text-muted"></small>
			  </div>
			  <Button type="submit" class="btn btn-outline-dark" name='click'><i class="fa fa-lock">&nbsp;</i>Login</Button>
			
		 </div>
		  <div class="card-footer"><a href="passwordreset.php">Forget Password ?</a></div>
		</div> 
	</div>
		</form>
		<div id="footer-section"></div>
</body>
</html>
<?php
if(isset($_POST['click'])){
$name=$_POST['email'];
$password=$_POST['password'];
include 'includes/DB.php';
include 'includes/environment.php';
if($con){
   $query= mysqli_query($con,"SELECT Password FROM admin WHERE email='$name'");
        if(mysqli_num_rows($query)>0){
        $row=mysqli_fetch_array($query);
          if(password_verify($password,$row[0])){
			$encryption = openssl_encrypt($name, $ciphering, 
            $encryption_key, $options, $encryption_iv); 
            setcookie('username',$encryption,time()+60*60*24*30);
            echo"<script>location.href='dashboard-new.php'</script>";
          }
          else{
			echo "<script>swal({
				title: 'Error',
				text: 'incorrect password',
				type: 'error'
			  });</script>"; 
            
         }
		} else{
			echo "<script>swal({
				title: 'Error',
				text: 'email Does not exist',
				type: 'error'
			  });</script>"; 
            
        }
}
else{
    echo "connection unsucessful";
}

}
?>


