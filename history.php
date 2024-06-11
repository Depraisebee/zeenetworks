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
    <title>Zeenetworks | History</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/history.css">
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
        <li ><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="payment.php"><i class="fa fa-credit-card"></i> Payment</a></li>
        <li class="actives"><a href="history.php"><i class="fa fa-folder-open"></i> View History</a></li>
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
            <h1>Check your your Transaction history</h1>
               <p class="last">We have all your Transaction kept safe for future reference!</p>

        </div>
       <!-- the history codes goes here -->
       <section class="history">
        <h2>History</h2>
         <div class="card">
            <h4>Your TXN History</h4>   
            <table border="1"cell
             padding= "2" cellspacing="2">
             <th>Transaction Id</th>
             <th>Transaction date</th>
            <th>Network Service</th>
             <th>Bank</th>
              <th>Account Number</th>
              <th>Amount</th>
              <th>Student NRC/ Id</th>   
               <th>Student Name</th>
               <th>Year</th>
              <th>Generate receipt</th>    
              <tr>

                <?php  
                include "show_history.php";
                ?>
              </tr>


             </table>

           <?php 
           include "updated_dated.php";
           
           ?>
       
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