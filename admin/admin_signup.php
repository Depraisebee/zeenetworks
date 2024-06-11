<?php
include "..//dbh.php"; // Include your database connection file

if (isset($_POST['submit'])) {
    // Retrieve form data
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security
    $random_id = rand(time(), 10000000);
    // Use prepared statements to prevent SQL injection
    
    $sql = "INSERT INTO admins (unique_id, fname, lname, email, phone, password)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "isssss",$random_id, $fname, $lname, $email, $phone, $password);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Registration successful
            echo "
                <script>
                    alert('Registration successful! You can now log in.');
                    window.open('index.php', '_self');
                </script>
            ";
        } else {
            // Registration failed
            echo "Registration failed. Please try again.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in prepared statement
        echo "Error in prepared statement. Please try again.";
    }
}
?>
