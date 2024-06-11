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
    <title>Zeenetworks | Home</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">  
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
    <ul>
        <li class="actives"><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="payment.php"><i class="fa fa-credit-card"></i> Payment</a></li>
        <li><a href="history.php"><i class="fa fa-folder-open"></i> View History</a></li>
        <li><a href="updates.php"><i class="fas fa-newspaper"></i> Updates</a> </li>
        <li><a href="contact.php"><i class="fa fa-phone"></i> Contact Us</a></li>
        <li><a href="about.php"><i class="fa fa-users"></i> About Us</a></li>
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
                <a href="profile.php?<?php  echo 'studentId='.$student_id.'%profile$'?>"> 
                <?php
          $sql = "SELECT * FROM students WHERE student_id = {$_SESSION['student_id']}";
            $query = mysqli_query($conn, $sql);
                 ?>
                 <?php while($row = mysqli_fetch_assoc($query)) { ?>
               <img src="profiles/<?php echo $row['profile_image']; ?>" alt="profile">
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

        <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

                  <!-- Indicators/dots -->
                  <div class="carousel-indicators">
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
                    <button type="button" data-bs-target="#demo" data-bs-slide-to="4"></button>
                  </div>

                  <!-- The slideshow/carousel -->
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <h1>It's time we went Digital</h1>
                      <p class="last text-light">We are here to Digitalize, Connect and Transform your lives. <br> Zeenetworks! The new way of transacting your money</p>
                      <div class="spinner-grow text-danger sm-2"></div>
                      <div class="spinner-grow text-info"></div>
                      <div class="spinner-grow text-warning"></div>
                      
                  
                     <div class="spinner-grow text-muted"></div>
                      <div class="spinner-grow text-primary"></div>
                      <div class="spinner-grow text-success"></div>
                      <div class="spinner-grow text-info"></div>
                      <div class="spinner-grow text-warning"></div>
                      <div class="spinner-grow text-danger"></div>
                      <div class="spinner-grow text-secondary"></div>
                    </div>
                    <div class="carousel-item">
                      <h1>It's time we went Digital</h1>
                      <p class="last text-success ">We are here to Digitalize, Connect and Transform your lives. <br> Zeenetworks! The new way of transacting your money</p>
                    </div>
                    <div class="carousel-item">
                            <h1>It's time we went Digital</h1>
                                <p class="last">We are here to Digitalize, Connect and Transform your lives. <br> Zeenetworks! The new way of transacting your money</p>
                                <div class="spinner-grow text-danger sm-2"></div>
                                <div class="spinner-grow text-info"></div>
                                <div class="spinner-grow text-warning"></div>
                                
                            
                               <div class="spinner-grow text-muted"></div>
                                <div class="spinner-grow text-primary"></div>
                                <div class="spinner-grow text-success"></div>
                                <div class="spinner-grow text-info"></div>
                                <div class="spinner-grow text-warning"></div>
                                <div class="spinner-grow text-danger"></div>
                                <div class="spinner-grow text-secondary"></div>
                    </div>

              <!--image 1  -->
                    <div class="carousel-item">
                      <div class="slide-img">
                         <img src="img/5.jpg" alt="">
                      <p class="text text-light">Avoid long ques in banks. We've come <br>to change the way you move!!</p>
                      </div>
                    </div>
              <!--image 2  -->
                    <div class="carousel-item">
                      <div class="slide-img">
                         <img src="img/c.jpg" alt="">
                      </div>
                     
                      <p class="text text-success ">We are here to connect you to the new <br>way of doing things. Be Digital smart!</p>

                    </div>
                    
                  </div>

                  <!-- Left and right controls/icons -->
                  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon prev"></span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                    <span class="carousel-control-next-icon next"></span>
                  </button>
                  </div>
              
        </div>
        <section class="updates">
        <h2 class="text-dark">Updates</h2>

<!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Updates
</button>

<!-- The Modal -->
<div class="modal fade " id="myModal">
  <div class="modal-dialog modal-fullscreen-sm-down">
    <div class="modal-content bg-primary">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Updates </h4>
        <button type="button" class="btn-close btn-primary" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <?php 
             include "./admin/post.php";
             ?>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
              </section>
              <!-- --------this is for partiners--------------- -->
              <section>
        <div class="partners">
            <h2>Our partners</h2>
            <p>We are currently working with these banks and network Providers.</p>
            <div class="part-container">
            <div class="row">  
            <div class="card">
                <h4>Indo bank</h4>  
                <p>This has helped us grow and supported us to help Our client (Malcolm Moffat college of education)</p>
                <p>Do you want to know <a href="#">More</a></p>
                </div>
                                
            <div class="card">
                <h4>Atlasmara bank</h4>   
                <p>This has helped us grow and supported us to help Our client (Malcolm Moffat college of education)</p> 
                <p>Do you want to know <a href="#">More</a></p>
                </div>

            
            <div class="card">
                <h4>Zanaco bank</h4>  
                <p>This has helped us grow and supported us to help Our client (Malcolm Moffat college of education)</p>
                <p>Do you want to know <a href="#">More</a></p>
                </div>
                                
            <div class="card">
                <h4>Airtel</h4>  
                <p>This has helped us grow and supported us to help Our client (Malcolm Moffat college of education)</p> 
                <p>Do you want to know <a href="#">More</a></p>
                </div>
                        
            <div class="card">
                <h4>Mtn</h4>   
                <p>This has helped us grow and supported us to help Our client (Malcolm Moffat college of education)</p>
                <p>Do you want to know <a href="#">More</a></p>
                </div>
                                
            <div class="card">
                <h4>Zamtel</h4>  
                <p>This has helped us grow and supported us to help Our client (Malcolm Moffat college of education)</p> 
                <p>Do you want to know <a href="#">More</a></p>
                </div>
            </div> 
            </div>
            </div>
    </section>
    <!-- ----------this is for institutiions-------------------- -->
    <section class="institution p-2 bg-light">
        <h2>Our clients</h2>
        <p>Currently we are working with these institutions.</p>
        <div class="client">          
    <div class="card">
       <h4>UNZA</h4> 
         <div class="image">
<img src="img/unza.jpg" title="Profile" alt="profile" width="200px" height="150px">
   </div>
       <p>UNZA is one of the target Client we are loking forward to work with.  <a href="www.Unza.edu.zm">More</a></p> 
       
      </div>
    <div class="card">

       <h4>MAMOCE</h4>
       <div class="image">
<img src="img/mamoce.jpg" title="Profile" alt="profile" width="60px" height="160px">

   </div>
       <p>The Malcolm Moffat College Of Education is one of the clients who are currently working with. <a href="mamoce.edu.zm">More About MAMOCE</a></p> 
       
      </div>
            <div class="card">
       <h4>CBU</h4> 
         <div class="image">
<img src="img/bakgnd.png" title="Profile" alt="profile" width="200px" height="150px">
   </div>
       <p>CBU is one of the target Client we are loking forward to work with.  <a href="#">More</a></p> 
       
      </div>
    <div class="card">

       <h4>SSN</h4>
       <div class="image">
<img src="img/bakgnd.png" title="Profile" alt="profile" width="200px" height="150px">

   </div>
       <p>Serenje School of Nursing is one of the target Client we are loking forward to work with.  <a href="Serenje School of Nursing/facebook.com">More About SSN</a></p> 
       
      </div>
      <div class="card">
       <h4>KNU</h4> 
         <div class="image">
<img src="img/knu.jpg" title="Profile" alt="profile" width="200px" height="150px">
   </div>
       <p>Kwame Nkruma Univesity is one of the target Client we are loking forward to work with.<a href="#">More</a></p> 
       
      </div>
    <div class="card">

       <h4>DAPP</h4>
       <div class="image">
<img src="img/bakgnd.png" title="Profile" alt="profile" width="200px" height="150px">

   </div>
       <p>Desite our client being new to our invesion, We are planning to work with them so as to make their work very simple.<a href="#">More</a></p> 
       
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
              <p>Developed by Silwimba Praise</p>
              </div>
              </div>
              </div>
    </section>
</div>

<script src="js/menu.js"></script>

</body>
</html>