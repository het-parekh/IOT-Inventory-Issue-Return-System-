<?php
    include "DB.php";
    if(isset($_POST["id_array"]))
    {
        $id = json_decode($_POST["id_array"]);
        if ($id!=null){
            foreach ($id as $id)
            {
                $g_id=explode("-",$id)[0];
                $roll = explode("-",$id)[1];
                $query=mysqli_query($con,"UPDATE students set g_id=NULL WHERE g_id='$g_id' and Rollno='$roll'");
            }
            echo 1;
        }
        else
        {
            echo 0;
        }

    }
?>