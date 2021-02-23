<?php
if(isset($_COOKIE['username'])):{
    $name=$_COOKIE['username'];
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

</head>
<style>
		.topnav {
			background-color:#f5f5f0;
			overflow: hidden;
		}

		/* Style the links inside the navigation bar */
		.topnav a {
		float: right;
		color:Black;
		text-align: center;
		padding: 20px 16px;
		font-family: 'Lato', sans-serif;
		font-weight:Bold;
		text-decoration: none;
		font-size: 17px;
		}

		/* Change the color of links on hover */
		.topnav a:hover {
		color:#A12023;
		}
		.logout a:hover{
			color:red;
		}

		/* Add a color to the active/current link */
		.topnav a.active {
		background-color: grey;
		color:#A12023;
		}

		/* Right-aligned section inside the top navigation */
		.topnav-right {
		float: right;
		}   

		.dropdown{
		margin-top: 30px ;
		text-align: center;
		}
		.an{
			float:left;
			padding-top:2px;
			margin-Bottom:18px;
			padding-left:8px;
			height:80px;
			width:100x;
		}
		.trust{
			float:right;
			padding-top:8px;
			padding-Right:15px;
			height:70px;
			width:100x;
		}

	</style>
<body>
<div class="topnav" style="margin-bottom:0px;padding:0px">
		
		<img src="https://kjsieit.somaiya.edu/assets/arigel_general/img/homepage/Trust.svg" alt="" class="trust">
		
			<a href="logout.php"><button type="button" style="cursor:pointer;font-size:14px;padding:6px" class="btn btn-outline-danger">LOGOUT</button></a>
			<a href="search.php">Components</a>
			<a href="log.php">Log</a>
			<a href="Issue_and_Return.php">Issue/Return</a>
            <a href="GroupForm.php">New Group</a>
            <a style="padding-right:0px;margin:0px">
            <a class="nav-link dropdown-toggle" style="padding-right:0px;margin:0px" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Issue Details
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="display.php">IT</a>
                <a class="dropdown-item" href="displayother.php">Other</a>    
                <div class="dropdown-divider"></div>
            </div>

             </a>
			<a href="dashboard-new.php">Dashboard</a>
			<div class="an"><a href="dashboard-new.php" class="an" ><img style="height:60px;width:320px" src="https://kjsieit.somaiya.edu/assets/kjsieit/images/Logo/kjsieit-logo.svg" alt="KJSIEIT" class="desktop"></a></div>
		</div>
<br /><br />
  <div class="container">
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
      <td contenteditable="true" class="item_size"></td>
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
        html_code += "<td contenteditable='true' class='item_size'></td>";
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
        item_size.push($(this).text());
        });
        $('.item_quantity').each(function(){
        item_quantity.push($(this).text());
        });
        $('.item_price').each(function(){
        item_price.push($(this).text());
        });
        $.ajax({
        url:"add-to-database.php",
        method:"POST",
        data:{item_id:item_id, item_name:item_name, item_size:item_size, item_quantity:item_quantity,item_price:item_price},
        success:function(response){
          
          var jsonData = JSON.parse(response);
          
            if(jsonData.success==1){
                $("td[contentEditable='true']").text("");
            for(var i=2; i<= count; i++)
            {
            $('tr#'+i+'').remove();
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