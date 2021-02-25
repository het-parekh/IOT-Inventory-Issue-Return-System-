<?php
include "DB.php";
if($con){
    if(isset($_POST['username'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $profile_photo = $_FILES['profile_photo']["tmp_name"];
        $profile_photo_path = str_replace('\\','/',$profile_photo);
        $hashed_password = password_hash($password,PASSWORD_DEFAULT);
        $query = mysqli_query($con,"INSERT INTO admin(user_name,profile_photo,role,email,Password) VALUES('$username',LOAD_FILE('$profile_photo_path'),'$role','$email','$hashed_password')");
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