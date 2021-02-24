<?php

if(isset($_COOKIE['username'])){
	$name=$_COOKIE['username'];
	include "DB.php";
	$data=($con)?(mysqli_query($con,"Select user_name from admin where email='$name'")):"";
	$user=mysqli_fetch_assoc($data)['user_name'];
	
}
?>


<?php

if(isset($_POST["c_id"]) && isset($_POST["qty"])){

  if($con){
    $c_id = $_POST["c_id"];
    $qty = $_POST["qty"];

    echo $qty;
    $get = mysqli_query($con,"UPDATE components SET Quantity_Damaged = Quantity_Damaged - '$qty' where C_ID = '$c_id'");

  }
  echo "success";
}
else{
  echo "failure";
}

?>