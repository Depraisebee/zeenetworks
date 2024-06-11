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
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
$conn->close();
?> -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">  
    <style>
h3 .text-center {
    position: absolute;
    right: 30px;
    text-decoration: none;
}

    </style>
</head>

<body class="bg-dark">
    <nav class="navbar">
        <div class="logo">
        <a href="#"><i class="fa fa-network-wired text-warning p-3  "></i></a>
            <div class="logos">
                <h1 class="text-light mb-4">Zeenetworks</h1>
               <h5 class="text-home"><a href="home.php" class="text-center text-dark">Home</a></h5>
            </div> 
            <div class="logout">
               <h3 class="text-center"><a href="logout.php" class="text-center">Logout</a></h3>
            </div>
        </div>
    </nav>
    <section>
        <?php

        ?>
        <div class="profile">
            <form action="" method="post">
                 <div class="cover">
                
            </div>
            <div class="prof">
                <img src="img/3.jpg" alt="profile">
                <input type="file" name="profile-image" id="image">
            </div> 
            <button type="submit" name="save" class="btn btn-primary text-light">Save</button>       
            </form>
          
            <div class="user-info">
            <div class="actions">
                <form action="" method="POST">
                <div class="field">
                    <input type="text" name="fname" value="<?php echo $user['fname'] . ' ' . $user['lname']; ?>" id="">
                </div>
                <div class="field">
                    <input type="text" name="email" value="@<?php echo $user['email']; ?>" id="">
                </div>
                <div class="field">
                    <input type="text" name="name" value="<?php echo $user['phone']; ?>" id="">
                </div>
             
                <div class="field">
                <button type="submit" name="commit" class="btn btn-primary text-light">Commit changes</button> 
                </div>
            </form>
            </div>
            </div>
        </div>
        

              
                
                
    </section>
</body>

</html>

