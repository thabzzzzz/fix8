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
                
                
                <h3>User profile</h3>
                
                </div>
                <br/>
            <br/>
                
                


                
    <div class="row">
    <section class="h-100 gradient-custom-2">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-lg-9 col-xl-7">
        <div class="card">
          <div class="rounded-top text-white d-flex flex-row" style="background-color: #000; height:200px;">
            <div class="ms-4 mt-5 d-flex flex-column" style="width: 150px;">
              <?php
              $user=$_SESSION["username"];



             ?>
             <img src='profilePics/u2.jpg'
                alt='Generic placeholder image' class='img-fluid img-thumbnail mt-4 mb-2'
                style='width: 150px;  height: 150px; position:relative ; z-index: 1;'>

              
                
                
              
            </div>
            <div class="ms-3" style="margin-top: 130px;">
              <h3>Thabo</h3>
              <p style="color: white; font-size:20px;">Pretoria </p>
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
                printf( 2);
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
                <p >I like music fests and gatherings</p>
                <p>Birthday: 02/04/1999 </p>
                <p>Contact me: thabo@gmail.com</p>
               
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

    
    <div class='col-4'>
    <div style='width:100px; height:100px;'>
      <img src='eventGallery/concert.jpg'
        alt='image 1' class='w-100 rounded-3'>
        </div>

    <p>Concert</p>
    </div>

    <div class='col-4'>
    <div style='width:100px; height:100px;'>
      <img src='eventGallery/musicFest.jpg'
        alt='image 1' class='w-100 rounded-3'>
        </div>

    <p>WWE match</p>
    </div>
   
 


    

     

 



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
    <h3> Social</h3>
<div class="row col col-lg-9 col-xl-7" style="margin: auto;">
<div class="card">
  <p style="color:black !important; font-size:20px;">All users</p>
 
<div class="row friendsBox">
    <div class="col-sm-3">
    <img src="profilePics/d292e7b5b9eeb2e97add052399a308d7.jpg" alt="Profile image " width="150px"  height="150px" class="rounded-circle">
    </div>
    <div class="col-sm-4">
      <p class="lead fw-normal mb-1">jacky</p>
      <a class="lead fw-normal mb-1" href="profile.php">View profile</a>
    </div>
    <div class="col-sm-4" style="margin-top: 30px;">
    <br/>
    <p class="lead fw-normal mb-1"> Send request<img src="DLs/icons/send.png" width="20px" height="20px"/></p>
    </div>
  </div>
  <div class="row friendsBox">
    <div class="col-sm-3">
    <img src="profilePics/u1.jpg" alt="Profile image " width="150px"  height="150px" class="rounded-circle">
    </div>
    <div class="col-sm-4">
      <p class="lead fw-normal mb-1">Jason</p>
      <a class="lead fw-normal mb-1" >View profile</a>
    </div>
    <div class="col-sm-4" style="margin-top: 30px;">
    
    <a class="lead fw-normal mb-1" href="chat.php"> Chat<img src="DLs/icons/chat.png" width="20px" height="20px"/></a>
    <br/>
    <br/>
    <p class="lead fw-normal mb-1"> Unfriend<img src="DLs/icons/cross.png" width="20px" height="20px"/></p>
      
      
    </div>
  </div>

</div>

</div>




    </div>
                


                


   

            
            </div> 
        </body>
        </html>
       
