
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<body>
        <div class="alert alert-danger container" role="alert" style="margin-top: 30px;">
                <h3 class="alert-heading">LOGIN PAGE!!</h3>
                <p>Enter your credentials here!!</p>
            </div>
    <div class="container jumbotron d-flex justify-content-center align-items-center" style="margin-top: 50px; height: 400px; width: 600px; border-radius: 10%;" >
    <form  action="loginpro7.php" method="post">
        <div class="form-heading" style="margin-bottom: 40px;">
           <h1 class="display-3 text-success"> LOGIN HERE!!</h1>
        </div>
        <div class="form-group">
            <label for="username">USERNAME:</label>
            <input type="text" id="username" name="username">
        </div>
        <div class="from-group " style="margin-top: 20px;">
            <label for="password">PASSWORD:</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-outline-primary d-flex align-items-between">LOGIN</button>
       <a href="#"> <small >forgot password?click here</small></a>
    </form>
</div>
</body>
</html>
<?php
// echo "akash";
$name=$_POST['username'];
$password=$_POST['password'];
// echo "hey there";
echo $name;
$con=mysqli_connect("localhost","akash","","iot_inventory");
if($con){
    echo "connection established";
    if(mysqli_query($con,"SELECT * FROM ulogin_details WHERE user_name='$name'")){
        if(mysqli_num_row($data)>0){
        $row=$data->fetch_assoc();
        $pw=$row['password'];
          if($pw===$password){
            echo "<script> location.href='#'</script>";
          }
          else{
            echo "<script>alert('incorrect password')</script>";
         }
        }
        else{
            echo "<script>alert('username doesn't exist')</script>";
        }
    }
    else{
        echo "<br> query was not executed";
    }
}
else{
    echo "connection unsucessful";
}
?>