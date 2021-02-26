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
  <div class="main-content" style="margin-top:-320px; background:#fff; width:80%; position:relative; left:50%; transform:translate(-50%); box-shadow:4px 8px 16px rgba(0,0,0,.4); border-radius:10px; padding-bottom:30px; overflow:auto;">

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
      
      <table id="update_user_table">
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
            <td>
            <?php $imageData = "data:image/jpeg;base64,".base64_encode($row['profile_photo']); 
              
              if ($row['profile_photo']!=false){
            ?>
            <div class="frame frame--70-50 frame--ikea frame--thin frame--silver frame--throne">
              <div class="pic pic--throne">
                <img  src=<?php echo $imageData;?> alt="Profile Photo"/>
              </div>
            </div>
            <?php }else{ ?>
              <img  src=<?php echo $imageData;?> alt="Profile Photo"/>
              <?php } ?>
            </td>
            <td> <?php echo $row['email']; ?> </td>
            <td> <?php echo $row['role']; ?> </td>
            <?php if ($row['email'] !== $name){?>
            <td> <input type="checkbox" id="delete <?php echo $row['email']; ?>" name="del" > 
            <?php if ($get_user_role == "ADMIN") { ?>
            | <button data-toggle="modal" data-target="#edit_user_modal"  value="<?php echo $row['user_name'].',',$row['email'].',',$row['role'] ?>" style="color:white;background-color:#1a75ff;font-size:12px;" class='edit_user_btn btn btn-primary py-0 px-1'>Edit <i class="fa fa-pencil-square-o" ></i></button></td>
            <?php
            }
            }
            else{
              echo "<td style='color:green;margin-right:-10px'>CURRENT USER";
              if ($get_user_role == "ADMIN") {
            }
            ?>
            | <button data-toggle="modal" data-target="#edit_user_modal"  value="<?php echo $row['user_name'].',',$row['email'].',',$row['role'] ?>" style="color:white;background-color:#1a75ff;font-size:12px;" class='edit_user_btn btn btn-primary py-0   px-1'>Edit <i class="fa fa-pencil-square-o" ></i></button></td>
            <?php } ?>
           
        </tr>
        <?php }} ?>
      </table>
  
    </div>
  </div>
    <div class="modal" id="add_user_modal" tabindex="-1" role="dialog">
    
  </div>
    <div class="modal" id="edit_user_modal" tabindex="-1" role="dialog">
    
  </div>
  </div>

  <div id="footer-section"></div>
</body>


<?php
else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif?>
