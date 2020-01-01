<?php
$con=mysqli_connect('localhost','root','pwd','inventory');
if(isset($con)){
    $parameters=array('firstperson','secondperson','thirdperson','fourthperson');
    $groupid=$_POST['groupid'];
foreach($parameters as $value){
    if(($_POST[$value])!=NULL && (isset($_POST[$value]))){
        $query="UPDATE students SET g_id='$groupid' WHERE Rollno='$_POST[$value]'";
        $result=mysqli_query($con,$query);
    }

}
}

?>