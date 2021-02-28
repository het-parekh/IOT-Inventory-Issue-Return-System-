<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        body{
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";
            background-color: #fff;
            margin: 0;
        }

        .dashcard{
            position: relative;
            display: block;
            margin: auto;
            max-width:85%;
            box-shadow: 0 20px 50px 0 rgba(0, 0, 0, 0.19);
            border-radius: 40px;
            background-color: #fff;
            padding: 20px;
        }

        .info{
            position: relative;
            display: block;
            margin: auto;
            max-width: 60%;
        }
    </style>
</head>

<body>
    <br>
    <br>
    <div class="dashcard">
        <h1 style="text-align: center;">Student Details</h1>
        <br>
        <br>
        <div class="info">
            <form>
                <div class="form-group">
                  <label >Student ID</label>
                  <br>
                  <input class="form-control" id="exampleInputEmail1" placeholder="Student ID">
                </div>
                <br>
                <div class="form-group">
                <form action="/action.php">
                    <label>Student Photo</label>
                    <br>
                    <input type="file" id="myFile" name="filename">
                </form>
                </div>
                <br>
                <div class="form-group">
                    <label>Student Name</label>
                    <input class="form-control" placeholder="Name">
                </div>
                <br>
                <div class="form-group">
                  <label>Year</label>
                  <input class="form-control" placeholder="Current Year">
                </div>
                <br>
                <div class="form-group">
                    <label>Roll Number</label>
                    <input class="form-control" placeholder="Roll Number">
                </div>
                <br>
                <div class="form-group">
                    <label>Department</label>
                    <input class="form-control" placeholder="Department">
                </div>
                <br>
                <div class="form-group">
                    <label>Group ID</label>
                    <input class="form-control" placeholder="Group ID">
                </div>
                <br>
                <div class="form-group">
                    <label>Student Mobile Number</label>
                    <input type="tel" class="form-control" placeholder="XXXXXXXXXX">
                </div>
                <br>
                <div class="form-group">
                    <label>Parent Mobile Number</label>
                    <input type="tel" class="form-control" placeholder="XXXXXXXXXX">
                </div>
                <br>
                <div class="form-group">
                    <label>Parent email address</label>
                    <input type="tel" class="form-control" placeholder="example@gmail.com">
                </div>
                <br>
                <div class="form-group">
                <form action="/import.php">
                    <label>Import from Excel</label>
                    <br>
                    <input type="file" id="myFile" name="filename">
                </form>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>