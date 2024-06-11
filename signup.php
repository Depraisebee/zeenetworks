<?php
include "dbh.php";


// ...

if (isset($_POST['submit'])) {
    $studentfname = $_POST['fname'];
    $studentlname = $_POST['lname'];
    $choice = $_POST['choice'];
    $studentnrc = $_POST['studentsNRC'];
    $studentid = $_POST['studentsID'];
    $institution = $_POST['institution'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    //validate inputs
    if(!empty($studentfname ) && !empty($studentlname) && !empty($choice) && !empty($username) && !empty($password)){
    // ... 
    $random_id = rand(time(), 10000000);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO students (unique_id, student_fname, student_lname, choice, student_nrc, students_id, phone, institution, user_name, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ? , ?);");
    $stmt->bind_param('isssssssss', $random_id, $studentfname, $studentlname, $choice, $studentnrc, $studentid,  $phone, $institution, $username, $hashedPassword);

    // Sanitize the input
    // $studentnrc = mysqli_real_escape_string($conn, $studentnrc);
    // $studentid = mysqli_real_escape_string($conn, $studentid);
  //  var_dump($_POST['submit']);
    if ($stmt->execute()) {
        $sql2 = mysqli_query($conn, "SELECT * FROM students WHERE user_name = '{$username}'");
        if ($sql2) {
           
                ?>
                <script>
                    alert("Registration Successfully");
                    window.location.href = "login.php?registration=successlogin";
                </script>
                <?php
            }
        } else {
            echo "Query failed: " . mysqli_error($conn);
        }
    }else{
            echo '<script>alert("No fields must be empty"); window.location.href = "register.php?checkpoint?registrationsDenied"</script>';
    }
    } 

?>
