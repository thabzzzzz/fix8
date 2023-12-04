        <?php
        //include auth_session.php file on all user panel pages
        include("auth_session.php");
        require('db.php');
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Landing</title>
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
                
                
                <h3>Have a look at the events you've created so far</h3>
                
                </div>
                <br/>
            <br/>
                
                


                <div class="container mx-auto mt-4">
    <div class="row">
    <?php
    $user=$_SESSION["username"];


$sql = " SELECT * FROM tbevents WHERE assocUsers='$user' ";
$result = $con->query($sql);


?>




<?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "
    <div class='col-md-4'>
    <div class='card' style='width: 18rem;'>
<img src='eventGallery/".$row['eventImage']."' class='card-img-top' alt='...'>
<div class='card-body'>
    <h5 class='card-title'>". $row['eventname']."</h5>
        <p class='card-subtitle mb-2 text-muted'>". $row['date']." at: <b>". $row['location']."</b></p>
    <p class='card-text'>". $row['description']."</p>
    <br/>
    <footer class='blockquote-footer'><cite title='Source Title'>Tags: ". $row['hashtags']." </cite></footer>
</div>
</div>
    </div> 


    
    ";


//end of first card

  } };
     

  


?>
        
        
  
    </div>
    </div>
                


                


   

            
            </div> 
        </body>
        <script src="script.js"></script>
        </html>
       
