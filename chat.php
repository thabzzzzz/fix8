<?php
        //include auth_session.php file on all user panel pages
        include("auth_session.php");
        require('db.php');
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <title>Chat</title>
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


            </div>
                <h3>Your chats</h3>
            <br/>


            <div class="row col col-lg-9 col-xl-7" style="margin: auto;">

            






<div class="card">
<div class="time"><img src="profilePics/u1.jpg" alt="Profile image " width="150px"  height="150px" class="rounded-circle"><p>Jason</p></div>
    
    <div class="message sol">
      <div class="resim" style="background-image: url('https://fbcdn-sphotos-a-a.akamaihd.net/hphotos-ak-prn2/t1/1461137_576157439120105_582502926_n.jpg');"></div><div class="messageText" data-time="10:42">
        going to event, coming?
      </div>
    </div>
    <div class="message sag mtLine">
      <div class="messageText" data-time="10:43">
        yea ok
      </div><div class="resim" style="background-image: url('https://fbcdn-sphotos-c-a.akamaihd.net/hphotos-ak-prn2/t1/1393075_669686723071617_1541630705_n.jpg');"></div>
    </div>
    <div class="message sol mtLine">
      <div class="resim" style="background-image: url('https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-frc3/t1/q71/1422532_452755621503523_1504727417_n.jpg');"></div><div class="messageText" data-time="10:45">
        ill bring snacks
      </div>
    </div>
    <div class="message sol">
      <div class="resim" style="background-image: url('https://fbcdn-sphotos-g-a.akamaihd.net/hphotos-ak-prn2/1395115_368377233300847_323365594_n.jpg');"></div><div class="messageText" data-time="10:45">
        10 March
      </div>
    </div>
   
    <div class="message sol">
      <div class="resim" style="background-image: url('https://fbcdn-sphotos-d-a.akamaihd.net/hphotos-ak-frc1/1601244_265297516958879_798390578_n.png');"></div><div class="messageText" data-time="11:01">
        see you then
      </div>
      <form action="#" class="bg-light">
        <div class="input-group">
          <input type="text" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
          <div class="input-group-append">
            <button id="button-addon2" type="submit" class="btn btn-link"> <i class="fa fa-paper-plane"></i></button>
          </div>
        </div>
      </form>
    </div>

</div>

</div>
   

            
        </body>
        </html>