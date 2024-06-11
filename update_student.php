<?php
session_start();

include "dbh.php";  // Include your database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['commit'])) {
        // Perform the necessary validations and update the user profile in the database
        $firstName = isset($_POST['fname']) ? $_POST['fname'] : '';
        $lastName = isset($_POST['lname']) ? $_POST['lname'] : '';
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $studentId = isset($_POST['studentId']) ? $_POST['studentId'] : '';
        $nrc = isset($_POST['nrc']) ? $_POST['nrc'] : '';
        $choice = isset($_POST['choice']) ? $_POST['choice'] : '';
        var_dump($_POST['commit']);
        
        // Update the user profile in the database (you should perform proper validation and sanitization)
        $updateQuery = "UPDATE students SET student_fname = ?, student_lname = ?, user_name = ?, student_nrc = ?, choice = ? WHERE unique_id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssssss", $firstName, $lastName, $username, $nrc, $choice, $_SESSION['unique_id']);

        if ($stmt->execute()) {
            // Update successful
            echo "<script>alert('Profile Updated Successfully'); window.location.href = 'profile.php'</script>";
        } else {
            // Update failed
            echo "<script>alert('Failed to Update Profile'); window.location.href = 'profile.php'</script>";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
