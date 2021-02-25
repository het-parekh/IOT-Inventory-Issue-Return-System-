<?php
include "DB.php";
if($con){
    $same_email_query = mysqli_query($con,'SELECT email from admin');
    while($row = mysqli_fetch_assoc($same_email_query)){
        if($row === $_POST['email']){
            echo "<script>alert('Email already exists...please try again')</script>";
            echo'<script>location.href="../manage_users.php"</script>';
        }
    }
    
    if(isset($_POST['password']) && isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $profile_photo = $_FILES['profile_photo']["tmp_name"];
        $profile_photo_path = str_replace('\\','/',$profile_photo);
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $query = mysqli_query($con,"INSERT INTO admin(user_name,profile_photo,role,email,Password) VALUES('$username',LOAD_FILE('$profile_photo_path'),'$role','$email','$hashed_password')");

    }
    
    if(isset($_POST['edit_username'])){
        
        $username = $_POST['edit_username'];
        $email = $_POST['email'];
        $role = $_POST['edit_role'];
        
        if($_FILES['edit_profile_photo']['tmp_name']){
            $profile_photo = $_FILES['edit_profile_photo']["tmp_name"];
            $profile_photo_path = str_replace('\\','/',$profile_photo);
            echo"<script>alert('$profile_photo_path')</script>";
            $query = mysqli_query($con,"UPDATE admin SET user_name='$username',role='$role',email ='$email',profile_photo = LOAD_FILE('$profile_photo_path') WHERE email = '$email' ");

        }
        else{
            $query = mysqli_query($con,"UPDATE admin SET user_name='$username',role='$role',email ='$email' WHERE email = '$email' ");
        }

        
        echo'<script>location.href="../manage_users.php"</script>';
    }


    if (isset($_POST["users_to_delete"])){
        $users_to_delete = json_decode($_POST["users_to_delete"]);

        foreach ($users_to_delete as $user) {
            $sql= mysqli_query($con,"DELETE FROM admin where email = '$user' ");
        }
    }
}
else{
    echo "connection not possible. Check your network.";
}
?>