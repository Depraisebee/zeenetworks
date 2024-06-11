<?php
    include "dbh.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // var_dump($_POST['submit']);
    if(!empty($username) && empty(!$password)){

    $stmt = $conn->prepare("SELECT * FROM students WHERE user_name = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Start a session and store user information
            session_start();
            $_SESSION['student_id'] = $row['student_id']; 
            $_SESSION['name'] = $row ['student_fname'];
            $_SESSION['username'] = $row ['user_name'];

            // Redirect to a dashboard or another page
            echo ' <script>alert("Login successful!"); window.location.href = "home.php?checkpoint?authantication=success"</script>';
            exit();
        } else {          
            echo " <script>alert('Invalid password'); window.location.href = 'login.php?checkpoint?authantication?access denied'</script>";
        }
    } else {
        echo " <script>alert('Username not found'); window.location.href = 'login.php?checkpoint?authantication'</script>";     
    }
    $stmt->close();
    $conn->close();
}else{
    echo '<script>alert("No fields must be empty"); window.location.href = "login.php?checkpoint?authanticationAccessDenied"</script>';
}
    
}
?>
