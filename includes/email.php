<?php

if(isset($_POST["roll"]) && isset($_POST["dept"]) && isset($_POST["year"]))
{
    
    include 'DB.php';
    date_default_timezone_set('Asia/Kolkata');
    $roll = $_POST["roll"];
    $dept = $_POST["dept"];
    $year = $_POST["year"];
    $status = $_POST["status"];
    $id = json_decode($_POST["id"]);
    $qty = json_decode($_POST["qty"]);
    $email = "iotinventory007@gmail.com";

    $sql = mysqli_query($con,"SELECT Email FROM students where Rollno = '$roll' and Dept_name = '$dept' and s_year = '$year'");
    $get_email = mysqli_fetch_array($sql)[0];

    $sql = mysqli_query($con,"SELECT g_id FROM students where Rollno = '$roll' and Dept_name = '$dept' and s_year = '$year'");
    if (mysqli_num_rows($sql) > 0)
    {
        $get_grp = mysqli_fetch_array($sql)[0];
    }
    else
    {
        $get_grp = "N/A";
    }
    $text = "";

    foreach(array_combine($id, $qty) as $id => $qty)
    {
        $text .= "Component ID : ".$id."        Quantity : [".$qty."]\n";
    }

    if( $status == "Issue")
    {
        $message = "Dear Student,\n\nGroup ID : ".$get_grp."\nRoll No : ".$roll."\nDepartment : ".$dept."\nYear : ".$year."\n
        This mail is to inform you that on ".date("d/m/Y").", at ".date("h:i A")." you have issued the following components.\n\n".
        $text."We would advise you to return the components before the due date. You will be penalized otherwise.\n\n\n
        Regards, \nKJSIEIT IOT\nDepartment - I.T";
    }
    else{
        $message = "Dear Student,\n\nGroup ID : ".$get_grp."\nRoll No : ".$roll."\nDepartment : ".$dept."\nYear : ".$year."\n
        This mail is to inform you that on ".date("d/m/Y").", at ".date("h:i A")." you have returned the following components.\n\n".
        $text."\n\n\nRegards, \nKJSIEIT IOT\nDepartment - I.T";
    }
    mail($get_email, "This is an email from:" .$email, $message);
}

?>