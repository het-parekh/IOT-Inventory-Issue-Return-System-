<?php
if(isset($_COOKIE['username'])):{
    $name=$_COOKIE['username'];
}
 
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Create Group</title>
        <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="./css/group.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css"
            href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
            

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
	<div class="topnav">
		
		<img src="https://kjsieit.somaiya.edu/assets/arigel_general/img/homepage/Trust.svg" alt="" class="trust">
		
			<div class="logout"><a href="logout.php">LOGOUT</a></div>
			<a href="search.php">Components</a>
			<a href="log.php">Log</a>
			<a href="Issue_and_Return.php">Issue/Return</a>
			<a href="GroupForm.php">Create group</a>
			<a href="dashboard-new.php">Dashboard</a>
			<div class="an"><a href="dashboard-new.php" class="an"><img style="height:60px;" src="https://kjsieit.somaiya.edu/assets/kjsieit/images/Logo/kjsieit-logo.svg" alt="KJSIEIT" class="desktop"></a></div>
		</div>
        <div class="mx-auto" style="width: 70%;margin-top:2%">
        <div class="card text-center" >
            <div class="card-header">
             <h1> Create Group</h1>
            </div>
            <div class="card-body">
              <form onsubmit="return false"> 
                <div id="year" class="input-group mb-3 ">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="inputGroupSelect01">Select Year</label>
                    </div>
                    <select class="custom-select" id="year1" style="max-width:100px">
                      <option value="1" selected>TE</option>
                      <option value="2">BE</option>
                    </select>
                  </div>
           
              <div class="card-text" id="main1"></div>
              
            </div>
            <div class="card-footer text-muted" align="right">
             <button class="myButton2" id="go" type="submit">GO</button>
            </div>
          
          </div>
          </div>
        </form>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
  
<script src="./js/group.js"></script>


</html>

<?php else:{
     echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>
