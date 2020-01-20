<?php
if(isset($_COOKIE['username'])){
    $name=$_COOKIE['username'];
    include_once("dashbord-new.php");
}
 
else{
    echo "<script>location.href='loginpro7.php'</script>";
}
?>