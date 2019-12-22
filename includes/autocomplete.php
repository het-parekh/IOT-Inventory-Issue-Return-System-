<?php

$term = $_GET[ "term" ];
$con=mysqli_connect("localhost","root","root12345","inventory");
if($con)
{
    
    $sql="SELECT Description FROM components2";
    $result=mysqli_query($con,$sql);
    $data=array();
    while($row  =mysqli_fetch_assoc($result))
    {
        $info=$row['Description'];
        if ( strpos( strtoupper($info), strtoupper($term) )!== false ){
        $data[] = $info;
        }
    }
    echo json_encode( $data );
}
else{
    echo "connection not successfull";
}

?>