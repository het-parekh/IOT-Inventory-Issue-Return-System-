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
      $user_data_obj = mysqli_query($con,"SELECT * from admin");
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

  
  
  <script  src="./js/add_user.js"></script>
</head>

<script>
	 $(function(){
  $("#header").load("header.html"); 
  $("#footer-section").load("footer.html")
  
});
</script>
<body>
  <div id="header"></div>
  <div>
    <div class="contain_table">
        <div class="fu-btn">
        <button id="delete_user" class='add-users-btn btn btn-outline-danger btn-lg '>
            Delete Selected Users&nbsp; <i class='fa fa-minus-circle'></i>
        </button>  &nbsp;&nbsp;&nbsp;  
        <button id="add_user" data-toggle="modal" data-target="#add_user_modal" class='add-users-btn btn btn-outline-success btn-lg '>
            Add User&nbsp; <i class='fa fa-plus'></i>
            </button>

        
        </div>
      
      <table>
        <tr>
            <th>Username</th>
            <th>Profile Photo</th>
            <th>Email</th>
            <th>Role</th>
            <th>Action</th>
        </tr>
        <?php 
        if(mysqli_num_rows($user_data_obj)>0){
            while($row = mysqli_fetch_assoc($user_data_obj)){
        ?>
        <tr>
            <td> <?php echo $row['user_name']; ?> </td>
            <?php $imageData = "data:image/jpeg;base64,".base64_encode($row['profile_photo']); ?>
            <td><img style="width:100px;height:100px;" src = <?php echo $imageData;?> alt="Profile Photo"/></td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <?php echo $row['role']; ?> </td>
            <?php if ($row['email'] !== $name){?>
            <td> <input type="checkbox" id="delete <?php echo $row['email']; ?>" name="del" ></td>
            <?php
            }
            else{
              echo "<td style='color:green'>CURRENT USER</td>";
            }
            ?>  
        </tr>
        <?php }} ?>
      </table>
  
    </div>
  </div>
    <div class="modal" id="add_user_modal" tabindex="-1" role="dialog">
    
  </div>

  <div id="footer-section"></div>
</body>


<?php
else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif?>