<?php
include 'DB.php';

if(isset($_POST["roll"]) && isset($_POST["year"]) && isset($_POST["grp"]))
    
    if($con){
        $roll=$_POST["roll"];
        $year=$_POST["year"];
        $grp=$_POST["grp"];

        $check = mysqli_query($con,"SELECT * from students where Rollno = '$roll' and s_year = '$year' and Dept_name = 'IT'");
        if(mysqli_num_rows($check)>0)
        {
            echo "ok";
            $query = mysqli_query($con,"UPDATE students set g_id = '$grp' where s_year='$year' and Rollno = '$roll' and Dept_name = 'IT'");
        }
        else
        {
            echo (1);
            exit();
        }
        
        
    }


#previous grp
if(isset($_POST["roll1"]) && isset($_POST["year1"]) && isset($_POST["validate_prvgrp"]))
{

    $roll1 = $_POST["roll1"];
    $year1 = $_POST["year1"];
    $query1 = mysqli_query($con,"SELECT g_id from students where Rollno = '$roll1' and s_year = '$year1' and Dept_name = 'IT'");
    if(mysqli_num_rows($query1)>0){
        $row1 = mysqli_fetch_assoc($query1)["g_id"];
        echo json_encode($row1);
    }
    else
    {
        echo "N/A";
    }
    

}

#new group dropdown
if(isset($_POST["year1"]) && isset($_POST["validate_newgrp"]) )
{
    $year1 = $_POST["year1"];
    $sql = mysqli_query($con,"SELECT g_id FROM students WHERE s_year = '$year1' and Dept_name = 'IT'");
    $arr = array();
    if(mysqli_num_rows($sql)>0)
	{
        while($row = mysqli_fetch_assoc($sql)){ 
            $arr[] = $row["g_id"];
        }
        echo json_encode($arr);
    }

    
}


?>