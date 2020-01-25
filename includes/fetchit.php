
<?php
// $connect = mysqli_connect("localhost", "root", "", "iot_inventory");
include 'DB.php';
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string( $con,$_POST["query"]);
	$query = "
	SELECT * FROM issue
    WHERE g_id LIKE '%".$search."%' or C_ID LIKE '%".$search."%'
    AND Dept_name LIKE '%".'IT'."%'";
}
else
{
	$query = "SELECT * FROM issue WHERE Dept_name='IT'";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows(mysqli_query($con,$query)) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
                        <th>RollNo</th>
						<th>GroupId</th>
						<th>Year</th>
                        <th>Component_ID</th>
                        <th>Issue_Date</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["Rollno"].'</td>
				<td>'.$row["g_id"].'</td>
				<td>'.$row["i_year"].'</td>
				<td>'.$row["c_ID"].'</td>
				<td>'.$row["issue_date"].'</td>
				
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'No Issue Details';
}
?>

