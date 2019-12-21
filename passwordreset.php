<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<style>
body{
    margin:0;
    padding:0;
    background:#34495e;
}
.card{
    position: absolute;
    font-family:'Times New Roman', Times, serif;
    font-weight: bold;
    width:350px;
    top:50%;
    left:50%;
    transform: translate(-50%,-50%);
    background:#191919;
}
.card input[type="password"],.card input[type="email"]{
    border:0;
    background:none;
    display:block;
    margin:10px auto;
    text-align:center;
    border:2px solid #3498db;
    padding:10px 10px;
    width:200px;
    outline:none;
    color:white;
    border-radius:24px;
    transition: 0.25s;
}
.card input[type="email"]:focus,.card input[type="password"]:focus{
width:280px;
border-color:#2ecc71;
}
.btn {
    border:0;
    background:none;
    display:block;
    margin:20px auto;
    text-align:center;
    border:2px solid #2ecc71;
    padding:10px 35px;
    outline:none;
    color:white;
    border-radius:24px;
    transition: 0.25s;
    cursor:pointer;
}
.btn:hover{
background:#2ecc71;
}


</style>
<body>
        <p id="typing"></p>
    <div class="row">
     
        <div class="container">
            <form action="passwordreset.php" method="post">
            <div class="card" >
                <div><p id="message"style="color:white;text-align:center;margin-top:10px;"></p></div>
                <div class="card-title" style="color:white;text-align:center;margin-top:40px;"><h2>RESET PASSWORD</h2></div>
                <div class="card-body">
                    <div>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Email">
                  <small style="color:red;text-align:center"><p id="email"></p></small>
                    <Button class="btn" type="submit" name="reset">
                        Reset
                    </Button>
                </div>

            </div>
            </form>
        </div>
    </div>
    <script>

    </script>
</body>
</html>
<?php
$error =array();
$paramiter=array('email');
if(isset($_POST['reset'])){
    foreach($paramiter as $value){
        if(($_POST[$value])==NULL||(!isset($_POST[$value]))){
          $error[]=$value;
        }
      } 
    if(empty($error)){
        $name=$_POST['email'];
        $db=mysqli_connect('localhost','root','pwd','iot_inventory');
        if($db){
            $sql="SELECT username FROM login_details WHERE email='$name'";
            $result=mysqli_query($db,$sql);
            $row=mysqli_fetch_array($result);
          //  $row =mysqli_fetch_array($result);
            $mail_body ='<html>
            <body style="background-color:#cccccc; color:#000;">
            <h2>Password Reset</h2>
            <p>Dear user reset your account by click on link below</p>
            <p><a href="http://localhost/project-007-dakshit/setpassword.php">Reset password</a></p>
            <p><strong>&copy;2019 IOT management</strong></p>
            </body>        
            </html>';
            $subject="Password Recovery mail";
            $headers = "Content-Type: text/html; charset=UTF-8\r\n";

            if($result){
                if(mysqli_num_rows($result)>0){
                    if(mail($name,$subject,$mail_body,$headers)){
                        session_start();
                        $_SESSION['username']=$row[0];
                        echo "<script>swal({
                            title: 'success!',
                            text: 'Email send successfully pleasse check your mailbox!',
                            type: 'success'
                          });</script>";
                    }
                }else{
                    echo "<script>swal({
                        title: 'OOPS',
                        text: 'fail to send mail!',
                        type: 'error'
                      });</script>"; 
                }
            }
         }
        }else{
            foreach($error as $value){
                echo "<script>
                document.getElementById('$value').innerHTML = '$value is missing';
                
                </script>";                
            }
    }


}
?>