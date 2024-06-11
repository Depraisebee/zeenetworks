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
    <title>Zeenetworks | Payments</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/payment.css">
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
        .container{
            position: relative;
           /* top: 60px; */
            background-image: url(img/bakgnd.png);
            /* padding-bottom: 1%; */
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            position: relative;
            background-blend-mode: multiply;
            flex-basis: 100%;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            height: 36em;
            display: flex;
            justify-content: center;
            border-radius: 5px;
        }
        .form{
    /* position: relative; */
    border: 1px solid #00b0e0;
    width: 500px;
    padding: 10px;
    /* flex-basis: 100%; */
    /* left: 70px; */
    margin: 10px 0;
    top: -10px;
    border-radius: 10px;
    padding-bottom: 3%;
    height: 500px;
    box-shadow: 8px 4px 7px 4px rgba(204, 0, 223, 0.1);
  }
                @media(max-width:769px){
        #interface{
            width: calc(100% - 0px);
            left: 0px;
            position: relative;
        }
        .form{
        /* position: relative; */
        border: 1px solid #00b0e0;
        width: 340px;
        padding: 10px;
        /* flex-basis: 100%; */
        /* left: 70px; */
        top: -10px;
        margin: 40 auto;
        border-radius: 10px;
        padding-bottom: 3%;
        height: 500px;
        box-shadow: 8px 4px 7px 4px rgba(204, 0, 223, 0.1);
      }
        }

    </style>
</head>

<body>
   
<div id="menu">
    <div id="close-btn">
        <i class="fa fa-times"></i>
</div>
    <ul>
        <li ><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="actives"><a href="payment.php"><i class="fa fa-credit-card"></i> Payment</a></li>
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
            <?php
          $sql = "SELECT * FROM students WHERE student_id = {$_SESSION['student_id']}";
            $query = mysqli_query($conn, $sql);
                 ?>
             <a href="profile.php?<?php  echo 'studentId='.$student_id.'%profile$'?>"> <?php while($row = mysqli_fetch_assoc($query)) { ?>
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
            <h1>You have done well to choose us</h1>
               <p class="last">Avoid long ques in banks. We've come to change the way you move!!</p>

        </div>
       <!-- -----payment form goes here----------------------- -->
       <div class="container">
        <div class="content">
                <div class="form">
                     <form action="process_payment.php" method="POST">

                            <div class="make">
                                <h4><main>Make Payment here</main></h4>
                            </div>
                            <div class="error-text">
                       <p>The field cannot be empty!!</p>
                            </div>
                		<!-- <div class="fields" id="choice">
						<label for="">First year or Already enrolled</label>
						<select name="choice" id="chc" required>
							<option value="">Select</option>
							<option value="First year">First year</option>
                            <option value="Second Year">Second Year</option>
                            <option value="Third Year">Third Year</option>
                         </select>
					</div>
                            <div class="fields" id="std-id">
                        <label for="">Enter Student ID</label>
                        <input type="text" name="student_id" placeholder="Enter Student Id" required>
                            </div>
                                <div class="fields" id="std-nrc" style="display: block;">

                        <label for="">Enter Student NRC</label>
                            <input type="text" name="student_nrc" placeholder="Enter Student NRC">
                        </div> -->
                                <div class="fields" id="net-id">
                            <label for="">Select Network</label>                           
                            <select name="network" id="network" required>                 
                                <option value="">Select</option>
                                    <option value="Airtel">Airtel</option>
                                  <option value="Zamtel">Zamtel</option>
                                    <option value="MTN">MTN</option>
                               </select>
                            </div>
                            <div class="fields" id="bank-id">
                                <label for="">Select Bank</label>
                                <select name="bank" id="bank" required>
                                    <option value="">Select</option>
                                    <option value="Indo">Indo</option>
                                    <option value="Zanaco">Zanaco</option>
                                    <option value="Atlasmara">Atlasmara</option>
                                </select>
                            </div>   
                             <div class="fields" id="account-id">
                                <label for="">Enter Account Number</label>
                                <input type="number" maxlength="15" name="account_number" placeholder="Enter Account Number" required>
                            </div>
                            <div class="fields" id="amount-id">
                                <label for="">Enter amount</label>
                                <input type="number" name="amount" placeholder="Enter amount" required>
                       </div>
                            <div class="fields" id="btn-id">
                            <button type="submit" name="pay">Continue to pay</button>
                                </div>

                        </form>
                      
                      
                </div>
                        <div class="text-center text-primary text">
                            <h5>Don't worry none of your information is shared with us!</h5>
                           </div>
                       </div>
                      
                    </div>
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