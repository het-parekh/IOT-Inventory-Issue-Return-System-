<?php
include "DB.php";
if(isset($_POST["message_id"]))
{
    $id = json_decode(stripslashes($_POST['message_id']));
    $query='';
    foreach($id as $d){
        $query.='DELETE FROM components WHERE C_ID="'.$d.'";';
     }
    $result = mysqli_multi_query($con, $query);
    return $result;
}
?>