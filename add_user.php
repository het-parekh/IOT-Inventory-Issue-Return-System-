<?php
include "includes/DB.php";
include "includes/environment.php";
if(isset($_COOKIE['username'])):{
    $name=openssl_decrypt ($_COOKIE['username'], $ciphering,  
        $encryption_key, $options, $encryption_iv); 
        $get_user_role_obj = mysqli_query($con,"SELECT role from admin where email ='$name' ");
        if(mysqli_num_rows($get_user_role_obj )>0){
          $get_user_role = mysqli_fetch_assoc( $get_user_role_obj)["role"];
          if("ADMIN"!==$get_user_role){
            echo'<script>location.href="dashboard-new.php"</script>';
            }
            $get_all_roles = mysqli_query($con,"SELECT role from admin");
            $get_all_roles1= mysqli_fetch_assoc($get_all_roles);
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  <link rel="stylesheet" href="css/add_user.css" />
  
  
  <script  src="./js/manage_users.js"></script>
</head>

<script>
	 $(function(){
  $("#header").load("header.html"); 
  $("#footer-section").load("footer.html")
});
</script>
<body>
  <div id="header"></div>
  <div class="main-content">
  <form id="add_user_form" method="POST" action="includes/manage_users_db.php" enctype="multipart/form-data">
    <h1 style="color:brown;" class="text-center pt-8">ADD USER</h1>

    <label>
      <input type="email" class="input" required name="email" placeholder="ENTER EMAIL*"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

    <label>
      <input type="file"  id="image" accept ="image/*" name="profile_photo" class="input"   />
      <small style="color:red;padding:0px;margin-top:-5px;float:left;margin-left:8px;">File Size should not exceed 2 MB*</small>
    </label>

    <label>
        <input type="text" class="input" required name="username" placeholder="ENTER USERNAME*"/>
        <div class="line-box">
          <div class="line"></div>
        </div>
    </label>

       
        <select name="role" id="role" required style="color:#787878">
        <option selected disabled value="" >---SELECT ROLE---</option>
        <option>ADMIN</option>
        <option>ADVANCED USER</option>
        </select>
        
        <br/>

    <label>

        <input type="password" required class="input" id="password" name="password" placeholder="ENTER PASSWORD*"/>
        <div class="line-box">
          <div class="line"></div>
          <span class="" id="err"></span>
        </div>
    </label>

    <label>
      <input type="password" required class="input" id="confirm" name="confirm" placeholder="CONFIRM PASSWORD*"/>
      <div class="line-box">
        <div class="line"></div>
        <span class="" id="err2"></span>
      </div>
    </label>

    <button type="button" id="sumbit_user" >SUBMIT</button>
  </form>
  </div>


  <div id="footer-section"></div>
</body>

<?php
else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif?>