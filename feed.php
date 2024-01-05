<?php
        //include auth_session.php file on all user panel pages
        include("auth_session.php");
        require('db.php');
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Rate Event</title>
            <link rel="stylesheet" href="style.css" />
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                
                
                <h3>The latest events posted</h3>
                
                </div>
                <br/>
            <br/>



         <div class="center feeddiv">

            <?php
       $user=$_SESSION["username"];


       $sql = " SELECT * FROM tbevents WHERE assocUsers IS NOT NULL ORDER BY date DESC  ";
       $result = $con->query($sql);

       if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error === 'already_rated') {
            echo "<div class='error-message'>You have already rated this event.</div>";
        } elseif ($error === 'invalid_request') {
            echo "<div class='error-message'>Invalid request. Please try again.</div>";
        }
    }

      
    ?>

   
       
      
       
       
       <div class="row">
    <?php





$sql = "SELECT * FROM tbevents WHERE assocUsers IS NOT NULL ORDER BY date DESC";
$result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Fetch average rating for each event
            $event_id = $row['event_id'];
            $avg_query = "SELECT AVG(rating) AS average_rating FROM event_ratings WHERE event_id = '$event_id'";
            $avg_result = mysqli_query($con, $avg_query);
            $avg_row = mysqli_fetch_assoc($avg_result);
            $average_rating = $avg_row['average_rating'];
            $toast_id = 'toast_' . $row['event_id'];

            echo "
                <div class='col-md-4'>
                    <div class='card' style='width: 20rem; overflow: hidden;'>
                        <a href='rateEvent.php'><img src='eventGallery/" . $row['eventImage'] . "' class='card-img-top d-block mx-auto' style='width: 20rem; height:190px alt='...'></a>
                        <div class='card-body'>
                            <h5 class='card-title byUser'>" . $row['eventname'] . "</h5>
                            <br>
                            <p class='card-subtitle mb-2 text-muted'>" . $row['date'] . " at: <b>" . $row['location'] . "</b></p>
                            <p class='card-text'>" . $row['description'] . "</p>
                            <p class='card-text byUser'> By: " . $row['assocUsers'] . "</p>
                            <p>Average Rating: " . number_format($average_rating, 1) . "</p>
                            <br/>
                            <footer class='blockquote-footer'><cite title='Source Title'>Tags: " . $row['hashtags'] . " </cite></footer>
                            
                            <!-- Rating form -->
                            <form action='process_rating.php' method='POST' class='row align-items-center'>
                            <input type='hidden' name='event_id' value='" . $row['event_id'] . "'>
                            <div class='col-auto'>
                              
                            </div>
                           
                            <div class='col-auto'>
                                <select name='rating' id='rating' class='form-select'>
                                    <option value='1'>1 Star</option>
                                    <option value='2'>2 Stars</option>
                                    <option value='3'>3 Stars</option>
                                    
                                </select>
                            </div>
                            <div class='col-auto'>
                                <button type='submit' class='btn btn-primary' style='background-color: black!important; border-color: #afe828!important;'>Rate event</button>
                            </div>
                        </form>
                        <div id='$toast_id' class='toast' role='alert' aria-live='assertive' aria-atomic='true'>
                                <div class='toast-header'>
                                    <strong class='me-auto'>Bootstrap</strong>
                                    <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                                </div>
                                <div class='toast-body'>
                                    Hello, world! This is a toast message.
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            ";
        }
    }
    
    
    ?>
</div>
         </div>
            </div>
            </div>

            <?php
            include('footer.php');
            ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        </body>
        </html>