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
<script>
        function selectType(){
            var x = document.getElementById("lec_type").value;
            if(x == 'ppt'){
                document.getElementById("ppt_input").classList.remove('hidethis');
                document.getElementById("doc_input").classList.add('hidethis');
            }else{
                document.getElementById("doc_input").classList.remove('hidethis');
                document.getElementById("ppt_input").classList.add('hidethis');
            }
        }

        function gotoList(){
            window.location = 'list.php';
        }
    </script>

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
                <a href="list.php" type="button" class="btn btn-secondary add-lec-btn" id="add_lec_btn">Lecture List</a>
            </div>
        </div>

        <div class="row lec-form" id="lec_container">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
            <form enctype="multipart/form-data" action="index.php" method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" name="lec_title" class="form-control" id="lec_title" placeholder="Lecture Title">
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
                    <select class="form-control" id="lec_type" name="lec_type"  onchange="selectType()">
                        <option value="null">Select Lecture Type</option>
                        <option value="ppt">MS Power Point</option>
                        <option value="msdoc">MS Word</option>
                        <option value="video">Video</option>
                        <option value="audio">Audio</option>
                        <option value="image">Image</option>
                    </select>
                </div>
                <div id="ppt_input" class="hidethis form-group">
                    <label for="ppt_path">Embed Path</label>
                    <input type="text" class="form-control" id="ppt_path" placeholder="Write Embed Path"  name="ppt_path">
                </div>
                <div id="doc_input" class="hidethis form-group">
                    <input type="file" name="uploaded_file"></input>
                </div>
                <button type="submit" name="submit" class="btn btn-outline-secondary btn-block">Submit</button>
                </form>
            </div>
        </div>
    </div>

    <?php
        $servername = "localhost";
        $database = "lecture";
        $username = "root";
        $password = "";
        $db = mysqli_connect($servername, $username, $password, $database);

        if (!$db) {
            die("Connection failed: " . mysqli_connect_error());
        }else{
            // echo 'Database successfully connected';
        }
        
        if(isset($_POST['submit'])){
            $lec_title = $_POST['lec_title'];
            $prog_type = $_POST['prog_type'];
            $lec_type = $_POST['lec_type'];
            $course_name = $_POST['course_name'];
            $ppt_path = $_POST['ppt_path'];
            // $uploaded_file = $_POST['uploaded_file'];
            if($lec_title == ""){
                echo "<script>window.open('index.php?name=Error: Lecture Title is Required','_self')</script>";
            }
            if($prog_type == "Select Program"){
                echo "<script>window.open('index.php?course=Error: Program Type is Required','_self')</script>";
            }
            if($lec_type == "null"){
                echo "<script>window.open('index.php?number=Error: Lecture Type is Required','_self')</script>";
            }
            if($course_name == ""){
                echo "<script>window.open('index.php?adress=Error: Course Name is Required','_self')</script>";
            }
            else{
                $path = "uploads/";
                if(!empty($_FILES['uploaded_file'])){
                    $path = $path . basename( $_FILES['uploaded_file']['name']);
                    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $path)) {
                        // echo "The file ".  basename( $_FILES['uploaded_file']['name']). " has been uploaded";
                    } else{
                        // echo "There was an error uploading the file, please try again!";
                    }
                }
                if($lec_type == "ppt"){
                    $path = $ppt_path;
                    echo $path;
                }
                $query = "INSERT INTO lectures(lec_title,prog_type,course_name,lec_type,file_path) VALUES('$lec_title','$prog_type','$course_name','$lec_type','$path')";
                if (mysqli_query($db, $query)) {
                    echo "<script>
                            gotoList()
                        </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($db);
                }

                mysqli_close($db);
            }
        }
    ?>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
</body>
</html>