<?php
$con=mysqli_connect("localhost","root","","inventory");
?>
<?php
session_start();
function result ($query) {
    global $con;
    if ($result = mysqli_query($con, $query)){
        return $result;
    }
  }

function user($email) {
    $query = "SELECT * FROM admin WHERE email='$email'";
    return result($query);
  }
  function update_pass($email,$hash){
    $query="UPDATE admin SET Password='$hash' WHERE email ='$email'";
    return result($query);
  }
  function update_token($code,$email){
    $query="UPDATE admin SET token='$code'WHERE email='$email'";
    return result($query);
  }
?>