<?php
include "DB.php";


if($con){
  if (isset($_FILES["import"]["tmp_name"])){ 
        
    $file = $_FILES['import']['tmp_name'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime_type = finfo_file($finfo,$file);
    $allowed_mimes = ['application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','text/csv','application/csv'];
    if ($allowed_mimes.includes($mime_type))  
      {
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file);
        $sheetCount = $spreadsheet->getSheetCount();
        for ($i = 0; $i < $sheetCount; $i++) {
            $sheet = $spreadsheet->getSheet($i);
            $rows = $sheet-> toArray();
            foreach($rows as $row){                    
                $values  = implode("', '", array_values($row));
                $values = "'".$values."'";
                $sql = mysqli_query($con,"INSERT INTO components(C_ID,Description,Size,Total_Quantity,Price) VALUES($values)");
                
            }
        } 
        if($sql == false){
            die("invalid file orientation");
        }else{
            echo "component list updated successfully";
        }           
      }
      else{
          die("invalid format");
      }
}

  else if(isset($_POST["item_id"]))
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

  
}
?>