

<?php
//btn(GO):return

if((isset($_POST['roll'])) && isset($_POST['dept']) && isset($_POST['s_year']))
{

	$roll=$_POST["roll"];
	$dept=$_POST["dept"];
	$s_year=$_POST["s_year"];
	include 'DB.php';
	
	if($con)
	{
		//file_put_contents("test.txt", "");
		
			$data=mysqli_query($con,"SELECT Rollno FROM issue WHERE Rollno='$roll' and Dept_name='$dept' and i_year='$s_year'");	
			$rollno = mysqli_fetch_array($data)[0];
			if(mysqli_num_rows($data)>0){

				$temp= mysqli_query($con,"SELECT c_ID FROM issue WHERE Rollno='$rollno'");
				
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

				foreach($info1 as $value)
				{
					$c_q=mysqli_query($con,"SELECT due_date FROM issue WHERE c_ID='$value'");
					$row = mysqli_fetch_assoc($c_q);
					$info4[]=$row['due_date'];
				}
			
	
				
					$myarray['comp_id'] = $info1;
					$myarray['description'] = $info2;
					$myarray['quantity'] = $info3;
					$myarray['due_date'] = $info4;
				
				echo json_encode($myarray);
			}

			if (mysqli_num_rows($data)==0)
			{
				echo json_encode(2);
				
					exit();
			}
		}	
	}


?>