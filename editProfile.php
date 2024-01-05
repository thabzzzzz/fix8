<?php
        //include auth_session.php file on all user panel pages
        include("auth_session.php");
        require('db.php');
        ?>
                        <?php




$user=$_SESSION["username"];

?>

<?php
if (isset($_POST['submit'])) {
    $user = $_SESSION['username'];

    $fullName = $_POST['fullName'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];
    $place = $_POST['place'];
    $DoB = $_POST['DoB'];

    // Fetch existing user data from the database
    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result);

    // Check and update fields only if they are not empty
    if (!empty($fullName)) {
        $fullName = mysqli_real_escape_string($con, $fullName);
    } else {
        $fullName = $row['fullName'];
    }

    if (!empty($description)) {
        $description = mysqli_real_escape_string($con, $description);
    } else {
        $description = $row['description'];
    }

    if (!empty($contact)) {
        $contact = mysqli_real_escape_string($con, $contact);
    } else {
        $contact = $row['contact'];
    }

    if (!empty($place)) {
        $place = mysqli_real_escape_string($con, $place);
    } else {
        $place = $row['location'];
    }

    if (!empty($DoB)) {
        $DoB = mysqli_real_escape_string($con, $DoB);
    } else {
        $DoB = $row['dateOfBirth'];
    }

    // Handle profile picture upload
    if ($_FILES['fileToUpload']['size'] > 0) {
        $target_dir = "profilePics/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

        // Add your checks for file type and size here

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // File uploaded successfully, update the profilePic field
            $picName = $_FILES["fileToUpload"]["name"];
            $updateQuery = "UPDATE users SET fullName='$fullName', description='$description', contact='$contact', location='$place', dateOfBirth='$DoB', profilePic='$picName' WHERE username='$user'";
            $result = $con->query($updateQuery);

            if ($result) {
                // Profile updated successfully
                echo "Profile updated successfully!";
            } else {
                // Error updating profile
                echo "Error updating profile!";
            }
        } else {
            // Error uploading file
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        // If no image uploaded, update other profile fields only
        $updateQuery = "UPDATE users SET fullName='$fullName', description='$description', contact='$contact', location='$place', dateOfBirth='$DoB' WHERE username='$user'";
        $result = $con->query($updateQuery);

        if ($result) {
            // Profile updated successfully
            header("Location: profile.php");
            exit();
        } else {
            // Error updating profile
            echo "Error updating profile!";
        }
    }
}
?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Edit Profile</title>
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
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>



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
            <h3>Edit your profile</h3>

            <div class="row cardsrow " >
          
            
                
                    <?php
    $user=$_SESSION["username"];


    $sql = " SELECT * FROM users WHERE username='$user' ";
    $result = $con->query($sql);
    $row = mysqli_fetch_array($result);
                    
                   
                 echo"   <div class='d-flex flex-column align-items-center text-center p-3 py-5'><img class='rounded-circle mt-5' src='profilePics/".$row['profilePic']."' width='120' height='120'></div> "

                    ?>

                    <form  action='editProfile.php' method='POST' enctype='multipart/form-data'>
                    <div class="row mt-2">
                    <div class="col-md-6"><input type="text" class="login-input"  placeholder="Name" name='fullName'></div>
                    <div class="col-md-6"><input type="text" class="login-input" placeholder="Short description about yourself" name='description'>></div>
                        
                       
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6"><input type="text" class="login-input" placeholder="Contact(email or number)" name='contact'>></div>
                        <div class="col-md-6"><input type="text" class="login-input" placeholder="Location" name='place'>></div>
                    </div>
                    <div class="row mt-3">
                   
                     
                        <div class="col-md-6"><input type="date" class="login-input" placeholder="Date of Birth" name='DoB' ></div>
                      
                    </div>
                    <div class="row col-4 ">
                    <input type='file' class='form-control' name='fileToUpload' id='picToUpload'  />
                    </div>
                  

                    
                    <div class="mt-5 text-right"><input type="submit" name="submit" value="Update profile" class="btn btn-primary" style='background-color: black!important; border-color: #afe828!important;' ></div> 
                     <div class="mt-5 text-right"><input  name="delete" id="delete" value="Delete profile" class="btn btn-primary" style='background-color: black!important; border-color: #afe828!important;' ></div>
                   
                    </form>
 

</div>

             
           
        </div> 
            </div>
            <?php
            include('footer.php');
            ?>
        </body>

        <script src="script.js"></script>
        </html>