<?php
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit - Profile</title>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <script src="bootstrap-5.3.2-dist/js//bootstrap.min.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">  
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        .text-center {
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
            right: 21em;
            top: 4em;
            font-size: 30px;
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
        <div class="profile">
           
            <div class="user-info ">
                <div class="actions">
                    <form action="update_student.php" method="POST">
                        <div class="field">
                            <label for="fullName">Full Name:</label>
                            <input type="text" name="fullName" id="fullName" value="<?php echo htmlspecialchars($user['student_fname'] . ' ' . $user['student_lname']); ?>" readonly>
                        </div>
                        <div class="field">
                            <label for="username">Username:</label>
                            <input type="text" name="username" id="username" value="@<?php echo htmlspecialchars($user['user_name']); ?>" readonly>
                        </div>
                        <div class="field">
                            <label for="studentId">Student ID:</label>
                            <input type="text" name="studentId" id="studentId" value="<?php echo htmlspecialchars($user['students_id']); ?>" readonly>
                        </div>
                        <div class="field">
                            <label for="nrc">NRC:</label>
                            <input type="text" name="nrc" id="nrc" value="<?php echo htmlspecialchars($user['student_nrc']); ?>" readonly>
                        </div>
                        <div class="field">
                            <label for="choice">Choice:</label>
                            <input type="text" name="choice" id="choice" value="<?php echo htmlspecialchars($user['choice']); ?>" readonly>
                        </div>
                        <div class="field">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">Edit Profile</button>
                        </div>
                        <!-- Modal for editing -->
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Include the fields you want to edit -->
                                        <div class="field">
                                            <label for="fname">First Name:</label>
                                            <input type="text" name="fname" id="fullName" value="<?php echo htmlspecialchars($user['student_fname']); ?>">
                                        </div>
                                        <div class="field">
                                            <label for="lname">Last Name:</label>
                                            <input type="text" name="lname" id="fullName" value="<?php echo htmlspecialchars($user['student_lname']); ?>">
                                        </div>
                                        <div class="field">
                                            <label for="username">Username:</label>
                                            <input type="text" name="username" id="username" value="@<?php echo htmlspecialchars($user['user_name']); ?>">
                                        </div>
                                        <div class="field">
                                            <label for="studentId">Student ID:</label>
                                            <input type="text" name="studentId" id="studentId" value="<?php echo htmlspecialchars($user['students_id']); ?>">
                                        </div>
                                        <div class="field">
                                            <label for="nrc">NRC:</label>
                                            <input type="text" name="nrc" id="nrc" value="<?php echo htmlspecialchars($user['student_nrc']); ?>">
                                        </div>
                                        <div class="field">
                                            <label for="choice">Choice:</label>
                                            <input type="text" name="choice" id="choice" value="<?php echo htmlspecialchars($user['choice']); ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" name="commit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
$(document).ready(function() {
    // Show modal when the "Edit Profile" button is clicked
    $('#editModalButton').click(function() {
        $('#editModal').modal('show');
    });

    // Update form fields when modal is shown
    $('#editModal').on('shown.bs.modal', function() {
        // Populate form fields with current values
        $('#fname').val('<?php echo htmlspecialchars($user['student_fname']); ?>');
        $('#lname').val('<?php echo htmlspecialchars($user['student_lname']); ?>');
        $('#usernameModal').val('<?php echo htmlspecialchars($user['user_name']); ?>');
        $('#studentIdModal').val('<?php echo htmlspecialchars($user['students_id']); ?>');
        $('#nrcModal').val('<?php echo htmlspecialchars($user['student_nrc']); ?>');
        $('#choiceModal').val('<?php echo htmlspecialchars($user['choice']); ?>');
    });

    // Submit form asynchronously when "Save Changes" button is clicked
    $('#saveChangesButton').click(function() {
        // Perform additional validation if needed
        // ...

        // Submit form using AJAX
        $.ajax({
            type: 'POST',
            url: 'profile.php',
            data: $('#editForm').serialize(),
            success: function(response) {
                // Handle the response (you can show an alert or update UI)
                alert(response);
                // Close the modal if the update was successful
                $('#editModal').modal('hide');
            },
            error: function(error) {
                // Handle the error
                console.error(error);
            }
        });
    });
});
</script>

</body>

</html>
