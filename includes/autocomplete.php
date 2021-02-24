<?php

$term = $_POST[ "term" ];
include 'DB.php';
if($con)
{
    
    $sql="SELECT * FROM components WHERE Description like'%".$term."%' ORDER BY Description ASC";
    $result=mysqli_query($con,$sql);
    $data=array();
    while($row  =mysqli_fetch_array($result))
    {
        $data[] = array("value1"=>$row['C_ID'],"value2"=>($row['Quantity']-$row['Quantity_Damaged']),"label"=>$row['Description']);
      
    }
    echo json_encode( $data );
}

else{
    echo "connection not successfull";
}

?>
