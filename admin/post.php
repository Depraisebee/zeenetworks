<?php
// Ensure session_start() is called only once
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}
include "dbh.php";

// Check if the user is logged in as admin
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];

    if (isset($_POST['post'])) {
        // Code for posting updates...
        $postUpdate = $_POST['update'];
        if (!empty($postUpdate)) {
            // Use prepared statement to prevent SQL injection
            $date = date("Y-m-d H:i:s");
            $query = "INSERT INTO updates (admin_id, update_post, time_posted) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);

            if ($stmt) {
                // Bind parameters to the statement
                mysqli_stmt_bind_param($stmt, "iss", $admin_id, $postUpdate, $date);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    // Post updated successfully
                    echo "<script>alert('Post updated successfully');</script>";
                } else {
                    // Error during update
                    echo "An error occurred during the update.";
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                // Error in prepared statement
                echo "Error in prepared statement. Please try again.";
            }
        } else {
            echo "<script>alert('Type something in the text box');</script>";
        }
    }

    if (isset($_POST['delete'])) {
        // Code for deleting updates...
        $updateIdToDelete = $_POST['delete'];
        // Use prepared statement to prevent SQL injection
        $query = "DELETE FROM updates WHERE updates_id = ?";
        $stmt = mysqli_prepare($conn, $query);

        if ($stmt) {
            // Bind parameters to the statement
            mysqli_stmt_bind_param($stmt, "i", $updateIdToDelete);
            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                // Post deleted successfully
                echo "<script>alert('Post deleted successfully');</script>";
            } else {
                // Error during deletion
                echo "An error occurred during the deletion.";
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            // Error in prepared statement
            echo "Error in prepared statement. Please try again.";
        }
    }

    // Fetch updates from the database
    $query = "SELECT * FROM updates WHERE admin_id = ?";
    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {
        // Bind parameters to the statement
        mysqli_stmt_bind_param($stmt, "i", $admin_id);
        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Get the result
            $result = mysqli_stmt_get_result($stmt);
            // Check if there are updates
            if(mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="updated">
                        <div class="cards" style="margin: 8px 0;">
                            <h4><?php echo $row['admin_name']; ?></h4>
                            <p><?php echo $row['update_post']; ?>~MGT~</p>
                            <div class="time">
                                <h5>Posted: <span class = "text-info"> <?php echo calculateTimeElapsed($row['time_posted']); ?></span></h5>
                            </div>
                            <form method="post">
                                <!-- Assuming $row['update_id'] contains the update's ID -->
                                <button type="submit" name="delete" value="<?php echo $row['updates_id']; ?>" class = "btn btn-primary text-light" onclick="alert('Are you sure you want to delete this.')">Delete</button>
                            </form>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "There are no updates from the database. Post to see one.";
            }
        } else {
            // Error executing statement
            echo "Error executing statement: " . mysqli_error($conn);
        }
        
        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        // Error in prepared statement
        echo "Error in prepared statement. Please try again.";
    }
} else {
    echo "<h6 class='text-success'>You are not logged in as an admin!</h6>";
}

// Function to calculate time elapsed since the post was made
function calculateTimeElapsed($post_time)

{

    $current_time = time();
    $post_timestamp = strtotime($post_time);
    $time_diff = $current_time - $post_timestamp;

    if ($time_diff < 60) {
        return "Just now";
    } elseif ($time_diff < 3600) {
        $minutes = floor($time_diff / 60);
        return $minutes . " minute" . ($minutes > 1 ? "s" : "") . " ago";
    } elseif ($time_diff < 86400) {
        $hours = floor($time_diff / 3600);
        return $hours . " hour" . ($hours > 1 ? "s" : "") . " ago";
    } else {
        $days = floor($time_diff / 86400);
        return $days . " day" . ($days > 1 ? "s" : "") . " ago";
    }
}
?>
