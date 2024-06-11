<!-- <?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['student_id'])) {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}

include "dbh.php";

// Retrieve user information from the database using the stored admin_id in the session
$student_id = $_SESSION['student_id'];

$stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
// $conn->close();

// include "check_login.php";

?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeenetworks | About</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/small.css">
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <script src="js/menu.js"></script>
  <style>
       #interface{
    width: calc(100% - 300px);
    left: 300px;
    position: relative;
}
        .home{
            background-image: url(img/bakgnd.png);
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-blend-mode: multiply;
            background-color: rgba(0, 0, 0, .8);
        }
        .info{
            width: 100%;
            padding: 8px;
           background-image: url(img/bakgnd.png);
           padding-bottom: 2%;
           background-position: center;
           background-size: cover;
           background-repeat: no-repeat;
           position: relative;
           background-blend-mode: multiply;
           /* flex-basis: 100%; */
           width: 100%;
           background-color: rgba(0, 0, 0, 0.7);
        }
        @media(max-width:769px){
  #interface{
    width: calc(100% - 0px);
    left: 0px;
    position: relative;
}}
    </style>
</head>

<body>
   
<div id="menu">
    <div id="close-btn">
        <i class="fa fa-times"></i>
</div>
<div class="profile2">
                 <?php 
                 include "names.php";
                 ?>
            <img src="img/3.jpg" alt="Profile" class="" title="Profile">
        </div>
    <ul>
        <li ><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="payment.php"><i class="fa fa-credit-card"></i> Payment</a></li>
        <li><a href="history.php"><i class="fa fa-folder-open"></i> View History</a></li>
        <li ><a href="updates.php"><i class="fas fa-newspaper"></i> Updates</a> </li>
        <li><a href="contact.php"><i class="fa fa-phone"></i> Contact Us</a></li>
        <li class="actives"><a href="about.php"><i class="fa fa-users"></i> About Us</a></li>
    </ul>
</div>

<div id="interface" class=" sm-6">
    
    <div class="header">
     
        <nav class="navbar">
            
            <a href="#"><i class="fa fa-network-wired"></i></a>
            <div class="logo">
                <h1>Zeenetworks</h1>
            </div>      
        </nav>

    </div>
     <div id="menu-btn">
                <i class="fa fa-bars"></i>
    </div>
    <div id="navigation">
        
             <div class="profile">
                  <h4><a class="text-dark" style="text-decoration: none;" href="profile.php?<?php  echo 'studentId='.$student_id.'%profile$'?>"><?php echo $user['student_fname'] . ' ' . $user['student_lname']; ?></a> </h4>
                  <?php
          $sql = "SELECT * FROM students WHERE student_id = {$_SESSION['student_id']}";
            $query = mysqli_query($conn, $sql);
                 ?>
                 <?php while($row = mysqli_fetch_assoc($query)) { ?>
                    <a class="text-dark" style="text-decoration: none;" href="profile.php?<?php  echo 'studentId='.$student_id.'%profile$'?>">  <img src="profiles/<?php echo $row['profile_image']; ?>" alt="">
                  <?php } ?>
                </a>  
            </div>
        <div class="icons">
            <a href=""><i class="fab fa-facebook"></i></a>
            <a href=""><i class="fab fa-instagram"></i></a>
            <a href=""><i class="fab fa-x"></i></a>
            <a href="logout.php"><i class="fa fa-power-off"></i></a>
        </div>
    </div>
        <div class="home mt-5 p-5">
            <h1>We Are The Zeenetwork</h1>
            <p class="first">Pay for your school, College & University fees on your phone or laptop. Avoid long ques in the banks and save time. </p>
            <p class="last">We are here to Digitalize, Connect and Transform your lives. Zeenetworks! The new way of transacting your money</p>


        </div>
        <!-- -----------this is for about page--------------- -->
        <section>
            <div class="info">
                <h2>About Us</h2>
               <div class="info-container">
                   
                <div class="card one">
                   <h4>We are Zeenetworks</h4>  
                    <p>We belive in Connecting lives to the Digital world</p>
                   <p>Do you want to know <a href="#">More</a></p>
                  </div>
                                  
                <div class="card">
                   <h4>Our Mission</h4>  
                    <p>Digitalizing, Connecting and Transforming your lives. Zeenetworks! The new way of transacting your money and To deliver our services to the costomer's satisfication Consequuntur aspernatur recusandae ratione cumque placeat iste atque nam, expedita doloribus. Sequi nesciunt dolores facilis rem asperiores, nemo sunt quasi molestias unde.</p>
                </p> 
                   
                  </div>
                 
                    <div class="card">
                        <h4>Who are we?</h4>
                           <p>We are the Rinproud LLC company, Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur aspernatur recusandae ratione cumque placeat iste atque nam, expedita doloribus. Sequi nesciunt dolores facilis rem asperiores, nemo sunt quasi molestias unde.</p>
                        </div>

                    <div class="card">
                        
                    <h4>Why Choosing Us?<h4>                        
                     <p>We aim at atteding to our costomer's needs without fail, and without wasting our customer's time nor leaving them in regrets. Wouldn't want to say we are much better than others, but we give our clients time to appreciate our excellence. Consequuntur aspernatur recusandae ratione cumque placeat iste atque nam, expedita doloribus. Sequi nesciunt dolores facilis rem asperiores, nemo sunt quasi molestias unde.</p>
                          
                        </div>
                   
                 
               </div>
               
                </section>   
                <section>
                    <div class="CEO">
                        <h2>Our Pillars</h2>
                        <div class="wrapper">
                    <div class="CEO-img">
                    <img src="img/4.jpg" alt="CEO img">
                </div>
                <div class="CEO-name">
                    <h4>Silwimba Praise</h4>
                    <div class="title">
                        <h5>CEO of Zeenetworks</h5>
                    </div>
                    <div class="icons" id="icons">
                   <a href=""><i class="fab fa-facebook"></i></a> 
                   <a href=""><i class="fab fa-instagram"></i></a> 
                   <a href=""><i class="fab X">X</i></a> 
                   <a href=""><i class="fa">z</i></a> 
                   <a href=""><i class="fa fa-envelope"></i></a> 
                    
                    </div>
                    
                </div>
                        </div>
                <div class="wrapper">
                <div class="CEO-img">
                    <img src="img/b.jpg" alt="CEO img">
                </div>
                <div class="CEO-name">
                    <h4>Malumbo Psalms</h4>
                    <div class="title">
                        <h5>CTO of Zeenetworks</h5>
                    </div>
                    <div class="icons" id="icons">
                   <a href=""><i class="fab fa-facebook"></i></a> 
                   <a href=""><i class="fab fa-instagram"></i></a> 
                   <a href=""><i class="fab X">X</i></a> 
                   <a href=""><i class="fa">z</i></a> 
                   <a href=""><i class="fa fa-envelope"></i></a> 
                    
                    </div>
                    
                </div>
            </div>
               </div>
                </section>
<!-- -----------this section is for footer--------------- -->
    <section>
        <div class="footer text-center bg-dark">
            <h4>Useful Links</h4>
           <div class="footer-items">
                <ol>
        <li><a href="#">Mamoce Portal</a></li>
        <li><a href="#">Mamoce media</a></li>
        <li><a href="#">Latest News</a></li>
        <li><a href="#">Unza media</a></li>
        <li><a href="#">Reach us</a></li>
        <li><a href="about.php">About us</a></li>
                    
                </ol>
              </div>
              <i class="fa far-phone"></i>
              <div class="copyright">

         <p>Zeenetworks <span>&COPY;</span> 2024</p>

              </div>
              <div class="developer" >
              <p>Developed by Rinproud</p>
              </div>
              </div>
              </div>
    </section>
</div>
<script src="js/menu.js"></script>

</body>
</html>