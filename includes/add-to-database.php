<?php
include "DB.php";
if(isset($_POST["item_id"]))
{
 $item_id = $_POST["item_id"];
 $item_name = $_POST["item_name"];
 $item_size = $_POST["item_size"];
 $item_quantity = $_POST["item_quantity"];
 $item_price = $_POST["item_price"];
 $query = '';
 for($count = 0; $count<count($item_name); $count++)
 {
  $item_id_clean = mysqli_real_escape_string($con, $item_id[$count]);
  $item_name_clean = mysqli_real_escape_string($con, $item_name[$count]);
  $item_size_clean = mysqli_real_escape_string($con, $item_size[$count]);
  $item_quantity_clean = mysqli_real_escape_string($con, $item_quantity[$count]);
  $item_price_clean = mysqli_real_escape_string($con, $item_price[$count]);
  if($item_name_clean != '' && $item_id_clean != '' && $item_size_clean != '' && $item_quantity_clean != '' && $item_price_clean != '')
  {
   $query .= '
   INSERT INTO components(C_ID, Description, Size, Quantity,Total_Quantity,Price) 
   VALUES("'.$item_id_clean.'", "'.$item_name_clean.'", "'.$item_size_clean.'", "'.$item_quantity_clean.'","'.$item_quantity_clean.'","'.$item_price_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($con, $query))
  {
    echo json_encode(array('success' => 1));
  }
  else
  {
    echo json_encode(array('success' => 2));
  }
 }
 else
 {
  echo json_encode(array('success' => 0));
 }
}
?>