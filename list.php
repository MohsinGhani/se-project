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

</script>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="list.php">Lecture Tool</a>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-sm-10"></div>
            <div class="col-sm-2">
                <a href="index.php" type="button" class="btn btn-secondary add-lec-btn" id="list_lec_btn">Add Lecture</a>
            </div>
        </div>

        <div class="row lec_list-cls" id="lec_list">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Program Type</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Lecture Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
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
                    $query = mysqli_query($db, "SELECT * FROM lectures") or die (mysqli_error($dbconnect));
                    while ($row = mysqli_fetch_array($query)) {
                        echo
                         "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['lec_title']}</td>
                            <td>{$row['prog_type']}</td>
                            <td>{$row['course_name']}</td>
                            <td>{$row['lec_type']}</td>
                            <td style='display: flex'>
                                <form action='list.php' method='post'>
                                    <input type='submit' name='view' class='btn btn-secondary btn-sm' value='View' />
                                    <input type='hidden' name='id' value='{$row['id']}'/>
                                </form>
                                <form action='list.php' method='post'>
                                    <input type='submit' name='delete' class='btn btn-danger btn-sm' value='Delete' />
                                    <input type='hidden' name='id' value='{$row['id']}'/>
                                </form>
                            </td>
                         </tr>";
                      
                      }
                ?>
                <?php
                    if(isset($_POST['delete']) && $_POST['id']) {
                        echo $_POST['id'];
                    }
                    if(isset($_POST['view']) && $_POST['id']) {
                        echo "<script>
                                window.location = `view.php/?id={$_POST['id']}`;
                            </script>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>


  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
</body>
</html>