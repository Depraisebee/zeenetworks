<!-- <?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}

include "dbh.php";

// Retrieve user information from the database using the stored admin_id in the session
$admin_id = $_SESSION['admin_id'];

$stmt = $conn->prepare("SELECT * FROM admins WHERE admin_id = ?");
$stmt->bind_param("i", $admin_id);
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
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zeenetworks | Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">

    <style>
        #interface {
            width: calc(100% - 400px);
            position: relative;
            margin-left: 400px;


        }

        #interface .navigation {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            padding: 15px 20px;
            border-bottom: 3px solid #594ef7;
            position: fixed;
            width: calc(100% - 400px);
            margin-left: 0px;
            background: rgb(255, 255, 255);

        }

        @media(max-width:769px) {
            #interface {
                width: calc(100% - 0px);
                position: relative;
                margin-left: 0px;


            }

            #interface .navigation {
                display: flex;
                align-items: center;
                justify-content: space-between;
                background: #fff;
                padding: 15px 20px;
                border-bottom: 3px solid #594ef7;
                position: fixed;
                width: calc(100% - 0px);
                margin-left: 0px;
                background: rgb(255, 255, 255);

            }
        }

        .register-student {
            background-color: #010101;
            overflow-x: scroll;
            border-radius: 5px;
        }

        .register-student h4 {
            color: #fff;
            padding: 8px;
            font-size: 25px;
        }


        .updated .cards {
            box-shadow: -3px 1px 1px 2px rgb(0, 0, 9, 0.1);
            width: 80%;
            border-radius: 8px;
            padding: 20px;
            background: #cfd2d3;
            margin: 8px;
        }

        .updated {
            padding: 5px;
            justify-content: flex-start;
            display: grid;
        }

        .updates {
            padding: 8px;
            top: 120px;

        }

        .updates h2 {
            color: #01b0e0;
            font-size: 29px;
            padding: 8px;
            /* flex-basis: 100%; */
            margin: 0 4px;
        }

        .updates .cards p {
            color: #1d2735; 
            font-size: 25px;
            font-weight: 500;
            text-align: left;
            font-family: Monospace;
        }

        .updates .cards h4 {
            color: #e000e0;
            font-size: 25px;
        }

        .updates .card p a {
            text-decoration: none;

            color: #1d2735;
            font-size: 22px;
            font-weight: 600;
        }

        .time {
            margin: 10px;
            color: #333;
            display: flex;
            font-size: 16px;
        }

        .time h6 {
            margin: 7px;
            bottom: 7.7px;
            font-size: 14px;

        }

        .profile h4 {
            color: #333;
            font-size: 20px;
        }

        .active {
            border-left: 4px solid #fff;
            /* background: #fff; */
            border-radius: 0 10px 0 10px;
            color: #0051f3;
        }
    </style>
</head>
 
<body id="body" class="">

    <section id="menu">
        <div class="closebtn" class="icons">
            <i class="fas fa-times" id="closebtn"></i>
        </div>
        <div class="logo">
            <img src="img/2.jpg">
            <h2>Zeenetworks</h2>
        </div>
        <div class="items ">
            <li class="actives"><i class=""></i><a href="home.php">Dashboard</a></li>
            <li><i></i><a href="View_registered_student.php">View Registered Students</a></li>
            <li><i></i><a href="post_update.php">Post Update</a></li>
            <li><i></i><a href="view_paid_student.php">View Paid Students</a></li>
            <li><i></i><a href="view_admins.php">View Admins</a></li>
            <li><i></i><a href="logout.php">Logout</a></li>
        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <div id="menubtn">
                        <i class="fa fa-bars"></i>
                    </div>
                </div>
                <div class="search">
                    <i class="fa fa-search" class="icons"></i>
                    <input type="text" placeholder="Search">
                </div>
            </div>
            <div class="profile">
            <i class="far fa-bell" class="icons"></i>
            <h4><a class="text-dark" style="text-decoration: none;" href="profile.php?<?php  echo 'studentId='.$admin_id.'%profile$'?>"><?php echo $user['fname'] . ' ' . $user['lname']; ?></a> </h4>
                <a href="profile.php?<?php  echo 'AdmintId='.$admin_id.'%profile$'?>"> 
                <?php
          $sql = "SELECT * FROM admins WHERE admin_id = {$_SESSION['admin_id']}";
            $query = mysqli_query($conn, $sql);
                 ?>
                 <?php while($row = mysqli_fetch_assoc($query)) { ?>
               <img src="profiles/<?php echo $row['profile_image']; ?>">
                  <?php } ?>
                </a>  
            </div>

        </div>
        <h3 class="i-name ">Dashboard</h3>
        <div class="theme">
            <button id="btn">Change Theme</button>
        </div>
        <div class="values">
          

                <?php include "show-registered-student.php"; ?>
                    <!-- <span>Registered Students</span> -->
           
           

                <?php include "show-paid-students.php"; ?>

                    <!-- <span>Paid Students</span> -->
           
            

                <?php  include "show-transactions.php"; ?>

                    <!-- <span>Total transaction</span> -->
                
          
        
                <?php include "show-registered-admins.php"; ?>

                    <!-- <span>Admins</span> -->
                </div>
         
     
    <script src="js/theme.js"></script>
    <script>
        var showBtn = document.getElementById('menubtn');
        var showmenu = document.getElementById('menu');
        var closeBtn = document.getElementById('closebtn');

        showBtn.addEventListener('click', showMenu);
        function showMenu() {
            showmenu.style.display = "block";
            showBtn.style.display = "none";
        };
        closeBtn.addEventListener('click', closeMenu);
        function closeMenu() {
            showmenu.style.display = "none";
            showBtn.style.display = "block";
        };
    </script>
</body>

</html>