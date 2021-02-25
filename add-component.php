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


</head>

<script>
	 	 $(function(){
    $("#header").load("header.html"); 
    $("#footer-section").load("footer.html")
    
});
</script>
<body>
<div id="header"></div>
	
<br /><br />
  <div class="container" style="margin-top:-370px;">
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
    <div align="center">
     <button type="button" name="save" id="save" class="btn btn-info">Save</button>
    </div>
    <br />
    <div id="inserted_item_data"></div>
   </div>
   
  </div>  
  <div id="footer-section"></div>
</body>
</html>
<script>
    $(document).ready(function(){
        var count = 1;
        $('#add').click(function(){
        count = count + 1;
        var html_code = "<tr id='row"+count+"'>";
        html_code += "<td contenteditable='true' class='item_id'></td>";
        html_code += "<td contenteditable='true' class='item_name'></td>";
        html_code += "<td class='item_size'><select name='i_size' id='i_size'><option value='S'>S</option><option value='M'>M</option><option value='L'>L</option></td>";
        html_code += "<td contenteditable='true' class='item_quantity' ></td>";
        html_code += "<td contenteditable='true' class='item_price' ></td>";
        html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
        html_code += "</tr>";  
        $('#crud_table').append(html_code);
        });
        
        $(document).on('click', '.remove', function(){
        var delete_row = $(this).data("row");
        $('#' + delete_row).remove();
        });
        $('#save').click(function(){
        var item_id = [];
        var item_name = [];
        var item_size = [];
        var item_quantity = [];
        var item_price=[];
        $('.item_id').each(function(){
        item_id.push($(this).text());
        });
        $('.item_name').each(function(){
        item_name.push($(this).text());
        });
        $('.item_size').each(function(){
           item_size.push($(this).find('#i_size :selected').text());
        });
        $('.item_quantity').each(function(){
        item_quantity.push($(this).text());
        });
        $('.item_price').each(function(){
        item_price.push($(this).text());
        });
        $.ajax({
        url:"./includes/add-to-database.php",
        method:"POST",
        data:{item_id:item_id, item_name:item_name, item_size:item_size, item_quantity:item_quantity,item_price:item_price},
        success:function(response){

          var jsonData = JSON.parse(response);
            if(jsonData.success==1){
                $("td[contentEditable='true']").text("");
            for(var i=2; i<= count; i++)
            {
            $('#row'+i).remove();
            }
            swal({title: 'success!',text: 'Data added successfully!',type: 'success'});
            }else if(jsonData.success==2){
                swal({title: 'Oops!',text: 'Please try again!',type: 'error'});  
            }else{
                swal({title: 'Oops!',text: 'All fields are required!',type: 'error'});   
            }
        }
        });
        });
        
    });
</script>
<?php
else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif?>