<?php

if(isset($_POST['roll']) && isset($_POST['dept']) )
{
	$roll=$_POST["roll"];
	
	$dept=$_POST["dept"];
	
	
	
	$con=mysqli_connect("localhost","root","root12345","inventory");
	if($con)
	{
		
		if($dept=="IT"){
			
			$data = mysqli_query($con ,"SELECT groupid FROM group_name WHERE Rollno='$roll'");
			
			if(mysqli_num_rows($data)==1)
			{
				
				$row=mysqli_fetch_assoc($data);
				$info=$row['groupid'];
				
				$temp= mysqli_query($con ,"SELECT c_id FROM issue WHERE g_id='$info'");
				$info1=array();
				$info2=array();
				$info3=array();

				while($row = mysqli_fetch_array($temp))
				{
					$info1[]=$row['c_id'];
				}
				
				
				foreach($info1 as $value)
				{
					$c_d=mysqli_query($con,"SELECT Description FROM components2 WHERE C_ID='$value'");
					$row = mysqli_fetch_assoc($c_d);
					$info2[]=$row['Description'];
				}

				foreach($info1 as $value)
				{
					$c_q=mysqli_query($con,"SELECT Quantity FROM components2 WHERE C_ID='$value'");
					$row = mysqli_fetch_assoc($c_q);
					$info3[]=$row['Quantity'];
				}
			

					$myarray['group_id'] = $info;
					$myarray['comp_id'] = $info1;
					$myarray['description'] = $info2;
					$myarray['quantity'] = $info3;
				
				echo json_encode($myarray);
			}
			if (mysqli_num_rows($data)==0)
			{
				header('HTTP/1.1 404 Database Entry Does not Exist');
				header('Content-Type: application/json; charset=UTF-8');
					exit();
			}
			
			
		}
			
		else 
		{
			
			$sql="SELECT Rollno FROM students WHERE Rollno='$roll'";
			$data1 = mysqli_query($con ,$sql);
			if(mysqli_num_rows($data1)==1)
			{
				$row=mysqli_fetch_assoc($data1);
				$info=$row['Rollno'];
				$temp= mysqli_query($con ,"SELECT c_id FROM issue WHERE Rollno='$info'");
				$row=mysqli_fetch_assoc($temp);
				$info1=$row['c_id'];
				$c_d=mysqli_query($con,"SELECT Description FROM components2 WHERE C_ID='$info1'");
				$row=mysqli_fetch_assoc($c_d);
				$info2=$row['Description'];
				$c_q=mysqli_query($con,"SELECT Quantity FROM components2 WHERE C_ID='$info1'");
				$row=mysqli_fetch_assoc($c_q);
				$info3=$row['Quantity'];

				
				$myarray['c_id'] = $info1;
				$myarray['description'] = $info2;
				$myarray['quantity'] = $info3;

				echo json_encode($myarray);

			}

			if (mysqli_num_rows($data)==0)
			{
				header('HTTP/1.1 404 Database Entry Does not Exist');
				header('Content-Type: application/json; charset=UTF-8');
					exit();
			}
			
		}
		
	}
			
			
			
			
			
	
}

?>

