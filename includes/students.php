<?php 

include 'DB.php';
require '../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if ($con){
    if(isset($_POST["s_name"])){
        $id = mysqli_real_escape_string($con,$_POST['s_id']);

        $profile_photo = $_FILES['s_photo']["tmp_name"];
        $profile_photo_path = str_replace('\\','/',$profile_photo);

        $year = mysqli_real_escape_string($con,$_POST['s_year']);
        $roll = mysqli_real_escape_string($con,$_POST['s_roll']);
        $dept = mysqli_real_escape_string($con,$_POST['s_dept']);
        $grp = mysqli_real_escape_string($con,$_POST['s_grp']);
        $name = mysqli_real_escape_string($con,$_POST['s_name']);
        $s_mobile = mysqli_real_escape_string($con,$_POST['s_mobile']);
        $s_email = mysqli_real_escape_string($con,$_POST['s_email']);
        $p_mobile = mysqli_real_escape_string($con,$_POST['s_p_mobile']);
        $p_email = mysqli_real_escape_string($con,$_POST['s_p_email']);

        $sql = mysqli_query($con,"INSERT INTO test VALUES('$id',LOAD_FILE('$profile_photo_path'),'$year','$roll','$dept','$grp','$name','$s_mobile','$s_email','$p_mobile','$p_email'");
        
        if($sql == true){
            echo "<script>alert('Student List Update Successfully');location.reload();</script>";
        }else{
            echo "<script>alert('Error : Student List Failed to Update');location.reload();</script>";
        }  
    }
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
                    $sql = mysqli_query($con,"INSERT INTO students VALUES($values)");
                    
                }
            } 
            if($sql == false){
                die("invalid file orientation");
            }else{
                echo "Student list updated successfully";
            }           
          }
          else{
              die("invalid format");
          }

         
          
    }
}
else{
    echo"Connection was unsuccessful with the server...";
}

?>