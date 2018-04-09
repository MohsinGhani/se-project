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
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Lecture No</th>
                        <th scope="col">Program Type</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Lecture Type</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $servername = "localhost";
                    $database = "lecture";
                    $username = "root";
                    $password = "123456";
                    $db = mysqli_connect($servername, $username, $password, $database);
                    if (!$db) {
                        die("Connection failed: " . mysqli_connect_error());
                    }else{
                        // echo 'Database successfully connected';
                    }
                    $query = mysqli_query($db, "SELECT * FROM lectures") or die (mysqli_error($dbconnect));
                    while ($row = mysqli_fetch_array($query)) {
                        echo
                         "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['lec_title']}</td>
                            <td>{$row['lec_no']}</td>
                            <td>{$row['prog_type']}</td>
                            <td>{$row['course_name']}</td>
                            <td>{$row['lec_type']}</td>
                         </tr>";
                      
                      }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
        $servername = "localhost";
        $database = "lecture";
        $username = "root";
        $password = "123456";
        $db = mysqli_connect($servername, $username, $password, $database);
        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            // echo 'Database successfully connected';
        }
        
        if(isset($_POST['submit'])){
            $lec_title = $_POST['lec_title'];
            $lec_no = $_POST['lec_no'];
            $prog_type = $_POST['prog_type'];
            $lec_type = $_POST['lec_type'];
            $course_name = $_POST['course_name'];
            if($lec_title == ""){
                echo "<script>window.open('index.php?name=Error: Lecture Title is Required','_self')</script>";
            }
            if($lec_no == ""){
                echo "<script>window.open('index.php?f_name=Error: Lecture Number is Required','_self')</script>";
            }
            if($prog_type == "Select Program"){
                echo "<script>window.open('index.php?course=Error: Program Type is Required','_self')</script>";
            }
            if($lec_type == ""){
                echo "<script>window.open('index.php?number=Error: Lecture Type is Required','_self')</script>";
            }
            if($course_name == ""){
                echo "<script>window.open('index.php?adress=Error: Course Name is Required','_self')</script>";
            }
            else{
                $query = "INSERT INTO lectures(lec_title,lec_no,prog_type,course_name,lec_type) VALUES('$lec_title','$lec_no','$prog_type','$course_name','$lec_type')";
                if (mysqli_query($db, $query)) {
                    echo "<script>alert('New record created successfully')</script>";
                } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($db);
                }
                mysqli_close($db);
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