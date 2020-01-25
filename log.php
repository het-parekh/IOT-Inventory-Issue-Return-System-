<?php
 if(isset($_COOKIE['username'])):{
    $name=$_COOKIE['username'];
 }
?>
<html>

<head>
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <script src="./js/log.js"></script>
    <link rel="stylesheet" type="text/css" href="css/log.css">
</head>


<body style="background-color: white;margin:0px;padding:0px">
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
    
    <div style="width:100%;" >
    <div class="logo">
    <a >Logs</a>
</div>
<center>
    <div id="issue" class="list-type1" style="width:87%;text-align:left;" >
        <ol >
    <div id="log">
    </div>
</ol>
</div>
</center>
<div id="return">
</div>
</div>


</body>
</html>
<?php
else:{
    echo "<script>location.href='loginpro7.php'</script>";
}
endif
?>