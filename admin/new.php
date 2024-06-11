<?php
include "dbh.php"; // Assuming this file contains the database connection

// Function to get counts based on search criteria
function getCounts($searchType, $conn) {
    $counts = [];

    switch ($searchType) {
        case 'paid_students':
            $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM payments");
            break;
        case 'registered_students':
            $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM students");
            break;
        case 'registered_admins':
            $stmt = $conn->prepare("SELECT COUNT(*) AS count FROM admins");
            break;
        // Add more cases for other search criteria

        default:
            // Default case, return an empty array or handle as needed
            return $counts;
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $count = $result->fetch_assoc()['count'];
    $stmt->close();

    // Add the count to the array
    $counts[$searchType . '_count'] = $count;

    return $counts;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a form with a select input for search type and an input for the search query
    $searchType = $_POST['search_type'] ?? '';
    $searchQuery = $_POST['search_query'] ?? '';

    // Perform search based on the selected type
    switch ($searchType) {
        case 'paid_students':
            $query = "SELECT * FROM payments WHERE column_name LIKE ?";
            break;
        case 'registered_students':
            $query = "SELECT * FROM students WHERE column_name LIKE ?";
            break;
        case 'registered_admins':
            $query = "SELECT * FROM admins WHERE column_name LIKE ?";
            break;
        // Add more cases for other search criteria

        default:
            // Default case, handle as needed
            break;
    }

    // Execute the search query with the provided search query parameter
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();
    // Process the search results as needed
    // ...

    // Close the statement
    $stmt->close();
}

// Use the getCounts function to get counts based on search criteria
$searchCounts = getCounts($searchType, $conn);
// Use the counts as needed
?>








<?php
include "search.php";

// ... Rest of your code

// Use the getCounts function to get counts based on search criteria
$searchCounts = getCounts($searchType, $conn);
// Use the counts as needed
?>




// php 



<?php
include "dbh.php"; // Assuming this file contains the database connection

// Function to get search suggestions based on user input
function getSearchSuggestions($searchType, $searchQuery, $conn) {
    $suggestions = [];

    // Adjust the query based on the selected search type
    switch ($searchType) {
        case 'paid_students':
            $query = "SELECT student_name FROM students WHERE student_name LIKE ? LIMIT 5";
            break;
        case 'registered_students':
            $query = "SELECT student_name FROM students WHERE student_name LIKE ? LIMIT 5";
            break;
        case 'registered_admins':
            $query = "SELECT admin_name FROM admins WHERE admin_name LIKE ? LIMIT 5";
            break;
        // Add more cases for other search criteria

        default:
            // Default case, return an empty array or handle as needed
            return $suggestions;
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $searchQuery);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        // Add each suggestion to the array
        $suggestions[] = $row['student_name']; // Adjust the key based on your actual column
    }

    $stmt->close();

    return $suggestions;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a form with a select input for search type and an input for the search query
    $searchType = $_POST['search_type'] ?? '';
    $searchQuery = $_POST['search_query'] ?? '';

    // Get search suggestions based on user input
    $suggestions = getSearchSuggestions($searchType, $searchQuery, $conn);

    // Return the suggestions as a JSON response
    echo json_encode($suggestions);
    exit();
}
?>









//for java       


<!-- Add this to your HTML where you want the search box -->
<input type="text" id="searchInput" oninput="getSearchSuggestions()">
<ul id="suggestionsList"></ul>

<script>
function getSearchSuggestions() {
    // Get the selected search type and search query from your form
    var searchType = document.getElementById('searchType').value; // Assuming you have a select input for search type
    var searchQuery = document.getElementById('searchInput').value;

    // Make an AJAX request to the search.php file
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'search.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parse the JSON response and update the suggestions list
            var suggestions = JSON.parse(xhr.responseText);
            updateSuggestionsList(suggestions);
        }
    };
    xhr.send('search_type=' + searchType + '&search_query=' + searchQuery);
}

function updateSuggestionsList(suggestions) {
    var suggestionsList = document.getElementById('suggestionsList');
    suggestionsList.innerHTML = ''; // Clear the existing suggestions

    // Add each suggestion as a list item
    suggestions.forEach(function (suggestion) {
        var listItem = document.createElement('li');
        listItem.textContent = suggestion;
        suggestionsList.appendChild(listItem);
    });
}
</script>



<?php
    // ... (previous code remains unchanged)

    if (isset($_POST['search'])) {
        $search = mysqli_real_escape_string($conn, $_POST['search-input']);
    
        // Search for payments
        $sqlPayments = "SELECT * FROM payments WHERE 
                        student_nrc LIKE '%$search%' OR 
                        students_id LIKE '%$search%' OR 
                        amount LIKE '%$search%' OR 
                        transaction_date LIKE '%$search%'";
    
        $resultPayments = mysqli_query($conn, $sqlPayments);
        $queryResultPayments = mysqli_num_rows($resultPayments);
    
        // Search for students
        $sqlStudents = "SELECT * FROM students WHERE 
                        student_nrc LIKE '%$search%' OR 
                        students_id LIKE '%$search%' OR 
                        student_fname LIKE '%$search%' OR 
                        student_lname LIKE '%$search%'";
    
        $resultStudents = mysqli_query($conn, $sqlStudents);
        $queryResultStudents = mysqli_num_rows($resultStudents);
    
        echo "There are {$queryResultPayments} payment results and {$queryResultStudents} student results";
    
        // Display payment results
        if ($queryResultPayments > 0) {
            while ($row = mysqli_fetch_assoc($resultPayments)) {
                // Display payment results here
            }
        }
    
        // Display student results
        if ($queryResultStudents > 0) {
            while ($row = mysqli_fetch_assoc($resultStudents)) {
                // Display student results here
            }
        }
    
        // Display a message if no results are found
        if ($queryResultPayments == 0 && $queryResultStudents == 0) {
            echo "<p>No results found for your search</p>";
        }
    }
    ?>
    

