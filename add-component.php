<?php
include "includes/DB.php";
include 'includes/environment.php';
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
<script src="js/add_components.js"></script>

</head>
<style>
 .photo-button{
            display: inline-block;
            padding: 8px 12px; 
            cursor: pointer;
            border-radius: 4px;
            background-color: #0d6efd;
            font-size: 16px;
            color: #fff;
            position:relative;
            z-index:10;
        }
#import{
            left:55px !important;
        }
</style>
<script>
	 	 $(function(){
    $("#header").load("header.html"); 
    $("#footer-section").load("footer.html")
    
});
</script>
<body>
<div id="header"></div>
	
<br /><br />
  <div class="container" style="margin-top:-340px; position:relative; background-color:#fff; box-shadow:4px 8px 16px rgba(0,0,0,.3); padding:40px; margin-bottom:50px; border-radius:5px;">
   <br />
   <h2 align="center">ADD MORE COMPONENTS IN TO DATABASE</h2>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered" id="crud_table">
     <tr>
      <th width="5%">Component_ID</th>
      <th width="45%">Name</th>
      <th width="5%">Size</th>
      <th width="10%">Total_Quantity</th>
      <th width="10%">Price</th>
      <th width="5%"></th>
     </tr>
     <tr>
      <td contenteditable="true" class="item_id"></td>
      <td contenteditable="true" class="item_name"></td>
      <td class="item_size"><select name="i_size" id="i_size"><option value="S">S</option><option value="M">M</option><option value="L">L</option></td>
      <td contenteditable="true" class="item_quantity"></td>
      <td contenteditable="true" class="item_price"></td>
      <td></td>
     </tr>
    </table>
    <div align="right">
     <button type="button" name="add" id="add" class="btn btn-success btn-xs">+</button>
    </div>

    <br />
    <form enctype="multipart/form-data" method = "POST" id="import_form">
    <label for="import" class="photo-button">Import from Excel</label>
    <input type="file" name="import" id="import" ></input>
    <div style="margin-top:0px;color:#b30000"> 
        <ul style="margin-left:-20px;">
        <li>Only .xls, .xlsx, .csv file formats are allowed.</li>
        <li>All headers are compulsory.</li>
        <li>Ensure that the the file has headers in the following order :- <small>(Component ID*, Component Size*, 
        Component Quantity*, Component Price*) </small></li>
        <li>No space between rows or columns.</li>  
        <li>( * ) means providing value(s) to that field is not required.</li></li>  
        </ul>
        </div>
    </form>
   </div>
   <br />
   <br />
   <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
  </div>  
  <div id="footer-section"></div>
</body>
</html>

<?php
else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif?>