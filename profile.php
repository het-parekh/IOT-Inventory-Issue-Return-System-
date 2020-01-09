<?php
session_start();
$name=$_SESSION['name'];
echo"Welcome Mr.$name";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">logout</a>
    
</body>
</html>