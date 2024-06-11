<?php
session_start();
include "dbh.php"; // Include your database connection file

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['pay'])) {
    // Retrieve form data
    // $studentId = $_POST["student_id"];
    // $studentNRC = $_POST["student_nrc"];
    $network = $_POST["network"];
    $bank = $_POST["bank"];
    $accountNumber = $_POST["account_number"];
    $amount = $_POST["amount"];

    // Generate transaction ID and date
    $Tnx = rand(10, 99) * 15 + rand(0, 9);
    $transactionId = "Tnxw.id$Tnx";
    $transactionDate = date("Y-m-d H:i:s");

    $studentSession = $_SESSION['student_id'];


    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO payments (student_id,  network, bank, account_number, amount, transaction_id, transaction_date)
            VALUES (?,  ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "ssssdss", $studentSession, $network, $bank, $accountNumber, $amount, $transactionId, $transactionDate);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Payment successful
            echo "
                <script>
                    alert('Payment successful! Transaction ID: $transactionId , Date: $transactionDate ');
                    window.open('home.php', '_self');
                </script>
             ";
        } else {
            // Payment failed
            echo "Payment failed. Please try again.";
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in prepared statement
        echo "Error in prepared statement. Please try again.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

?>
