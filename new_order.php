<?php
/*
include_once("./database/constants.php");
if (!isset($_SESSION["userid"])) {
	header("location:".DOMAIN."/");
}
*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Inventory Management System</title>
	
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
	 <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
	 <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"
  integrity="sha256-0YPKAwZP7Mp3ALMRVB2i8GXeEndvCq3eSl/WsAl1Ryk="
  crossorigin="anonymous"></script>
		
 	<script type="text/javascript" src="./js/order.js"></script>

 </head>
<body>
<div class="overlay"><div class="loader"></div></div>
	<!-- Navbar -->
	<?php include_once("./templates/header.php"); ?>
	<br/><br/>

	<div class="container">
		<div class="row">
			<div class="col-md-10 mx-auto">
				<div class="card" style="box-shadow:0 0 25px 0 lightgrey;">
				  <div class="card-header">
				   	<h4>Issue/Return</h4>
				  </div>
				  <div class="card-body">
				  	<form id="get_order_data" onsubmit="return false">
				  			<form>
						  <div class="form-group row">
				  			<label class="col-sm-3 " align="right">Activity</label>
				  			<div class="col-sm-6">
				  				<input type="radio" name="check" value="Issue" required>Issue
								  <input type="radio" name="check" value="Return" style="margin-left:5px">Return
				  			</div>
							  
							  <select class="selectpicker" data-style="btn-info" align="right"id="dept">
							 
  								<option value="IT" selected="selected">IT</option>
 								<option value="CS">CS</option>
								 <option value="EXTC">EXTC</option>
								 <option value="ETRX">ETRX</option>
								 
							</select>
							
				  		</div>
						  <div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Registered Roll No.*</label>
				  			<div class="col-sm-6">
				  				
								  <button type="submit" value="GO" id="go" style="float: right;background-color:transparent" >GO</button>
									<div style="overflow: hidden; padding-right: .5em;">
  										 <input type="text" style="width: 100%;border-radius:.2rem" id="roll" required />
									</div>
						   </div>
				  		</div>
						  </form>
					
					<div id="all">
					<br>
				  		<div class="form-group row">
				  			<label class="col-sm-3 col-form-label" align="right">Date</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="order_date" name="order_date" readonly class="form-control form-control-sm" value="<?php echo date("Y-d-m"); ?>">
				  			</div>
				  		</div>
				  		
							  
				  		
						  <div class="form-group row" id="groupx">
				  			<label class="col-sm-3 col-form-label" align="right">Group ID</label>
				  			<div class="col-sm-6">
				  				<input type="text" id="groupid" name="group" readonly class="form-control form-control-sm" placeholder="Enter Customer Name" required/>
				  			</div>
							 
				  		</div>
						  
					


				  		<div class="card" style="box-shadow:0 0 15px 0 lightgrey;">
				  			<div class="card-body">
				  				<h3>Component(s) list</h3>
				  				<table align="center" style="width:95%;">
		                            <thead>
		                              <tr>
		                                <th>#</th>
		                                <th style="text-align:center;">Component Name</th>
		                                <th style="text-align:center;">Component ID</th>
		                                <th style="text-align:center;">Quantity</th>
		                                <th style="text-align:center;">Available Quantity</th>
		                                
		                              </tr>
		                            </thead>
		                            <tbody id="invoice_item">
		<!--<tr>
		    <td><b id="number">1</b></td>
		    <td>
		        <select name="pid[]" class="form-control form-control-sm" required>
		            <option>Washing Machine</option>
		        </select>
		    </td>
		    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm"></td>   
		    <td><input name="qty[]" type="text" class="form-control form-control-sm" required></td>
		    <td><input name="price[]" type="text" class="form-control form-control-sm" readonly></td>
		    <td>Rs.1540</td>
		</tr>-->
		                            </tbody>
		                        </table> <!--Table Ends-->
		                        <center style="padding:10px;">
		                        	<button id="add" style="width:150px;" class="btn btn-success">Add</button>
		                        	<button id="remove" style="width:150px;" class="btn btn-danger">Remove</button>
		                        </center>
				  			</div> <!--Crad Body Ends-->
				  		</div> <!-- Order List Crad Ends-->

				  	
						<br>
                    <center>
                      <input type="submit" id="order_form" style="width:150px;" class="btn btn-info" value="Submit">
                      
                    </center>
					

					</div>
				  	</form>
					  </div>

				  
				</div>
			</div>
		</div>
	</div>



</body>
</html>