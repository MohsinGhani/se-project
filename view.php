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
        <div class="row">
            <div class="col-sm-6">
                Lecture Type <?php echo $row['lec_type']; ?>
            </div>
            <div class="col-sm-6 web-cam">
            <div id="my_camera" style="width: 100%; height: 100%"></div>
            <!-- First, include the Webcam.js JavaScript Library -->
            <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
            <script type="text/javascript" src="webcam.min.js"></script>
            
            <!-- Configure a few settings and attach camera -->
            <script language="JavaScript">
                Webcam.set({
                    width: 530,
                    height: 400,
                    image_format: 'jpeg',
                    jpeg_quality: 90
                });
                Webcam.attach( '#my_camera' );
            </script>
            <!-- A button for taking snaps -->
            <form>
                <input type="button" value="Start" onClick="setup(); $(this).hide().next().show();">
            </form>
            </div>
        </div>
    </div>
    <!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function setup() {
			Webcam.reset();
			Webcam.attach( '#my_camera' );
		}
		
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				document.getElementById('results').innerHTML = 
					'<h2>Here is your image:</h2>' + 
					'<img src="'+data_uri+'"/>';
			} );
		}
	</script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
</body>
</html>