<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lecture Tool</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>
<body style="background:#eaecf1">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Lecture Tool</a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <button onclick="showLecForm()" type="button" class="btn btn-secondary add-lec-btn" id="add_lec_btn">Lecture List</button>
                <button onclick="hideLecForm()" type="button" class="btn btn-secondary add-lec-btn hidethis" id="list_lec_btn">Add Lecture</button>
            </div>
        </div>

        <div class="row lec-form" id="lec_container">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="lec_title" class="form-control" id="lec_title" placeholder="Lecture Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Lecture No.</label>
                    <input type="number" name="lec_no" class="form-control" id="lec_no" placeholder="Lecture Title">
                </div>
                <div class="form-group">
                    <label for="prog_type">Program</label>
                    <select class="form-control" id="prog_type"  name="prog_type">
                        <option>Accounting & Finance</option>
                        <option>Engineering</option>
                        <option>Applied & Pure Sciences</option>
                        <option>Business & Management</option>
                        <option>Computer Science & IT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="course_name">Course Name</label>
                    <input type="text" class="form-control" id="course_name" placeholder="Course Name"  name="course_name">
                </div>
                <div class="form-group">
                    <label for="lec_type">Lecture Type</label>
                    <select class="form-control" id="lec_type" name="lec_type">
                        <option>MS Power Point</option>
                        <option>MS Word</option>
                        <option>Video</option>
                        <option>Audio</option>
                        <option>Image</option>
                    </select>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-secondary btn-block">Submit</button>
                </form>
            </div>
        </div>

        <div class="row lec_list-cls hidethis" id="lec_list">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php

        $db = new PDO('mysql:host=localhost;dbname=lecture;charset=utf8mb4', 'root', '123456');
        if(isset($_POST['submit'])){
            $lec_title = $_POST['lec_title'];
            $lec_no = $_POST['lec_no'];
            $prog_type = $_POST['prog_type'];
            $lec_type = $_POST['lec_type'];
            $course_name = $_POST['course_name'];
        if($lec_title == ""){
                echo "<script>window.open('index.php?name=Error: Student Name is Required','_self')</script>";
        }
        if($lec_no == ""){
                echo "<script>window.open('index.php?f_name=Error: Father Name is Required','_self')</script>";
        }
        if($prog_type == "Select Program"){
                echo "<script>window.open('index.php?course=Error: Please Select Your Program','_self')</script>";
        }
        if($lec_type == ""){
                echo "<script>window.open('index.php?number=Error: lec_type Number is Required','_self')</script>";
        }
        if($course_name == ""){
                echo "<script>window.open('index.php?adress=Error: course_name is Required','_self')</script>";
        }
        else{
            $query = "insert into lectures(lec_title,lec_no,prog_type,lec_type) values('$lec_title','$lec_no','$prog_type','$lec_type)";
            $run = mysql_query($query);
            if($run){
                echo "<script>alert('Data has been insert Successfully');</script>";
            }
        else{
            echo mysql_error();
        }
        }
        }
    ?>
    

    <script>
        function showLecForm(){
            document.getElementById("lec_container").classList.add('hidethis');
            document.getElementById("add_lec_btn").classList.add('hidethis');
            document.getElementById("lec_list").classList.remove('hidethis');
            document.getElementById("list_lec_btn").classList.remove('hidethis');
        }

        function hideLecForm(){
            document.getElementById("add_lec_btn").classList.remove('hidethis');
            document.getElementById("lec_container").classList.remove('hidethis');
            document.getElementById("list_lec_btn").classList.add('hidethis');
            document.getElementById("lec_list").classList.add('hidethis');
        }
    </script>

  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
</body>
</html>