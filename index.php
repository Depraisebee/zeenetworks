<?php 
include "dbh.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zeenetworks | Landing Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <style>
   
#interface{
    width: calc(100% - 300px);
    left: 300px;
    position: relative;
}
    .home {
        background-image: url(img/bakgnd.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-blend-mode: multiply;
        background-color: rgba(0, 0, 0, .8);
    }
    .container {
        background-image: url(img/bakgnd.png);
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-blend-mode: multiply;
        background-color: rgba(0, 0, 0, .8);
        padding: 5px;
        border-radius: 5px;
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
            <li><a href="login.php"><i class="fa fa-home"></i> Login</a></li>
            <li><a href="register.php"><i class="fa fa-credit-card"></i> Register</a></li>

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

            <div class="icons">
                <a href=""><i class="fab fa-facebook"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
                <a href=""><i class="fab fa-x"></i></a>
                <a href="register.php"><i class="fa fa-lock"></i></a>
            </div>
        </div>
        <div class="home mt-5 p-5">
            <h1>It's time we went Digital</h1>
             <p>Diposit money on your finger tips no need of visting Banks now. Be Digital smart!!</p>


        </div>
     <!-- this code is for the index page -->
     <section>
        <div class="container">
           <div class="content">
             <div class="col">
         <div class="card">  
         <h2>New to Zeenetworks</h2>      
       <p>Get started with just one click</p>
               <div class="link">
                <a href="register.php">Get Started</a>
           </div>
         </div>
        </div>
            <div class="col">
         <div class="card">  
         <h2>Am not New to Zeenetworks</h2>      
       <p>Log in to your account to make Payments</p>
               <div class="link">
                <a href="login.php">Log me in</a>
           </div>
         </div>
        </div>
             <div class="col">
            <div class="card">
           <h2>New to Online Payments Systemes</h2>
                <p>Get to know</p>
                <div class="link">
                    <a href="https://www.google.com/what_are_Online_Payment_Systems?">Learn More</a>
                </div>
               </div>
              </div>
              <div class="col">
          <div class="card">

        <h2>New to Zeenetworks</h2>   
            <p>Get started with Online Payment</p>
            <div class="link">
                <a href="register.php">Get Started</a>
            </div>
               </div>
              </div>
           </div>
         </div>
                     <section>

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

                    </ol>
                </div>
                <i class="fa far-phone"></i>
                <div class="copyright">

                    <p>Zeenetworks <span>&COPY;</span> 2024</p>

                </div>
                <div class="developer">
                    <p>Developed by Silwimba Praise</p>
                </div>
            </div>
    </div>
    </section>
    </div>
    <script src="js/menu.js"></script>
</body>

</html>