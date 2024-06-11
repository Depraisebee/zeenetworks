<?php
include "dbh.php";
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Form was submitted
    if (isset($_POST['save'])) {
        $file_name = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = 'profiles/' .$file_name;

        // Check if a profile record already exists for the user
        $existingRecordQuery = "SELECT * FROM students WHERE student_id = {$_SESSION['student_id']}";
        $existingRecordResult = mysqli_query($conn, $existingRecordQuery);

        if (mysqli_num_rows($existingRecordResult) > 0) {
            // Update the existing record
            $updateQuery = "UPDATE students SET profile_image = '$file_name' WHERE student_id = {$_SESSION['student_id']}";
            $updateResult = mysqli_query($conn, $updateQuery);
        } else {
            // Insert a new record
            $insertQuery = "INSERT INTO students (student_id, profile_image) VALUES ({$_SESSION['student_id']}, '$file_name')";
            $insertResult = mysqli_query($conn, $insertQuery);
        }

        if (move_uploaded_file($tempname, $folder)) {
            echo "<script>alert('Profile Picture Updated'); window.location.href = 'profile.php?checkpoint?profileUpdatedsuccesfully'</script>";
        } else {
            echo "<script>alert('An error occurred during Updating'); window.location.href = 'edit_profile.php?checkpoint?profileUpdatingdenied'</script>";
        }
    }
}
?>
