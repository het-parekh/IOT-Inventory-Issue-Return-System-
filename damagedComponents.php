<?php
if(isset($_COOKIE['username'])):{
	$name=$_COOKIE['username'];
	include "includes/DB.php";
	$data=($con)?(mysqli_query($con,"Select user_name from admin where email='$name'")):"";
	$result=mysqli_fetch_assoc($data)['user_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
        integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk=" crossorigin="anonymous"></script>
</head>
<style>
  
</style>
<body>

<div class="container">
<h1> Damages Components</h1>

<table>
        <tr>
            <th>C ID</th>
            <th>Description</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Price</th>
            <!-- <th><button class="btn btn-outline-danger" id="deleted">Delete</button><button class="btn btn-outline-danger" style="margin-left:10px" id="deleteAll">Delete All</button></th> -->
        </tr>
        <?php
            
            if($con){
                // echo "connection success";
                $query="Select C_ID, Description, Size, Quantity, Price FROM components where isDamaged=1";
                $data=(mysqli_query($con,$query));
                if(mysqli_num_rows($data)>0){
                    while($row =mysqli_fetch_assoc($data)){
        ?>
                        <tr>
                            <td> <?php echo $row['C_ID']; ?> </td>
                            <td> <?php echo $row['Description']; ?> </td>
                            <td> <?php echo $row['Size']; ?> </td>
                            <td> <?php echo $row['Quantity']; ?> </td>
                            <td> <?php echo $row['Price']; ?> </td>
                        </tr>
        <?php }
                    echo "</table>";
                }

            }
            else
            {
                echo "connection unsuccessful";
            }
        ?>
</div>
  

</body>
</html>

<?php else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>