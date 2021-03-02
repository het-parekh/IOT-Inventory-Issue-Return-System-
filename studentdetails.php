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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src = "js/students.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <style>
        body{
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            background-image: url(./images/back.jpg);
            margin: 0;
        }

        .info{
            position: relative;
            display: block;
            margin: auto;
            max-width: 90%;
            background:#fff;
            width:600px;
            padding:50px;
            box-shadow:0 2px 5px rgba(0,0,0,.25);
            border-radius: 10px;
        }
        .form-control{
            transition: all .5s ease-in;
            border:none;
            border-bottom: 1px solid rgba(0,0,0,.2);
        }
        .form-control::placeholder{
            transition:all .3s ease;
        }
        .form-group > input:focus,
        .form-group > input:active{
            border-color: #0d6efd;
            box-shadow: none;
        }
        .form-group > label{
            margin-left:12px;
        }
        .form-control:focus::placeholder{
            color:#0d6efd;
        }
        .form-group .photo-button{
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
        input[type="file"] {
            position: absolute;
            top: 6px;
            left: 57px;
            font-size: 15px;
            color: rgb(153,153,153);
        }
        #import #myFile{
            left:55px !important;
        }
    </style>
</head>
<script>
	 $(function(){
	$("#header").load("header.html");
	$("#footer-section").load("footer.html"); 

});
</script>
<body>
    <div id="header"></div>
    <br>
    <br>
    <!-- <div class="dashcard" style="margin-top:-370px;"> -->
        <div class="info" style="margin-top:-370px;">
            <h1 style="text-align: center;">Student Details</h1>
            <form enctype="multipart/form-data" method = "POST" id = "input_form" action="students.php">
                <div class="form-group">
                  <!-- <label >Student ID</label> -->
                  <br>
                  <input class="form-control"  required style="outline:none;" id="exampleInputEmail1" placeholder="Student ID*">
                </div>
                <br>
                <div class="form-group" style="position:relative;">
                <form action="/action.php">
                    <label for="myFile" style="left:15px;" class="photo-button">Student Photo</label>
                    <br>
                    <input accept="image/*" type="file" id="myFile" name="s_photo">
                </form>
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Student Name</label> -->
                    <input name="s_name" class="form-control" required placeholder="Name*">
                </div>
                <br>
                <div class="form-group">
                  <!-- <label>Year</label> -->
                  <input name="s_year" class="form-control" required placeholder="Current Year*">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Roll Number</label> -->
                    <input name="s_roll" class="form-control" required placeholder="Roll Number*">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Department</label> -->
                    <input name="s_dept" class="form-control" required placeholder="Department*">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Group ID</label> -->
                    <input name="s_grp" class="form-control" placeholder="Group ID">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Student Mobile Number</label> -->
                    <input name="s_mobile" type="tel" class="form-control" required placeholder="Student Mobile Number*">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Parent Mobile Number</label> -->
                    <input name="s_p_mobile" type="tel" class="form-control" placeholder="Parent Mobile Number">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Student Email Address</label> -->
                    <input name="s_email" type="email" class="form-control" required placeholder="Student Email Address*">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Parent email address</label> -->
                    <input name="s_p_email" type="email" class="form-control"  placeholder="Parent Email address">
                </div>
                <br>
                <center><h5>OR</h5></center>
                <br />
                <div class="form-group" style="position:relative;">
                <form  enctype="multipart/form-data" method = "POST" id="import_form">
                    <label for="import" class="photo-button">Import from Excel</label>
                    <br>
                    <input accept=".csv, .xls, .xlsx" type="file" id="import" name="import">
                    <div style="margin-top:-10px;color:#b30000"> 
                    <ul>
                    <li>Only .xls,.xlsx,.csv file formats are allowed.</li>
                    <li>Ensure that the the file has headers in the following order :- <small>(Student ID*, Student photo link, 
                    Student Year*, Student Roll No.*, Department Name*, Group ID, Student Name*, Student Mobile*,Student Email*, 
                    Parent's mobile No., Parent's Email ) </small></li>
                    <li>No space between rows or columns.</li>  </div>
                    </ul>
                </form>
                </div>
                <br>
                <center>
                <button type="button" id="submit" class="btn btn-primary">Submit</button>
                </center>
            </form>
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