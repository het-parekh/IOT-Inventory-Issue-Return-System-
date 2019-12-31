<html>
<head>
<title> Reset </title>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<body>
<style>
.form-gap {
    padding-top: 70px;
}
</style>
<div class="form-gap"></div>
<div class="container">
<form action="passwordreset.php" method="post">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
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
