<?php
session_start();

require('db.php');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Add an event to your list</title>
        <link rel="stylesheet" href="style.css" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="apple-touch-icon" sizes="180x180" href="image/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="image/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="image/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet"> 
    </head>
    <body>

        <div class="container-fluid ">
        <nav class="navbar navbar-expand-lg navbar-dark ">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
    <img src="DLs/background/logo.png" width="120" height="60" alt="">
  </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link " aria-current="page" href="dashboard.php" style="font-size: 30px">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="feed.php" style="font-size: 30px">Feed</a>
                </li>
            <li class="nav-item">
            <a class="nav-link active" href="addEvent.php" style="font-size: 30px">Add event</a>
            </li>
           
            <li class="nav-item">
            <a class="nav-link " href="profile.php" tabindex="-1"  style="font-size: 30px">Profile: <?php echo $_SESSION['username']; ?></a>
            </li>
        </ul>
        </div>
        <a href="logout.php" class="btn btn-primary" style="background-color: #afe828!important; border-color: #afe828!important;">Logout</a>
        
        </div>
        
        </nav>
        <br/>
        <br/>
        <br/>
            <div class="welcome">
            
            
            <h3>Create an event here</h3>

            <div class="container-fluid">

    <form class="form" action="addEvent.php" method="POST" enctype='multipart/form-data'>
        <div class="form-group text-center">
        
        <input type="text" class="login-input" name="eventname" placeholder="Name for event" required />
        <input type="text" class="login-input" name="description" placeholder="Description ">
        <input type="text" class="login-input" name="location" placeholder="Location">
        <input type="date" class="login-input" name="date" placeholder="Date">
        <input type="text" class="login-input" name="tags" placeholder="Tags for your event">
        <input type='hidden' name='email' value='$email' id='email'/>
		<input type='hidden' name='pass' value='$pass' id='pass'/>
    

								<input type='file' class='form-control' name='fileToUpload' id='picToUpload'  /><br/>	
        <input type="submit" name="submit" value="Post event" class="btn btn-primary" style="background-color: #afe828!important; border-color: #afe828!important;" >
        
        </div>
    </form>


  <br/>
   <br/>
   <br/> <br/> <br/>
   <div class="form-group text-center">
  <h3>Edit an existing event</h3>
  <form class="form" action='addEvent.php' method='POST'>
    <p>Name of the event you want to edit</p>
  <input type='text'  name='editEvent' placeholder='Event name'>
  <br/><br/><br/><br/>
  <p>New values to update with</p>
  <input type='text' class="login-input" name='editEventName' placeholder='New event name'>
  <input type='text' class="login-input" name='editDescription' placeholder='Description'>
  <input type='text' class="login-input" name='editLocation' placeholder='Location'>
  <input type='date' class="login-input"  name='editDate' >
  <input type='text' class="login-input" name='editTags' placeholder='Tags'>
  <input type="submit" name="submit" value="Post event" class="btn btn-primary" style="background-color: #afe828!important; border-color: #afe828!important;" >
  </form>
   </div>

</div>






<?php
session_start();

require('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['eventname'])) {
        $target_dir = "eventGallery/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        // Validate and move uploaded file
        if (validateAndMoveFile()) {
            $eventname = mysqli_real_escape_string($con, $_POST['eventname']);
            $description = mysqli_real_escape_string($con, $_POST['description']);
            $location = mysqli_real_escape_string($con, $_POST['location']);
            $tags = mysqli_real_escape_string($con, $_POST['tags']);
            $date = $_POST['date'];
            $picName = $_FILES["fileToUpload"]["name"];
            $user = $_SESSION["username"];

            // Use prepared statement to prevent SQL injection
            $query = "INSERT INTO tbevents (eventname, description, date, location, hashtags, eventImage, assocUsers) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sssssss", $eventname, $description, $date, $location, $tags, $picName, $user);
            mysqli_stmt_execute($stmt);

            echo "<b class='success' style='color: rgb(77, 216, 77)'>Your event has been posted.</b>";

            mysqli_stmt_close($stmt);
        }
    }

    if (isset($_POST['editEventName'])) {
        $toEdit = $_POST['editEvent'];

        $editName = mysqli_real_escape_string($con, $_POST['editEventName']);
        $editDescription = mysqli_real_escape_string($con, $_POST['editDescription']);
        $editLocation = mysqli_real_escape_string($con, $_POST['editLocation']);
        $editTags = mysqli_real_escape_string($con, $_POST['editTags']);
        $editDate = $_POST['editDate'];

        // Use prepared statement to prevent SQL injection
        $q2 = "UPDATE tbevents SET eventname=?, description=?, date=?, location=?, hashtags=? WHERE eventname=?";
        $stmt2 = mysqli_prepare($con, $q2);
        mysqli_stmt_bind_param($stmt2, "ssssss", $editName, $editDescription, $editDate, $editLocation, $editTags, $toEdit);
        mysqli_stmt_execute($stmt2);

        mysqli_stmt_close($stmt2);
    }
}

// Function to validate and move uploaded file
function validateAndMoveFile() {
    $uploadOk = 1;
    $file = $_FILES["fileToUpload"];
    
    // Check file size
    if ($file["size"] > 1000000) {
        echo "Error: Picture must be 1MB or less";
        $uploadOk = 0;
    }

    // Allow only certain file formats
    $allowed_ext = array("jpg" => "image/jpg", "jpeg" => "image/jpeg");
    $ext = pathinfo($file["name"], PATHINFO_EXTENSION);

    if (!array_key_exists($ext, $allowed_ext)) {
        echo "Error: Please select a valid file format.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($file["tmp_name"])) {
        echo $file["name"] . " is already exists.";
        $uploadOk = 0;
    }

    // Move the file to the target directory
    if ($uploadOk == 1) {
        if (move_uploaded_file($file["tmp_name"], "upload/" . $file["name"])) {
            return true;
        } else {
            echo "Sorry, there was an error uploading your file.";
            return false;
        }
    } else {
        return false;
    }
}
?>




            
            </div>
            <br/>
        <br/>
       

           
        </div> 
    </body>
    </html>
