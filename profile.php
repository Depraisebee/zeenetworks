<!-- <?php
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['student_id'])) {
            // Redirect to the login page if not logged in
            header("Location: index.php");
            exit();
        }

        include "dbh.php";

        // Retrieve user information from the database using the stored user_id in the session
        $student_id = $_SESSION['student_id'];

        $stmt = $conn->prepare("SELECT * FROM students WHERE student_id = ?");
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
    <title>eenetworks | Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">
    <style>
     
     nav{
    position: fixed;
        z-index: 99;
        background: linear-gradient(to right, #e2ffe9, #628ecb);
        width: 100%;
        height: 100px;
}
    </style>
</head>

<body class="bg-dark">
    <nav class="navbar ">
        <div class="logo">
            <a href="#"><i class="fa fa-network-wired"></i></a>
            <div class="logos">
                <h1 class="text-primary mb-5">Zeenetworks</h1>
                <h5 class="text-home"><a href="home.php" class="text-center text-primary">Home</a></h5>
            </div>
            <div class="logout">
                <h3 class="text-center"><a href="logout.php" class="text-center text-dark">Logout</a></h3>
            </div>
        </div>
    </nav>
    <section>
        <div class="profile">
            <form action="edit_profile_processing.php" method="post" enctype="multipart/form-data">
                <div class="cover">
                    <?php
                    $sql = "SELECT * FROM students WHERE student_id = {$_SESSION['student_id']}";
                    $query = mysqli_query($conn, $sql);

                    ?>
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <img src="profiles/<?php echo $row['profile_image']; ?>">
                    <?php } ?>
                </div>
                <?php
                $sql = "SELECT * FROM students WHERE student_id = {$_SESSION['student_id']}";
                $query = mysqli_query($conn, $sql);
                ?>
                <div class="prof">
                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                        <img src="profiles/<?php echo $row['profile_image']; ?>" class="mb-4">
                    <?php } ?>
                </div>
                <div class="icon">
                    <label for="image"><i class="fa fa-camera text-success"></i></label>
                    <input type="file" class="d-none" name="image" id="image">
                    <button type="submit" name="save" class="btn btn-primary text-light btn-save">Update Image</button>
                </div>
            </form>
            <div class="user-info container bg-dark p-2">
                <h3 class="text-left text-light">Student Details</h3>
                <div class="wrapper">
                    <div class="div">
                        <h4 class="text-warning text-left">Full name: <?php echo $user['student_fname'] . ' ' . $user['student_lname']; ?></h4>
                        <h5 class="text-light text-left">@<?php echo $user['user_name']; ?></h5>
                        <h5 class="text-light text-left">Student Id: <?php echo $user['students_id']; ?></h5>
                        <h5 class="text-light text-left">Student NRC: <?php echo $user['student_nrc']; ?></h5>
                        <h5 class="text-light text-left">Year: <?php echo $user['choice']; ?></h5>
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
                                <h1 class="text-primary"><?php echo $user['student_fname'] . ' ' . $user['student_lname']; ?></h1>
                                <p class="last text-light">Hi <?php echo $user['student_fname']; ?>, You are in <?php echo $user['choice']; ?> <br> At <?php echo $user['institution']; ?></p>
                                <div class="spinner-grow text-danger sm-2"></div>
                                <div class="spinner-grow text-primary"></div>
                                <div class="spinner-grow text-success"></div>
                                <div class="spinner-grow text-warning"></div>
                                <div class="spinner-grow text-danger"></div>
                                <div class="spinner-grow text-secondary"></div>
                            </div>
                            <div class="carousel-item">
                                <h1 class="text-gray">Avoid long ques in the banks!!</h1>
                                <p class="last text-light">We are here to Digitalize, Connect and Transform your life. <br> Zeenetworks! The new way of transacting your money</p>
                            </div>

                            <!--image 1  -->
                            <div class="carousel-item">
                                <div class="slide-img">
                                    <?php
                                    $sql = "SELECT * FROM students WHERE student_id = {$_SESSION['student_id']}";
                                    $query = mysqli_query($conn, $sql);
                                    ?>
                                    <?php while ($row = mysqli_fetch_assoc($query)) { ?>
                                        <img src="profiles/<?php echo $row['profile_image']; ?>" class="mb-4">
                                    <?php } ?>
                                    <p class="text text-light">Avoid long ques in banks. We've come <br>to change the way you move!!</p>
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
                    <p class="text-primary">Edit Profile Information</p>
                    <?php echo ' <a href="edit_profile.php?updateid=' . $student_id . '" class="text-light">
                        <button class="btn btn-primary">Edit</button>
                    </a>' ?>
                </div>
            </div>
        </div>
    </section>
</body>

</html>