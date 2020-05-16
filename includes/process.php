<?php
session_start();
if(isset($_COOKIE['username'])){
	$name=$_COOKIE['username'];
	include "DB.php";
	$data=($con)?(mysqli_query($con,"Select user_name from admin where email='$name'")):"";
	$user=mysqli_fetch_assoc($data)['user_name'];
	
}
?>


<?php
//btn(Submit):return

date_default_timezone_set('Asia/Kolkata');
if(isset($_POST["table"]) && isset($_POST["qty"])){
	include 'DB.php';
			if($con){

				
				$data = json_decode($_POST["table"]);
				$qty = json_decode($_POST["qty"]);

				foreach($qty as $value)
				{
					if($value==0)
					{
						echo(2);
						exit();
					}
				}

				$grpid=$_POST["group2"];
				$rollid=$_POST["roll2"];
				$dept_name=$_POST["dept2"];
				$s_year2=$_POST["year2"];


				if(!empty($data)){
				foreach(array_combine($data, $qty) as $data => $qty)
				{
					//$i=$i+$qty;
					if($dept_name=="IT"){
						$get=mysqli_query($con,"SELECT quantity_taken from issue where c_ID='$data' and g_id='$grpid' ORDER BY Rollno LIMIT 1");
					}
					else
					{
						$get=mysqli_query($con,"SELECT quantity_taken from issue where c_ID='$data' and Rollno='$rollid' and Dept_name='$dept_name' and i_year='$s_year2'");
					}
					$get1=mysqli_fetch_assoc($get);
					$get_info=$get1["quantity_taken"];
					if($qty==$get_info)
					{
						if($dept_name=="IT"){
							$log1[]=$data;
					        $log2[]=$qty;
							$remove=mysqli_query($con,"DELETE FROM issue WHERE c_ID='$data' and g_id='$grpid' ORDER BY Rollno LIMIT 1");
							
						}
						else
						{
								$log1[]=$data;
	      				        $log2[]=$qty;
     							$remove=mysqli_query($con,"DELETE FROM issue WHERE c_ID='$data' and Rollno='$rollid' and Dept_name='$dept_name' and i_year='$s_year2'");
												}
						
						
					}else
					{
						if($dept_name=="IT")
						{
							$remove=mysqli_query($con,"UPDATE issue set quantity_taken=quantity_taken-$qty WHERE c_ID='$data' and g_id='$grpid' ORDER BY Rollno LIMIT 1");
						}
						else
						{
							$remove=mysqli_query($con,"UPDATE issue set quantity_taken=quantity_taken-$qty WHERE c_ID='$data' and Rollno='$rollid' and Dept_name='$dept_name' and i_year='$s_year2'");
						}
					}
					$add=mysqli_query($con,"UPDATE components SET Quantity=Quantity+$qty WHERE C_ID='$data'");
					

					
				}

				$log=array();
				foreach(array_combine($log1, $log2) as $log1 => $log2)
				{
					$log[]=$log1." (".$log2.") ";
				}
				$t=time();
				$out=implode(",",$log);
				$txt=($dept_name=="IT")?("<li><a><strong>".$user."</strong> Recieved <strong>".$out."</strong> on <strong>".date("d/m/Y h:i:s A",$t)."</strong> from Group <strong>".strtoupper($grpid)." (IT)</strong></a></li>\n") : ("<li><a><strong>".$user."</strong> Recieved <strong>".$out."</strong> on <strong>".date("d/m/Y h:i:s A",$t)."</strong> from Roll Number <strong>".$rollid." (".$dept_name.")</strong></a></li>\n");
				$content=file_get_contents("log.txt",true);
				$txt1=$txt.$content;
				file_put_contents("log.txt", $txt1);
			/*	if($dept_name=="IT"){
					$txt="'".$i."' Component(s) were Successfully Returned by Group '".$grpid."' of Department '".$dept_name."'";
				}else
				{
					$txt="'".$i."' Component(s) were Successfully Returned by Roll No: '".$rollid."' of Department '".$dept_name."'";
				}
				
				file_put_contents("test.txt", $txt);*/

			}
		
		}	
	
	}	




?>


<?php
//btn(Submit):issue
date_default_timezone_set('Asia/Kolkata');
	if(isset($_POST["c_id1"]) && isset($_POST["req_qty1"]) && isset($_POST["roll1"]) && isset($_POST["dept1"]))
	{
		
		include 'DB.php';
		if($con){
			$roll=$_POST["roll1"];
			$dept=$_POST["dept1"];
			$grp=$_POST["grp1"];
			$s_year=$_POST["year1"];
			$data1 = json_decode($_POST["c_id1"]);
			$data2 = json_decode($_POST["req_qty1"]);
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
						$sql1=mysqli_query($con,"INSERT INTO issue VALUES('$dept','$date','$data2','$roll','$grp','$s_year','$data1')");
						
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
				
					$exists=mysqli_query($con,"SELECT quantity_taken from issue WHERE c_ID='$data1' and Rollno='$roll' and Dept_name='$dept' and i_year='$s_year'");

					if(mysqli_num_rows($exists)>0)
					{
						$action=mysqli_query($con,"UPDATE issue SET quantity_taken=quantity_taken+$data2 WHERE c_ID='$data1' and Rollno='$roll' and Dept_name='$dept' and i_year='$s_year'");
					}
					if(mysqli_num_rows($exists)==0)
					{
						$sql1=mysqli_query($con,"INSERT INTO issue VALUES('$dept','$date','$data2','$roll',NULL,'$s_year','$data1')");
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
				foreach(array_combine($log1, $log2) as $log1 => $log2)
				{
					$log[]=$log1." (".$log2.") ";
				}
				$t=time();
				$out=implode(",",$log);
				$txt=($dept=="IT")?("<li class='ret'><a><strong>".$user."</strong> Issued <strong>".$out."</strong> on <strong>".date("d/m/Y h:i:s A",$t)."</strong> to Group <strong>".$grp." (IT)</strong></a></li>\n") : ("<li><a><strong>".$user."</strong> Issued <strong>".$out."</strong> on <strong>".date("d/m/Y h:i:s A",$t)."</strong> to Roll Number <strong>".$roll." (".$dept.")</strong></a></li>\n");
				$content=file_get_contents("log.txt",true);
				$txt1=$txt.$content;
				file_put_contents("log.txt", $txt1);

				
		}
		
		
	}
}

?>