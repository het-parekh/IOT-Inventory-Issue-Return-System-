<?php

include "./DB.php";


if(isset($_POST["c_id"]) && isset($_POST["qty"])){

  if($con){
    $c_id = $_POST["c_id"];
    $qty = $_POST["qty"];

    // echo $qty;
    $get = mysqli_query($con,"UPDATE components SET Quantity_Damaged =Quantity_Damaged + '$qty' where C_ID = '$c_id'");
  }
  echo "success";
}
else{
  echo "failure";
}

?>