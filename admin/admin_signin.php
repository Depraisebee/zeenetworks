<?php
    include "dbh.php";

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)){

    $stmt = $conn->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if ($row) {
        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Start a session and store user information
            session_start();
            $_SESSION['admin_id'] = $row['admin_id']; //  'admin_id' is the primary key in the table
            $_SESSION['fname'] = $row ['fname'];
            $_SESSION['email'] = $row ['fname'];

            // Redirect to a dashboard or another page
            echo ' <script>alert("Login successful!"); window.location.href = "home.php?checkpoint?authantication=success"</script>';
            exit();
        } else {          
           
            echo " <script>alert('Invalid password'); window.location.href = 'index.php?checkpoint?authantication'</script>";
        }
    } else {
        echo " <script>alert('Email not found'); window.location.href = 'index.php?checkpoint?authanticationFailed'</script>";     
    }
    $stmt->close();
    $conn->close();
}else{
    echo '<script>alert("No fields must be empty"); window.location.href = "index.php?checkpoint?authanticationsiedsareempty"</script>';
}
    
}
?>
