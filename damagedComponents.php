<?php
if(isset($_COOKIE['username'])):{
	$name=$_COOKIE['username'];
	include "includes/DB.php";
	$data=($con)?(mysqli_query($con,"Select user_name from admin where email='$name'")):"";
	$result=mysqli_fetch_assoc($data)['user_name'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
</head>
<style>

    .container{
        padding:80px;
        display:flex;
        justify-content: center;
        align-items:center;
        flex-direction:column;
    }
  .ui-helper-hidden-accessible{
      display:none;
  }
  .ui-menu{
      list-style:none;
      background:#ccc;
      position:relative;
      z-index:200;
      max-width:300px;
  }
  .ui-menu > li{
      cursor:pointer;
  }
  #newly-damaged{
      display:none;
  }
  #newly-damaged.active{
      position:fixed;
      top:50%;
      left:50%;
      transform:translate(-50%,-50%);
      min-width:90vw;
      padding:28px;
      box-shadow: 0px 8px 16px rgba(0,0,0,.5);
      border-radius: 10px; 
      background:#fcfcfc;
      height:auto;
      display:flex;
      justify-content:center;
      align-items:center;
      flex-direction:column;
  }
  #newly-damaged.active #close-modal{
      position: absolute;
      right:2%;
      top:10%;
      cursor:pointer
  }
  .jconfirm-box{
      min-width:300px;
  }

  #repair-comp{
      display:none;
  }
  #repair-comp.active{
    position:fixed;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    width:50%;
    max-width:300px;
    padding:28px;
    box-shadow: 0px 8px 16px rgba(0,0,0,.5);
    border-radius: 10px; 
    background:#fcfcfc;
    height:auto;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
  }

  #repair-comp.active #close-repair-modal{
      position: absolute;
      right:3%;
      top:6%;
      cursor:pointer
  }
</style>
<body>

  <div id="header"></div>
    <!-- Popup to add new damaged component -->
    <div id="newly-damaged">
        <div id="close-modal"> &#10006; </div>
        <table class="table">
            <thead>
                <th>Component Name</th>
                <th>Component Id</th>
                <th>Available Quantity</th>
                <th>Enter damaged Quantity
            </thead>
            <tbody>
                <tr>
                    <td>
                        <input type="text" required class="form-control form-control-sm c_name"
                        >
                    </td>
                    <td>
                        <input type="text" name="C_id" required class="form-control  form-control-sm c_id"
                        >
                    </td>
                    <td>
                        <input type="number" required class="form-control form-control-sm avail_qty" id="id_avail_qty">
                    </td>
                    <td>
                        <input type="number" required class="form-control form-control-sm dmg_qty" id="id_dmg_qty">
                    </td>
                </tr>

            </tbody>
        </table>
        <button id="mark-new-damage" class="btn btn-outline-danger mt-3">Mark as Damaged</button>

    </div>

    <!-- Popup to mark damaged component as repaired -->
    <div id="repair-comp">
        <div id="close-repair-modal"> &#10006; </div>
        <div class="inputs-cont">
            <label>Component Name</label>
            <input class="form-control form-control-sm" id="comp_name" type="text" value="">
            <label>Repaired Quantity</label>
            <input class="form-control form-control-sm" type="number" id="dmg_qty">
        </div>
        <button class="btn btn-outline-info mt-4" id="repair-db">Repair</button>       
    </div>
    </div>
    <!-- Display list of damaged component -->
    <div class="container">
        <h1 class="mb-3"> Damaged Components List</h1>

        <table class="table table-striped">
            <tr>
                <th>C ID</th>
                <th>Description</th>
                <th>Size</th>
                <th>Available Quantity</th>
                <th>Price</th>
                <th>Damaged Quantity</th>
                <th>Change Status</th>
            </tr>
            <?php
                
                if($con){
                    // echo "connection success";
                    $query="Select C_ID, Description, Size, Quantity, Price,Quantity_Damaged FROM components where Quantity_Damaged > 0";
                    $data=(mysqli_query($con,$query));
                    if(mysqli_num_rows($data)>0){
                        while($row =mysqli_fetch_assoc($data)){
            ?>
                            <tr>
                                <td> <?php echo $row['C_ID']; ?> </td>
                                <td> <?php echo $row['Description']; ?> </td>
                                <td> <?php echo $row['Size']; ?> </td>
                                <td> <?php echo ($row['Quantity'] - $row['Quantity_Damaged']); ?> </td>
                                <td> <?php echo $row['Price']; ?> </td>
                                <td> <?php echo $row['Quantity_Damaged']; ?> </td>
                                <td>
                                    <button onclick="repair('<?php echo $row['Description'] ?>','<?php echo $row['C_ID'] ?>', '<?php echo $row['Quantity_Damaged'] ?>')" class="btn btn-outline-info <?php echo $row['C_ID'] ?>"  >Repaired</button>
                                </td>
                            </tr>
            <?php }
                    }

                }
                else
                {
                    echo "connection unsuccessful";
                }
            ?>
        </table>
        <div class="add-damaged-component text-center mt-3">
                <button class="btn btn-outline-success" id="add-Damaged-comp">Add new Damaged component</button>
        </div>

    </div>
    

  <script>

	$("#header").load("./header.html")

    
    const btnShowAdd = document.querySelector('#add-Damaged-comp')
    const closeModal = document.querySelector('#close-modal')
    const popupModal = document.querySelector('#newly-damaged')
    const closeRepairModal = document.querySelector('#close-repair-modal')
    btnShowAdd.addEventListener('click',()=>{
        popupModal.classList.add('active')
    })

    closeModal.addEventListener('click', ()=>{
        popupModal.classList.remove('active')
    })


    const repairModal = document.querySelector('#repair-comp')
    const nameInput = document.querySelector('#comp_name')
    const qtyInput = document.querySelector('#dmg_qty')

    const repairFromDb = document.querySelector('#repair-db')

    const DOMAIN = 'http://localhost/final'


    closeRepairModal.addEventListener('click', ()=>{
        repairModal.classList.remove('active')
    })

    function repair(name,id,qty){
        console.log(name,id,qty)


        nameInput.value = name
        qtyInput.value = qty
        qtyInput.max = qty
        repairModal.classList.add('active')

        repairFromDb.addEventListener('click',(e)=>{
        
        if(parseInt(qtyInput.value) > parseInt(qty)){
            e.preventDefault()
            alert('please enter quantity lower than damaged quantity');
        }
        else{
            $.ajax({
                method: "POST",
                url: DOMAIN+"/includes/repair.php",
                data:{c_id: id, qty: qtyInput.value},
                success: function(msg){
                    location.reload();
                }
            })
        }
        
    })
        
    }

  </script>

</body>
</html>

<?php else:{
	echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>