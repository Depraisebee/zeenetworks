<!-- <?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}

include "dbh.php";

// Retrieve user information from the database using the stored user_id in the session
$student_id = $_SESSION['admin_id'];

$stmt = $conn->prepare("SELECT * FROM admins WHERE admin_id = ?");
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// $stmt->close();
// $conn->close();
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="..//css/profile.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">  
    <style>
h3 .text-center {
    position: absolute;
    right: 30px;
    text-decoration: none;
}
body{
    background: #ccc;

    /* background: linear-gradient(to bottom, #e2ffe9, #00be39); */
}
h3 .text-center {
    position: absolute;
    right: 30px;
    text-decoration: none;
}
.icon{
            position: relative;
        }
        .fa-camera{
            position: absolute;
            text-align: center;
            right: 21.4em;
            font-size: 35px;
            background: #ffee;
            padding: 5px;
            /* width: 20px; */
            border-radius: 50%;
        }
        .btn-save{
            position: absolute;
            text-align: center;
            right: 25em;
            bottom: 1.4em;
            font-size: 20px;
        }
        nav{
            background: fixed;
            height: 80px;
            width: 100%;
        }
        .wrapper {
            text-align: left;
            background: #084400;
            font-family: Arial, Helvetica, sans-serif;
            border-radius: 10px;
            padding: 8px;
            display: flex;
            width: fit-content;
            margin: auto;
        }

        .wrapper h4 {
            padding: 8px;
            background: #444;
            border-radius: 10px;
            width: 100%;
        }

        .wrapper h5 {
            padding: 8px;
            background: #444;
            border-radius: 10px;
            width: 100%;

        }

        .div {
            margin: 8px;
        }

        .slide-img img {
            width: 400px;
            height: auto;
            border-radius: 15px;
        }
    </style>
</head>

<body class="bg-dark">
<nav class="navbar ">
        <div class="logo">
        <!-- <a href="#"><i class="fa fa-network-wired text-warning p-1 mt-3"></i></a> -->
            <div class="logos">
                <h1 class="text-success mb-5">Zeenetworks</h1>
               <h5 class="text-home"><a href="home.php" class="text-center text-success">Home</a></h5>
            </div> 
            <div class="logout">
               <h3 class="text-center"><a href="logout.php" class="text-center">Logout</a></h3>
            </div>
        </div>
    </nav>
    <section>
        
        <div class="profile">
        <form action="edit_profile_processing.php" method="post" enctype="multipart/form-data">
            <div class="cover">
            <?php
           $sql = "SELECT * FROM admins WHERE admin_id = {$_SESSION['admin_id']}";
            $query = mysqli_query($conn, $sql);
            
                 ?>
                 <?php while($row = mysqli_fetch_assoc($query)) { ?>
               <img src="profiles/<?php echo $row['profile_image']; ?>" alt="profile">
                  <?php } ?>
            </div>
                <?php
                $sql = "SELECT * FROM admins WHERE admin_id = {$_SESSION['admin_id']}";
                $query = mysqli_query($conn, $sql);
                ?>
                <div class="prof">
                    <?php while($row = mysqli_fetch_assoc($query)) { ?>
                        <img src="profiles/<?php echo $row['profile_image']; ?>"class="mb-4">
                    <?php } ?>
                </div>
                <div class="icon">
                <label for="image"><i class="fa fa-camera text-success"></i></label>
                <input type="file" class="d-none" name="image" id="image">     
                <button type="submit" name="save" class="btn btn-success text-light btn-save">Update Image</button>
                </div>
            </form>
            <div class="user-info container bg-dark p-2">
                <h3 class="text-left text-light">Amin  Details</h3>
                <div class="wrapper">
                    <div class="div">
                <h4 class="text-warning text-left">Full name: <?php echo $user['fname'] . ' ' . $user['lname']; ?></h4>
                <h5 class="text-light text-left"><?php echo $user['email']; ?></h5>
                <h5 class="text-light text-left">Phone number: <?php echo $user['phone']; ?></h5>
                    </div>
                    
                    <!-- Carousel -->
                    <div id="demo" class="carousel slide" data-bs-ride="carousel">

                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>

                        </div>

                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <h1 class="text-warning"><?php echo $user['fname'] . ' ' . $user['lname']; ?> you are an 'Admin'.</h1>
                                <p class="last text-light">Hi <?php echo $user['fname']; ?>, You are the admin this is your Phone number <?php echo $user['phone']; ?> <br> and your email is  <?php echo $user['email']; ?></p>
                                <div class="spinner-grow text-danger sm-2"></div>
                                <div class="spinner-grow text-primary"></div>
                                <div class="spinner-grow text-success"></div>
                                <div class="spinner-grow text-warning"></div>
                                <div class="spinner-grow text-danger"></div>
                                <div class="spinner-grow text-secondary"></div>
                            </div>
                            <div class="carousel-item">
                                <h1 class="text-warning">You are the admin, Please remeber your Role!!</h1>
                                <p class="last text-light">You are the Admin please remember your role.</p>
                            </div>

                            <!--image 1  -->
                            <div class="carousel-item">
                                <div class="slide-img">
                                    <?php
                                    $sql = "SELECT * FROM admins WHERE admin_id = {$_SESSION['admin_id']}";
                                    $query = mysqli_query($conn, $sql);
                                    ?>
                                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <img src="profiles/<?php echo $row['profile_image']; ?>" class="mb-4">
                                    <?php } ?>
                                    <p class="text text-light">You are the Admin please remember your role</p>
                                </div>
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
                <div class="actions">
                    <p class="text-warning">Edit Profile Information</p>
                 <?php  echo ' <a href="edit_profile.php?updateid='.$student_id.'" class="text-light">
                        <button class="btn btn-primary">Edit</button>
                    </a>'?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

