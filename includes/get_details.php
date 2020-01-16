<?php
//btn(GO):return

if(((isset($_POST['group'])) || (isset($_POST['roll']))) && isset($_POST['dept']) && isset($_POST['s_year']))
{
	$info=$_POST["group"];
	$roll=$_POST["roll"];
	$dept=$_POST["dept"];
	$s_year=$_POST["s_year"];

	$con=mysqli_connect("localhost","root","","inventory");
	if($con)
	{
		//file_put_contents("test.txt", "");
		if($dept=="IT"){

			$data=mysqli_query($con,"SELECT g_id FROM issue WHERE g_id='$info' and Dept_name='$dept' and i_year='$s_year'");	
			if(mysqli_num_rows($data)>0){

				$temp= mysqli_query($con,"SELECT c_ID FROM issue WHERE g_id='$info'");
				
				$info1=array();
				$info2=array();
				$info3=array();

				while($row = mysqli_fetch_array($temp))
				{
					$info1[]=$row['c_ID'];
				}
				
				
				foreach($info1 as $value)
				{
					$c_d=mysqli_query($con,"SELECT Description FROM components WHERE C_ID='$value'");
					$row = mysqli_fetch_assoc($c_d);
					$info2[]=$row['Description'];
				}

				foreach($info1 as $value)
				{
					$c_q=mysqli_query($con,"SELECT quantity_taken FROM issue WHERE c_ID='$value'");
					$row = mysqli_fetch_assoc($c_q);
					$info3[]=$row['quantity_taken'];
				}
			
	
				
					$myarray['comp_id'] = $info1;
					$myarray['description'] = $info2;
					$myarray['quantity'] = $info3;
				
				echo json_encode($myarray);
			}
			if(mysqli_num_rows($data)==0)
			{
				echo json_encode(1);
			}
			
		}
			
		else 
		{
			
			$data=mysqli_query($con,"SELECT Rollno FROM issue WHERE Rollno='$roll' and Dept_name='$dept' and i_year='$s_year'");
			if(mysqli_num_rows($data)>0){
				$temp= mysqli_query($con ,"SELECT c_ID FROM issue WHERE Rollno='$roll' and Dept_name='$dept' and i_year='$s_year'");
				$info1=array();
				$info2=array();
				$info3=array();

				while($row = mysqli_fetch_array($temp))
				{
					$info1[]=$row['c_ID'];
				}
				
				
				foreach($info1 as $value)
				{
					$c_d=mysqli_query($con,"SELECT Description FROM components WHERE C_ID='$value'");
					$row = mysqli_fetch_assoc($c_d);
					$info2[]=$row['Description'];
				}

				foreach($info1 as $value)
				{
					$c_q=mysqli_query($con,"SELECT quantity_taken FROM issue WHERE c_ID='$value'");
					$row = mysqli_fetch_assoc($c_q);
					$info3[]=$row['quantity_taken'];
					
				}
			
					$myarray['comp_id'] = $info1;
					$myarray['description'] = $info2;
					$myarray['quantity'] = $info3;
				
				echo json_encode($myarray);
				
			}
		
			if (mysqli_num_rows($data)==0)
			{
				echo json_encode(2);
				
					exit();
			}
		}	
	}
}

?>