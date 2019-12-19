

<?php
    $rollno=$_POST['test'];
    echo $rollno;
	$con=mysqli_connect("localhost","root","root12345","iot_inv_management");
	if($con)
	{
        
        if(isset($_POST['test']))
        {
            $rollno=$_POST['test'];
            echo $rollno;
        }
        else
        {
            echo "empty";
        }
       
        $sql="SELECT Group_id from group where Rollno='$rollno'";
        $data=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($data);
        $info=$row['Group_id'];
        echo json_encode($info);    
    } 

  
?>
