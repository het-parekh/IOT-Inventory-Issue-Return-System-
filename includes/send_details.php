<?php
//btn(GO):issue

if((isset($_POST["issueroll"]))  && (isset($_POST["issuedept"]) && isset($_POST["issueyear"])))
{
    $roll=$_POST["issueroll"];
    $dept=$_POST["issuedept"];
    $s_year=$_POST["issueyear"];

    $con=mysqli_connect("localhost","root","","inventory");
    if($con)
    {
       // file_put_contents("test.txt", "");
        if($dept=="IT")
        {
            
            $data=mysqli_query($con,"SELECT g_id FROM students WHERE Rollno='$roll' and Dept_name='$dept' and s_year='$s_year'");
            if(mysqli_num_rows($data)>0)
            {
               $row=mysqli_fetch_assoc($data);
                echo json_encode($row["g_id"]);
               /* $myfile = fopen("test.txt", "w") or die("Unable to open file!");
				$txt="";
				fwrite($myfile, $txt);
                fclose($myfile);
                */
            }
            if(mysqli_num_rows($data)==0)
            {
                echo ("error");
            }
         }
         else
         {
            $data=mysqli_query($con,"SELECT Rollno FROM students WHERE Rollno='$roll' and Dept_name='$dept' and s_year='$s_year'");
            if(mysqli_num_rows($data)==0)
            {
                echo ("error");
            }
         }
        
    }
}

?>