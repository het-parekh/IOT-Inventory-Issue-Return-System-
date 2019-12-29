<?php

$term = $_POST[ "term" ];
$con=mysqli_connect("localhost","root","root12345","inventory");
if($con)
{
    
    $sql="SELECT * FROM components WHERE Description like'%".$term."%' ORDER BY Description ASC";
    $result=mysqli_query($con,$sql);
    $data=array();
    while($row  =mysqli_fetch_array($result))
    {
        $data[] = array("value1"=>$row['C_ID'],"value2"=>$row['Quantity'],"label"=>$row['Description']);
      
    }
    echo json_encode( $data );
}

else{
    echo "connection not successfull";
}

?>
