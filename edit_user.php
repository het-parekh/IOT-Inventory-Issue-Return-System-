<?php
include "includes/DB.php";
include 'includes/environment.php';
if(isset($_COOKIE['username'])):{
    $name=openssl_decrypt ($_COOKIE['username'], $ciphering,  
        $encryption_key, $options, $encryption_iv); 
  $get_user_role_obj = mysqli_query($con,"SELECT role from admin where email ='$name' ");
	if(mysqli_num_rows($get_user_role_obj)>0){
    $get_user_role = mysqli_fetch_assoc( $get_user_role_obj)["role"];
        if("ADMIN"!==$get_user_role){
          echo'<script>location.href="dashboard-new.php"</script>';
      }
	}else{
		echo "<script>location.href='logout.php'</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link rel="stylesheet" href="css/add_user.css" />
  
  
  <script  src="./js/manage_users.js"></script>
</head>

<script>
	 $(function(){
	$("#header").load("header.html"); 
});
</script>
<body>
  <div id="header"></div>
  <div class="main-content" >

<form id="add_user_form" method="POST" action="includes/manage_users_db.php" enctype="multipart/form-data">
    <h1 style="width:350px;color:brown;" class="text-center pt-8">EDIT USER
    <button onClick="location.href='passwordreset.php'" class="btn btn-info btn-lg float-right" type="button" id="pass_reset_btn" >Reset My Password &nbsp;<i style="color:white" class="fa fa-arrow-right" aria-hidden="true"></i></button>
    </h1>

    <label>
      <input type="email" value="<?php echo $_POST['email'] ?>" class="input" required name="email" placeholder="ENTER EMAIL*"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

    <label>
      <input type="file" id="image" accept ="image/*" name="edit_profile_photo" class="input"   />
      <small style="color:red;padding:0px;margin-top:-5px;float:left;margin-left:8px;">File Size should not exceed 2 MB*</small>
    </label>

    <label>
        <input type="text" id='ad' value="<?php echo $_POST['username'] ?>" class="input" required name="edit_username" placeholder="ENTER USERNAME*"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

        <?php if($get_user_role == "ADMIN"){ ?>

        <select value="<?php echo $_POST['role'] ?>" name="edit_role" id="role" required style="color:#787878">
        <option disabled value="" >---SELECT ROLE---</option>
        <option>ADMIN</option>
        <option>ADVANCED USER</option>
        </select>
        <?php } ?>
       
        <br/>
        <br/>
        <br/>
    <label class='mr-auto'>
          <button type="button"  id="submit_user_edit" >SUBMIT</button>
    </label>   
  </form>
  </div>

</body>

<?php
else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif?>