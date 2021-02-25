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
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <title>Inventory Management System</title>
    <link rel="stylesheet" type="text/css" href="./css/Issue_Return.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
        <script type="text/javascript" src="./js/main.js"></script>
    <script type="text/javascript" src="./js/decor.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    

</head>
<script>
		 $(function(){
    $("#header").load("header.html");
  $("#footer-section").load("footer.html"); 
});
</script>
<body>
<div id="header"></div>
    
    <div class="container" style="margin-top:-250px; margin-bottom:160px;">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
                    <div class="card-header">
                        <h4 style="font-family:'Garamond','Times New Roman'">Issue / Return </h4><div id="statusp" class="status"><div id="status"></div></div>
                    </div>
                    <div class="card-body">
                        <form onsubmit="return false">
                            <div class="form-group row">
                                <label class="col-sm-3 " align="right">Activity</label>
                                <div class="col-sm-6">
                                    <input type="radio" name="check" value="Issue" required>Issue
                                    <input type="radio" name="check" value="Return" style="margin-left:5px">Return
                                </div>

                                <div id="drop"> 
                                <select class="selectpicker" data-style="btn-info" multiple  id="dropbox" >

                                    <optgroup label="Year" data-max-options="1"  id="s_year">
                                       
                                        <option selected>SE</option>
                                        <option>TE</option>
                                        <option>BE</option>
                                    </optgroup>
                                    <optgroup label="Department" data-max-options="1"  id="dept">
                                        <option value="IT" selected>IT</option>
                                        <option value="CS">CS</option>
                                        <option value="EXTC">EXTC</option>
                                        <option value="ETRX">ETRX</option>
                                    </optgroup>

                                </select>
								</div>
                            
                            </div>
                            
                            <div class="form-group row" id="rollgrp">
                            
                                <label class="col-sm-3 col-form-label" align="right">Registered Roll No.*</label>
                                <div class="col-sm-6">
                                
                                    <button type="submit" value="GO" id="go"
                                        style="float: right;background-color:transparent" class="go">GO</button>
                                    <div style="overflow: hidden; padding-right: .5em;">
                                        <input type="text"  class="form-control form-control-sm roll" id="roll" />
                                        
                                    </div>
                                    <div id="showalert_r"></div>
                                </div>
                            </div>

                        </form>

                        <div id="all">
                            <br>
                            <form id="main" onsubmit="return false">
                                <div class="form-group row" id="issue_date">
                                    <label class="col-sm-3 col-form-label" align="right">Issue Date</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="order_date" value="<?php echo date("Y-d-m"); ?>"
                                            readonly class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="form-group row" id="due_date_div" >
                                    <label class="col-sm-3 col-form-label" align="right">Due Date</label>
                                    <div class="col-sm-6">
                                        <input required id="due_date" type="date" min="<?php echo date("Y-m-d"); ?>" name="order_date"  class="form-control form-control-sm">
                                    </div>
                                </div>

                                <div class="form-group row" id="return_date">
                                    <label class="col-sm-3 col-form-label" align="right">Return Date</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="order_date" readonly
                                            class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
                                    </div>
                                </div>



                                <div class="form-group row" id="groupx">
                                    <label class="col-sm-3 col-form-label" align="right">Group ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" id="groupid" name="group" readonly
                                            class="form-control form-control-sm" placeholder="N/A"
                                            required />
                                    </div>

                                </div>

                                <div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
                                    <div class="card-body">
                                        <h3>Component(s) list</h3>
                                        <table align="center" style="width:100%;text-align:center" id="return_table">
                                        </table>
                                        <!--Table Ends-->

                                        <table align="center" style="width:100%;text-align:center" id="issue_table">
                                        </table>

                                     
                                            <center style="padding:10px;">
                                                <button type="button" id="add" style="width:150px;"
                                                    class="btn btn-success">Add</button>
                                                <button type="button" id="remove" style="width:150px;"
                                                    class="btn btn-danger">Remove</button>
                                            </center>
                                    </div>
                                    <!--Crad Body Ends-->
                                </div> <!-- Order List Crad Ends-->

                                <div class="card" id="already_issued_card" style="box-shadow:0 0 15px 0 lightgrey;margin-top:10px;">
                                    <div class="card-body">
                                        <h3>Previously Issued Component(s)</h3>
                                        <table align="center" style="width:100%;text-align:center" id="already_issued">
                                        </table>
                                        <!--Table Ends-->

                                    </div>
                                    <!--Crad Body Ends-->
                                </div> <!-- Order List Crad Ends-->
                                

                                <br>
                                <center>
                                    <button type="submit" id="submit1" style="width:150px;" class="btn btn-info" value="Return">Return</button>
                                    <button  type="submit" id="submit2" style="width:150px;" class="btn btn-info" value="Issue">Issue</button>

                                </center>

							</form>
                        </div>
                        
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div id="footer-section"></div>


</body>

</html>
<?php
else:{
    echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>