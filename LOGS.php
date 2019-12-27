<?php

?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>COMPONENT'S LOGS</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	</head>
	<body>
		<div class="container">
        <br />
			<br />
			<br />
			<h2 class="" align="center">COMPONENTS LOGS</h2><br />
<?php 
session_start();
// if(isset)??
$con=mysqli_connect("localhost","root","","iot_inventory");
if($con){
    // echo "connection established";
    // $result=insert into logs values('time_stamp()','user issued');
    // $query=mysqli_query($result,$con);
    // if($query){
        $sql="SELECT * FROM log_history  ORDER BY issue_date DESC";
        $data=mysqli_query($con,$sql);
        if(mysqli_num_rows($data)>0){
            $i=1;
            $output .= '<div class="table-responsive">
					<table class="table table bordered">
                        <tr>
                        <th>issue date</th>
                        <th>LOG</th>
                        </tr>';
        while($row=mysqli_fetch_array($data)){
            if($i<21){
            $output .='
                    <tr>
                    <td>'.$row['issue_date'].'</td>
                    <td>'.$row['logs']." ".$row['comp_name'].'</td>
                    <tr>';
                    $i++;
            }
            else{
            break;
            }
        }
        echo $output;
        }
        else{
            echo "no rows in table";
        }
    // }
}
?>
<br />
			<div id="result"></div>
		</div>
		<div style="clear:both"></div>
		<br />
		
		<br />
		<br />
		<br />
</body>
</html>
