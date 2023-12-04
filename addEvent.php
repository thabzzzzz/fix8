    <?php
    //include auth_session.php file on all user panel pages
    include("auth_session.php");
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
    <img src="DLs/background/logo.svg" width="120" height="60" alt="">
  </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="dashboard.php" style="font-size: 30px">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="feed.php" style="font-size: 30px">Feed</a>
                </li>
            <li class="nav-item">
            <a class="nav-link" href="addEvent.php" style="font-size: 30px">Add event</a>
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
<img class="loginLogo" src="DLs/background/logo.svg" width="120" height="60" alt="">
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
    require('db.php');
    
    if (isset($_REQUEST['eventname'])) {

            $target_dir = "eventGallery/";
             $target_file = $target_dir
           . basename($_FILES["fileToUpload"]["name"]);
             $uploadOk = 1;

            
             if(isset($_FILES["fileToUpload"])  &&
             $_FILES["fileToUpload"]["error"] == 0) {
             $allowed_ext = array("jpg" => "image/jpg",
                 "jpeg" => "image/jpeg"
     
                 );
             $file_name = $_FILES["fileToUpload"]["name"];
             $file_type = $_FILES["fileToUpload"]["type"];
             $file_size = $_FILES["fileToUpload"]["size"];
     
             // Verify file extension
             $ext = pathinfo($file_name, PATHINFO_EXTENSION);
     
             if (!array_key_exists($ext, $allowed_ext)) {
                 die("Error: Please select a valid file format.");
             }
     
             // Verify file size - 1MB max
             $maxsize = 100048576;
     
             if ($file_size > $maxsize) {
                 die("Error: Picture must be 1MB or less");
             }
     
             // Verify MYME type of the file
             if (in_array($file_type, $allowed_ext))
             {
                 // Check whether file exists before uploading it
                 if (file_exists("upload/" . $_FILES["fileToUpload"]["name"])) {
                     echo $_FILES["fileToUpload"]["name"]." is already exists.";
                 }
                 else {
                     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
                         $target_file)) {
                         echo "The file ". $_FILES["fileToUpload"]["name"].
                             " has been uploaded.";
                             
                         
                         
                     }
                     else {
                         echo "Sorry, there was an error uploading your file.";
                     }
                 }
             }
             else {
                 echo "Error: Please try again.";
             }
         }
         else {
             echo "Error: ". $_FILES["fileToUpload"]["error"];
         }






     
        $eventname = stripslashes($_REQUEST['eventname']);
        $user=$_SESSION["username"];
        $eventname = mysqli_real_escape_string($con, $eventname);
        $description    = stripslashes($_REQUEST['description']);
        $description    = mysqli_real_escape_string($con, $description);
        $location = stripslashes($_REQUEST['location']);
        $location = mysqli_real_escape_string($con, $location);
        $tags = stripslashes($_REQUEST['tags']);
        $tags = mysqli_real_escape_string($con, $tags);
        $date = ($_REQUEST['date']);
        $picName=$_FILES["fileToUpload"]["name"];
        $query    = "INSERT into `tbevents` (eventname, description, date,location,hashtags, eventImage, assocUsers)
                     VALUES ('$eventname','$description','$date','$location','$tags','$picName','$user')";
        $result   = mysqli_query($con, $query);
       
    } else {
?>

<?php
    }
    if (isset($_REQUEST['editEventName'])) {

   
        $toEdit=($_REQUEST['editEvent']);


        $editName = stripslashes($_REQUEST['editEventName']);
        $editName = mysqli_real_escape_string($con, $editName);
        $editDescription =stripslashes($_REQUEST['editDescription']);
        $editDescription    = mysqli_real_escape_string($con, $editDescription);
        $editLocation = stripslashes($_REQUEST['editLocation']);
        $editLocation = mysqli_real_escape_string($con, $editLocation);
        $editTags = stripslashes($_REQUEST['editTags']);
        $editTags = mysqli_real_escape_string($con, $editTags);
        $editDate = ($_REQUEST['editDate']);
        //$query    = "UPDATE `tbevents` SET eventname=$editName, description=$editDescription, date=$editDate,location=$editLocation WHERE eventname='a'";
        $q2="UPDATE tbevents SET eventname='$editName',description='$editDescription',date='$editDate',location='$editLocation',hashtags='$editTags' WHERE eventname='$toEdit'";             
        $r2   = mysqli_query($con, $q2);
    }
    
?>




            
            </div>
            <br/>
        <br/>
       

           
        </div> 
    </body>
    </html>
