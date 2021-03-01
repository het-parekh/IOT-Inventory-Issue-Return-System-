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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <style>
        body{
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            background-color: #fff;
            margin: 0;
        }

        .info{
            position: relative;
            display: block;
            margin: auto;
            max-width: 90%;
            background:#fcfcfc;
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
        #import{
            left:65px;
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
            <form>
                <div class="form-group">
                  <!-- <label >Student ID</label> -->
                  <br>
                  <input class="form-control" style="outline:none;" id="exampleInputEmail1" placeholder="Student ID">
                </div>
                <br>
                <div class="form-group" style="position:relative;">
                <form action="/action.php">
                    <label for="myFile" class="photo-button">Student Photo</label>
                    <br>
                    <input accept="image/*" type="file" id="myFile" name="filename">
                </form>
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Student Name</label> -->
                    <input class="form-control" placeholder="Name">
                </div>
                <br>
                <div class="form-group">
                  <!-- <label>Year</label> -->
                  <input class="form-control" placeholder="Current Year">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Roll Number</label> -->
                    <input class="form-control" placeholder="Roll Number">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Department</label> -->
                    <input class="form-control" placeholder="Department">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Group ID</label> -->
                    <input class="form-control" placeholder="Group ID">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Student Mobile Number</label> -->
                    <input type="tel" class="form-control" placeholder="XXXXXXXXXX">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Parent Mobile Number</label> -->
                    <input type="tel" class="form-control" placeholder="XXXXXXXXXX">
                </div>
                <br>
                <div class="form-group">
                    <!-- <label>Parent email address</label> -->
                    <input type="tel" class="form-control" placeholder="example@gmail.com">
                </div>
                <br>
                <div class="form-group" style="position:relative;">
                <form action="/import.php">
                    <label for="import" class="photo-button">Import from Excel</label>
                    <br>
                    <input type="file" id="import" name="filename">
                </form>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    <div id="footer-section"></div>
</body>
</html>

<script>
$('#import').change(function () {
    console.log($('#import').val())
    if($("#import").val() != ""){
        $('input').prop("readonly",true)
    }else{
        $('.form-control').prop("readonly",false)
    }
});

</script>