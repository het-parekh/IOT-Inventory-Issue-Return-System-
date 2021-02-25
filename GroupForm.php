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

        <title>Create Group</title>
        
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./css/group.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    </head>

    <body>
      <div id="header"></div>
      <div class="main-content" style="margin-top:-370px;">

        <div class="mx-auto" style="width: 70%;margin-top:2%">
        <div class="card text-center" >
            <div class="card-header">
             <h1 style="font-family:'Garamond','Times New Roman'"> CREATE GROUP</h1>
            </div>
            <div class="card-body">
              <form onsubmit="return false"> 
                <div id="year" class="input-group mb-3 ">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Select Year</label>
                    </div>
                    <select class="custom-select" id="year1" style="max-width:100px">
                      <option value="1" selected>SE</option>
                      <option value="2" >TE</option>
                      <option value="3">BE</option>
                    </select>
                  </div>
           
              <div class="card-text" id="main1"></div>
              <hr>
              <table id="head">
              <tr>
                <td style='min-width:200px;width:500px;text-align:left;padding-bottom:20px'>Group ID
                <input spellcheck="false" id='grp_name' style="margin-top:5px" required placeholder='Unique Group Name'type='text' class='form-control form-control-sm'/>
              </td>
            </tr>
            <tr>
              <td >
              <div id="gcount" class="input-group mb-3 ">
              <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Group Count</label>
                    </div>
              <select class="custom-select grp"  style="max-width:70px;" id='customRange2'>
                <option selected value="1" style="background-color:white;color:black">1</option>
                <option class="opt" value="2">2</option>
                <option class="opt" value="3">3</option>
                <option class="opt" value="4">4</option>
                <option class="opt" value="5">5</option>
              </select>
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
      </div>


        <div id="footer-section"></div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="./js/group.js"></script>

</html>

<?php else:{
     echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>
