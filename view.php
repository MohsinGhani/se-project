<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Lecture Tool</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">
</head>
<body style="background:#eaecf1">
    <?php
        $row;
        if (isset($_GET['id'])) {
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
            $id = $_GET['id'];
            $query = "SELECT * from lectures where id='".$id."'";
            $result = mysqli_query($db, $query) or die ( mysqli_error());
            $row = mysqli_fetch_assoc($result);
        }
    ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Lecture Tool</a>
    </nav>
    
    <div class="container">
        <!-- <a href="./list.php" type="button" class="btn btn-secondary" style="margin-top: 10px;" id="list_lec_btn">Back</a> -->
        <div class="row">
            <div class="col-sm-12" style="padding:  20px;">
            <h2 style="text-align: center;">Lecture View</h2>
            <div style="width:500px;margin: 0 auto;">
                <?php
                    if($row['lec_type'] == 'ppt'){
                        $src = $row['file_path'];
                        echo "
                            <iframe src='$src' width='500px' height='450px' frameborder='0'>This is an embedded <a target='_blank' href='https://office.com'>Microsoft Office</a> presentation, powered by <a target='_blank' href='https://office.com/webapps'>Office Online</a>.</iframe>
                        ";
                    }else{
                        $src = $row['file_path'];
                            echo "
                                <embed src='$src' type='application/pdf' width='500px' height='450px'/>
                            ";
                    }
                    ?>
            </div>
            </div></div>

        <div class="row" style="margin-top: 40px">
            <h2>Lecture Detail</h2>
            <div class="col-sm-12">
            <table class="table table-hover">
            <tbody>
                <tr>
                    <th scope="row">Lecture ID</th>
                    <td><?php echo $row['id']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Lecture Title</th>
                    <td><?php echo $row['lec_title']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Course Name</th>
                    <td><?php echo $row['course_name']; ?></td>
                </tr>
                <tr>
                    <th scope="row">Lecture Type</th>
                    <td><?php echo $row['lec_type']; ?></td>
                </tr>
            </tbody>
            </table>
            </div>
        </div>
        <a href="/se-project/webrtc/public/?id=<?php echo $row['id']; ?>" style="margin-bottom:20px" class="btn btn-secondary btn-block btn-sm">Start Lecture</a>
    </div>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
</body>
</html>