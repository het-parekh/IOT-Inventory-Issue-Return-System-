<?php
include 'includes/environment.php';
include "DB.php";

if(isset($_COOKIE['username'])){
	
	$name=openssl_decrypt ($_COOKIE['username'], $ciphering,  
    $encryption_key, $options, $encryption_iv); 
	$data=($con)?(mysqli_query($con,"Select user_name from admin where email='$name'")):"";
	$user=mysqli_fetch_assoc($data)['user_name'];
	
}
?>

<?php
//btn(Submit):return

date_default_timezone_set('Asia/Kolkata');

if(isset($_POST["id"]) && isset($_POST["qty"])){
	
			if($con){

				
				$data = json_decode($_POST["id"]);
				$qty = json_decode($_POST["qty"]);

				foreach($qty as $value)
				{
					if($value==0)
					{
						echo(2);
						exit();
					}
				}

				$roll=$_POST["roll2"];
				$dept=$_POST["dept2"];
				$s_year=$_POST["year2"];


				if(!empty($data)){
				foreach(array_combine($data, $qty) as $data => $qty)
				{
					//$i=$i+$qty;
					$get=mysqli_query($con,"SELECT quantity_taken from issue where c_ID='$data' and Rollno='$roll' and Dept_name='$dept' and i_year='$s_year'");
					$get1=mysqli_fetch_assoc($get);
					$get_info=$get1["quantity_taken"];
					if($qty==$get_info)
					{
						$log1[]=$data;
						$log2[]=$qty;
						$remove=mysqli_query($con,"DELETE FROM issue WHERE c_ID='$data' and Rollno='$roll' and Dept_name='$dept' and i_year='$s_year'");
						
					}
					else
					{
						$remove=mysqli_query($con,"UPDATE issue set quantity_taken=quantity_taken-$qty WHERE c_ID='$data' and Rollno='$roll' and Dept_name='$dept' and i_year='$s_year'");
					}
					$add=mysqli_query($con,"UPDATE components SET Quantity=Quantity+$qty WHERE C_ID='$data'");		
				}

				$get_grp = mysqli_query($con,"SELECT g_id FROM students where Dept_name='IT' and Rollno='$roll' and s_year = '$s_year'");
				$grpid = mysqli_fetch_assoc($get_grp)["g_id"];
				$txt="<tr style='background-color:#bbff99'><td>".$user."</td> <td>RETURN</td><td>".strtoupper($grpid)."</td><td>".$roll."</td><td>".$dept."</td>";
				$log=array();
				foreach(array_combine($log1, $log2) as $log1 => $log2)
				{
					$log[]=$log1." (".$log2.") ";
				}

				$date=date("d/m/Y",time());
				$time=date("h:i:s A",time());
				$out=implode(",",$log);
				$txt .= "<td>".$out."</td><td>".$date."</td><td>".$time."</td></tr>";
				$content=file_get_contents("log.txt",true);
				$txt.=$content;
				file_put_contents("log.txt", $txt);
			/*	if($dept=="IT"){
					$txt="'".$i."' Component(s) were Successfully Returned by Group '".$grpid."' of Department '".$dept."'";
				}else
				{
					$txt="'".$i."' Component(s) were Successfully Returned by Roll No: '".$roll."' of Department '".$dept."'";
				}
				
				file_put_contents("test.txt", $txt);*/
			}
			else
			{
				echo(2);
			}
			
		
		}	
	
	}	




?>


<?php
//btn(Submit):issue
date_default_timezone_set('Asia/Kolkata');
	if(isset($_POST["c_id1"]) && isset($_POST["req_qty1"]) && isset($_POST["roll1"]) && isset($_POST["dept1"]))
	{
		
		if($con){
			$roll=$_POST["roll1"];
			$dept=$_POST["dept1"];
			$grp=$_POST["grp1"];
			$s_year=$_POST["year1"];
			$data1 = json_decode($_POST["c_id1"]);
			$data2 = json_decode($_POST["req_qty1"]);
			$due_date = $_POST["due_date"];
			// $due_date = date("Y/m/d",$due_date1);
			// echo $due_date;
			$date=date("Y/m/d");
			$log1=array();
			$log2=array();
		
			if(count($data1)!=count(array_unique($data1)))
			{
				echo(10);
				exit();
			}
			
			foreach($data1 as $value){
			if(empty($value))
			{
				echo(3);
				exit();
			}	
		}
		foreach($data2 as $value)
		{
			if($value==0)
			{
				echo(4);
				exit();
			}
		}
		$i=0;
			if(!empty($data1)){
			if($dept=="IT")
			{
				foreach(array_combine($data1, $data2) as $data1 => $data2)
				{
			
					$exists=mysqli_query($con,"SELECT quantity_taken from issue WHERE c_ID='$data1' and g_id='$grp' and Rollno='$roll' ");

					if(mysqli_num_rows($exists)>0)
					{
						$action=mysqli_query($con,"UPDATE issue SET quantity_taken=quantity_taken+$data2 WHERE c_ID='$data1' and g_id='$grp'");
					}
					if(mysqli_num_rows($exists)==0)
					{
						$cname=mysqli_query($con,"SELECT Description FROM components WHERE C_ID='$data1'");
						$data3=mysqli_fetch_array($cname)[0];
						$sql1=mysqli_query($con,"INSERT INTO issue VALUES('$dept','$date','$due_date','$data2','$roll','$grp','$s_year','$data1','$data3')");
						
					}
					$sql2=mysqli_query($con,"UPDATE components set Quantity=Quantity-$data2 where C_ID='$data1'");
					$log1[]=$data1;
					$log2[]=$data2;
					/*
					$txt="'".$i."' Component(s) were Successfully Issued to Roll No: '".$roll."' of Department '".$dept."'";
					file_put_contents("test.txt", $txt);*/
				}
			}
			else{
				foreach(array_combine($data1, $data2) as $data1 => $data2)
				{
				
					$exists=mysqli_query($con,"SELECT quantity_taken from issue WHERE c_ID='$data1' and Rollno='$roll' and dept='$dept' and i_year='$s_year'");

					if(mysqli_num_rows($exists)>0)
					{
						$action=mysqli_query($con,"UPDATE issue SET quantity_taken=quantity_taken+$data2 WHERE c_ID='$data1' and Rollno='$roll' and dept='$dept' and i_year='$s_year'");
					}
					if(mysqli_num_rows($exists)==0)
					{
						$cname=mysqli_query($con,"SELECT Description FROM components WHERE C_ID='$data1'");
						$data3=mysqli_fetch_array($cname)[0];
						$sql1=mysqli_query($con,"INSERT INTO issue VALUES('$dept','$date','$due_date','$data2','$roll','$grp','$s_year','$data1','$data3')");
						
					}
					$sql2=mysqli_query($con,"UPDATE components set Quantity=Quantity-$data2 where C_ID='$data1'");
					$log1[]=$data1;
					$log2[]=$data2;
				}
				/*
				$txt="'".$i."' Component(s) were Successfully Issued to Roll No: '".$roll."' of Department '".$dept."'";
				file_put_contents("test.txt", $txt);*/

			
			}
				$log=array();
				$get_grp = mysqli_query($con,"SELECT g_id FROM students where Dept_name='IT' and Rollno='$roll' and s_year = '$s_year'");
				$grpid = mysqli_fetch_assoc($get_grp)["g_id"];
				$txt="<tr><td>".$user."</td> <td>ISSUE</td><td>".strtoupper($grpid)."</td><td>".$roll."</td><td>".$dept."</td>";
				
				foreach(array_combine($log1, $log2) as $log1 => $log2)
				{
					$log[]=$log1." (".$log2.") ";
				}
				
				$date=date("d/m/Y",time());
				$time=date("h:i:s A",time());
				$out=implode(",",$log);
				$txt .= "<td>".$out."</td><td>".$date."</td><td>".$time."</td></tr>";
				$content=file_get_contents("log.txt",true);
				$txt1=$txt.$content;
				file_put_contents("log.txt", $txt1);
				
				
		}

		
	}
}

?>


