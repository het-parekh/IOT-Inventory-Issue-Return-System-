<?php 


if(isset($_POST["roll_no"]) && isset($_POST["grp"]) && isset($_POST["year"]))
{
    $con=mysqli_connect("localhost","root","root12345","inventory");

    if($con){
    
        $rollno=json_decode($_POST["roll_no"]);
        $group_name=$_POST["grp"];
        $year=$_POST["year"];
       
        foreach($rollno as $value){
			if(empty($value))
			{
				echo(3);
				exit();
            }
        }

        if(count($rollno)!=count(array_unique($rollno)))
		{
			echo(1);
			exit();
        }

        $check=mysqli_query($con,"SELECT s_year FROM students WHERE g_id='$group_name'");
        if(mysqli_num_rows($check)>0)
        {
            $check1=mysqli_fetch_assoc($check)["s_year"];
            if($check1!=$year){
            echo(4);
            exit();
            }
            
        }

        foreach($rollno as $value)
        {
            $sql1=mysqli_query($con,"SELECT * FROM students WHERE Rollno='$value' and s_year='$year' and Dept_name='IT'");
            if(mysqli_num_rows($sql1)==0)
            {
                echo 2;
                exit();
            }
            
        }
   
        foreach($rollno as $value)
        {
            $sql=mysqli_query($con,"UPDATE students SET g_id='$group_name' WHERE Rollno='$value' AND s_year='$year' AND Dept_name='IT'" );
        }   
        echo "done";
    }
}

?>