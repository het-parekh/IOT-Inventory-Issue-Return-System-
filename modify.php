<?php
include "includes/DB.php";
include "includes/environment.php";
if(isset($_COOKIE['username'])):{
    $name=openssl_decrypt ($_COOKIE['username'], $ciphering,  
        $encryption_key, $options, $encryption_iv); 
	$query = "SELECT user_name FROM admin WHERE email='$name'";
	$data=mysqli_query($con,$query);
	if(mysqli_num_rows($data)>0){
		$result=mysqli_fetch_assoc($data)['user_name'];
	}else{
		echo "<script>location.href='logout.php'</script>";
	}
}

?>


<!DOCTYPE html>
<html>
    <head>

        <title>Change Group</title>
        
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./css/group.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    </head>
    <script>
   $("#header").load("./header.html")
   $("#footer-section").load("footer.html")
</script>
<body>
<div id="header"></div>

    
        <div class="mx-auto" style="width: 70%;margin-top:2%">
        <div class="card text-center" >
            <div class="card-header">
             <h1 style="font-family:'Garamond','Times New Roman'"> CHANGE GROUP</h1>
            </div>
            <div class="card-body">
              <form onsubmit="return false"> 
                <div id="year" class="input-group mb-3 ">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Select Year</label>
                    </div>
                    <select class="custom-select" id="year1" name="year1" style="max-width:100px">
                      <option value="SE" selected>SE</option>
                      <option value="TE" >TE</option>
                      <option value="BE">BE</option>
                    </select>
                  </div>
           
              <div class="card-text" id="main1"></div>
              <hr>
              <table id="head">
              
            <tr>
              <td >
              <div id="gcount" class="input-group mb-3 ">
              <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">New Group ID</label>
                    </div>
              <select class="custom-select grp"  style="max-width:200px;min-width:100px" id="new_grp"  name = "new_grp" >
                  <!-- Jquery -->
              </select>
</div>
            </td>
          </tr>
          <tr>
              
                <td style='max-width:550px;text-align:left;padding-bottom:20px'>Roll Number
                    <div class="input-group mb-3">
                    <input spellcheck="false" id='roll_no' style="max-width:200px" required placeholder='Enter Roll No.' type='number' aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append" id="addon">
                        <span class="input-group-text" id="basic-addon2"></span>
                    </div>
                    </div>
              </td>
            </tr>
      </table>
      <table style="margin-top:5px">
      <tr  id="tail"></tr>
    
    </table>

      
            </div>
            <div class="card-footer text-muted" align="right">
             <button class="myButton2" id="go" type="submit">GO</button>
            </div>
          
          </div>
          </div>
        </form>

        <div id="footer-section"></div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./js/modify.js"></script>

</html>

<?php else:{
     echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>

