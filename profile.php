<?php
        //include auth_session.php file on all user panel pages
        include("auth_session.php");
        require('db.php');
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Profile</title>
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
                <a class="nav-link " href="dashboard.php" style="font-size: 30px">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="feed.php" style="font-size: 30px">Feed</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="addEvent.php" style="font-size: 30px">Add event</a>
                </li>
            
                <li class="nav-item">
                <a class="nav-link active" href="profile.php" tabindex="-1"  style="font-size: 30px">Profile: <?php echo $_SESSION['username']; ?></a>
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
                
                
                <h3>Your profile page</h3>
                
                </div>
                <br/>
            <br/>
                
                


                
    <div class="row ">
    <section class="h-100 gradient-custom-2">
  <div class="container ">
    <div class="row d-flex justify-content-center align-items-center ">
      <div class="col ">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <?php
              $user=$_SESSION["username"];


              $sql = " SELECT * FROM users WHERE username='$user' ";
              $result = $con->query($sql);
              $row = mysqli_fetch_array($result);

              echo
             " <img src='profilePics/".$row['profilePic']."'
                alt='Generic placeholder image' class='img-fluid img-thumbnail mt-4 mb-2'
                style='width: 150px;  height: 150px; bottom: -40px; position:relative ; z-index: 1'>"

              
                
                ?>
              
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h3><?php echo $row['fullName'] ?></h3>
              <p style="color: white; font-size:20px;"><?php echo $row['location'] ?> </p>
            </div>
          </div>
          <div class="p-4 text-black" style="background-color: #f8f9fa;">
            <div class="d-flex justify-content-end text-center py-1">
             
              <div>
                <p style="color:#000" >
            <?php
            $user=$_SESSION["username"];
            
            $sql = "SELECT * from tbevents where assocUsers='$user'  ";

            if ($result = mysqli_query($con, $sql)) {
            
                // Return the number of rows in result set
                $rowcount = mysqli_num_rows( $result );
                
                // Display result
                printf( $rowcount);
             }
    
    
   

            ?>
            </p>
                <p class="small text-muted mb-0">Total events</p>
              </div>
            </div>
          </div>
          <div class="card-body p-4 text-black">
            <div class="mb-5">
              <p class="lead fw-normal mb-1">About me</p>
              <div class="p-4" style="background-color: #f8f9fa;">
                <p ><?php echo $row['description'] ?> </p>
                <p>Birthday: <?php echo $row['dateOfBirth'] ?> </p>
                <p>Contact me: <?php echo $row['contact'] ?></p>
               
              </div>
            </div>
          
       

            <div class="d-flex justify-content-between align-items-center mb-4">
              <p class="lead fw-normal mb-0">Recent events</p>
              
            </div>

            <div>
            <?php
    


$sql = " SELECT * FROM tbevents WHERE assocUsers='$user' ORDER BY date DESC ";
$result = $con->query($sql);


?>



<div class='row g-2'>
<?php

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
    echo "
    
    <div class='col-md-4'>
    <div class='card' style='width: 20rem; overflow: hidden;'>
<img src='eventGallery/".$row['eventImage']."' class='card-img-top d-block mx-auto' style='width: 20rem; height:190px '>
<div class='card-body'>
    <h5 class='card-title'>". $row['eventname']."</h5>
        <p class='card-subtitle mb-2 text-muted'>". $row['date']." at: <b>". $row['location']."</b></p>
    <p class='card-text'>". $row['description']."</p>
    <br/>
    <footer class='blockquote-footer'><cite title='Source Title'>Tags: cosplay, comics, crowds</cite></footer>
</div>
</div>
    </div> 
   
 


    
    ";


//end of first card

  } };
     

  //updating event info

  echo
  "
 
  ";
?>

</div>
            
            <br/>
            <a href="editProfile.php" class="btn btn-primary" style="background-color: #afe828!important; border-color: #afe828!important;">Edit profile</a>
          </div>


          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
        
 
  
    </div>
    <br/>
    <br/>
    <br/>





    </div>
                


                


   

            
            </div>




        </body>
        
        </html>
       
