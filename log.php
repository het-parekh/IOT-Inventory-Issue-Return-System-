<?php
 if(isset($_COOKIE['username'])):{
    $name=$_COOKIE['username'];
 }
?>
<html>

<head>
<link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src= "//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"> 
</script> 
</head>

<script>
	 	 $(function(){
	$("#header").load("header.html"); 
});
</script>
<body style="background-color: white;margin:0px;padding:0px">
<div id="header"></div>

    <div style="width:100%;" >
    <div class="logo">
    <a >Logs</a>
</div>
<button class="download-btn" id="download-btn" ><i class="fa fa-download"></i> Download</button>
<center>
    <table id="log">
    <thead>
       <tr>
       <th>User</th>
       <th>Transaction</th>
       <th>Group</th>
       <th>Roll No.</th>
       <th>Branch</th>
       <th>Component ID(s)</th>
       <th>Date</th>
       <th>Time</th>
       </tr>
    </thead>
    <tbody>
</table>
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