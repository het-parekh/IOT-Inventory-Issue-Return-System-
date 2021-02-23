<?php
include "includes\DB.php";
if(isset($_POST["message_id"]))
{
    
    $id=$_POST["message_id"];
    $query = "DELETE FROM components WHERE C_ID='$id'";
    $result = mysqli_query($con, $query);
    return $result;
}
?>