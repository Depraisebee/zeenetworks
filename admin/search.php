<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_id'])) {
    // Redirect to the login page if not logged in
    header("Location: index.php");
    exit();
}

include "dbh.php";

// Retrieve user information from the database using the stored admin_id in the session
$admin_id = $_SESSION['admin_id'];

$stmt = $conn->prepare("SELECT * FROM admins WHERE admin_id = ?");
$stmt->bind_param("i", $admin_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$stmt->close();
// $conn->close();

// include "check_login.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zeenetworks | Admin panel</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css">
    <script src="bootstrap-5.3.2-dist/js/bootstrap.bundle.js"></script>
    <script src="../jsPDF-master/dist/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="fontawesome-free-6.4.2-web/css/all.min.css">

    <style>
        #interface {
            width: calc(100% - 400px);
            position: relative;
            margin-left: 400px;


        }

        #interface .navigation {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #fff;
            padding: 15px 20px;
            border-bottom: 3px solid #594ef7;
            position: fixed;
            width: calc(100% - 400px);
            margin-left: 0px;
            background: rgb(255, 255, 255);

        }

        @media(max-width:769px) {
            #interface {
                width: calc(100% - 0px);
                position: relative;
                margin-left: 0px;


            }

            #interface .navigation {
                display: flex;
                align-items: center;
                justify-content: space-between;
                background: #fff;
                padding: 15px 20px;
                border-bottom: 3px solid #594ef7;
                position: fixed;
                width: calc(100% - 0px);
                margin-left: 0px;
                background: rgb(255, 255, 255);

            }
        }

        .register-student {
            background-color: #010101;
            overflow-x: scroll;
            border-radius: 5px;
        }

        .register-student h4 {
            color: #fff;
            padding: 8px;
            font-size: 25px;
        }


        .updated .cards {
            box-shadow: -3px 1px 1px 2px rgb(0, 0, 9, 0.1);
            width: 80%;
            border-radius: 8px;
            padding: 20px;
            background: #cfd2d3;
            margin: 8px;
        }

        .updated {
            padding: 5px;
            justify-content: flex-start;
            display: grid;
        }

        .updates {
            padding: 8px;
            top: 120px;

        }

        .updates h2 {
            color: #01b0e0;
            font-size: 29px;
            padding: 8px;
            /* flex-basis: 100%; */
            margin: 0 4px;
        }

        .updates .cards p {
            color: #1d2735;
            font-size: 25px;
            font-weight: 500;
            text-align: left;
            font-family: Monospace;
        }

        .updates .cards h4 {
            color: #e000e0;
            font-size: 25px;
        }

        .updates .card p a {
            text-decoration: none;

            color: #1d2735;
            font-size: 22px;
            font-weight: 600;
        }

        .time {
            margin: 10px;
            color: #333;
            display: flex;
            font-size: 16px;
        }

        .time h6 {
            margin: 7px;
            bottom: 7.7px;
            font-size: 14px;

        }

        .profile h4 {
            color: #333;
            font-size: 20px;
        }

        .active {
            border-left: 4px solid #fff;
            /* background: #fff; */
            border-radius: 0 10px 0 10px;
            color: #0051f3;
        }
    </style>
</head>

<body id="body">

    <section id="menu">
        <div class="closebtn" class="icons">
            <i class="fas fa-times" id="closebtn"></i>
        </div>
        <div class="logo">
            <img src="img/2.jpg">
            <h2>Zeenetworks</h2>
        </div>
        <div class="items ">
            <li ><i class=""></i><a href="home.php">Home</a></li>
            <li class="actives"><i></i><a href="search.php">Find</a></li>
           

        </div>
    </section>

    <section id="interface">
        <div class="navigation">
            <div class="n1">
                <div>
                    <div id="menubtn">
                        <i class="fa fa-bars"></i>
                    </div>
                </div> 
                <form action="search.php" method="POST">
                <div class="search">
                   
                    <button type="submit" style="background: transparent;border:none;" name="search"><i class="fa fa-search" class="icons"></i></button>
                    <input type="text" name="search-input" id="searchInput" oninput="getSearchSuggestions()" placeholder="Search...">
                    <ul id="suggestionsList"></ul>

               
                </div>
             </form>
            </div>
          


        </div>
        <h3 class="i-name ">Search results</h3>
        <h4 class="text-primary p-2">Results for "<?php
        if( isset($_POST['search'])){
            $search = mysqli_real_escape_string($conn, $_POST['search-input']);
             echo $search;
        }
        ?>"</h4>
        <div class="theme">
            <button id="btn">Change Theme</button>
        </div>
       <!--this code gets the Paid Students --->
        <div class="data">
            <?php 
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

                     $sqlAdmin = "SELECT * FROM admins WHERE 
                                    admin_id LIKE '%$search%' OR 
                                    fname LIKE '%$search%' OR 
                                    lname LIKE '%$search%' OR 
                                    email LIKE '%$search%' OR 
                                    phone LIKE '%$search%'";

                    $resultAdmin = mysqli_query($conn, $sqlAdmin);
                    $queryResultAdmin = mysqli_num_rows($resultAdmin);

                    echo "There are {$queryResultPayments} payment results, {$queryResultStudents} student results and {$queryResultAdmin} Admin results";
                    
                    if ($queryResultPayments > 0) {
                        while ($row = mysqli_fetch_assoc($resultPayments)){
                            ?>    
                            
                            <div class="data-student">
                            <h2 class="">Students Payment Data</h2>
                                <table border="1" cell padding="2" cellspacing="2">
                                    <th>Student NRC ID</th>
                                    <th>Student ID</th>
                                    <!-- <th>Student name</th> -->
                                    <th>Amount Paid</th>
                                    <th>Paid Date</th>
                                    <th>Generate receipt</th>
                            <?php               
                           ?>
                     <tr>
                            <td><?php echo $row['student_nrc']; ?></td>
                            <td><?php echo $row['students_id']; ?></td>
                            <!-- <td><?php //echo $row['student_name']; ?></td> -->
                            <td><?php echo $row['amount']; ?></td>
                            <td><?php echo $row['transaction_date']; ?></td>
                            <td><button class="btn text-light btn-primary" onclick="generateReceipt('<?php echo $receiptId; ?>', '<?php echo $amount; ?>', '<?php echo $studentId; ?>', '<?php echo $transactionDate; ?>')">Generate</button></td>
                      </tr>
                                </table>
                            </div>
                            <div class="receipt">
                                <button onclick="generateReceipt()">Generate Report</button>
                
                            </div> 
                            <?php
                        }
                    }
                

                    //display admins
                    if ($queryResultAdmin > 0) {
                        while ($row = mysqli_fetch_assoc($resultAdmin)) {
                    ?>
                    <h4 class="text-primary">Registered Admins</h4>
                    <div class="board">
                    <table width="100%">
                        <thead>
                            <tr>
                                <td>Name</td>
                                <td>Email</td>
                                <td>Phone No</td>
                                <td>Action</td>
        
        
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="people">
                                <img src="profiles/<?php echo $row['profile_image']; ?>">
                            <div class="people-de">
                                <h5 class="text-dark"><?php echo $row['fname'] . ' ' . $row['lname']; ?></h5>
                            </div>
                        <td>
                            <p class="text-light"><?php echo $row['email']; ?></p>
                        </td>
                        <td>
                            <p class="text-dark "><?php echo $row['phone']; ?></p>
                        </td>
                        <td class="edit"><a href="#">Edit</a></td>
                        </td>
                            </tr>
                            </tbody>
            </table>
        </div>
                           <?php
                                  }
                                }
                                if ($queryResultPayments == 0 && $queryResultAdmin == 0 && $queryResultStudents == 0) {
                                  echo "<p>No results found for your search</p>";
                              }
                //DISPLAY STUDENTS
          
                if ($queryResultStudents > 0) {
                    while ($row = mysqli_fetch_assoc($resultStudents)) {
                           ?>
                             <div class="register-student">
                    <h4>Registered Student</h4>
                    <table border="1"cell
                            padding= "2" cellspacing="2">
                            <th>Student NRC ID</th>
                            <th>Student ID</th>
                            <th>Student name</th>
                            <th>Year</th>
                            <th>Phone Number</th>
                            <th>Institution</th>
                            <tr>
                                <td><?php echo $row['student_nrc'];?></td>
                                <td><?php echo $row['students_id'];?></td>
                                <td><?php echo $row['student_fname']." ". $row['student_lname'];?></td>
                                <td><?php echo $row['choice'];?></td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo $row['institution'];?></td>
                            </tr>
                    </table>
                    </div>
                           <?php
                        }
                  }
                
            }
            ?>
        
        </div>


        <?php
// if ($result) {
//     while ($row = mysqli_fetch_array($data)) {
//         $Receipt = rand(100, 9) * 15 + time();
//         $receiptId = "mmce$Receipt";

//         // Call the function to generate the PDF receipt
//         generateReceipt($receiptId, $row['amount'], 'malumbo praise', $row['students_id'], $row['transaction_date']);
//     }
// }

        ?>
       

        <script src="../jsPDF-master/dist/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="js/theme.js"></script>
    <script>
        var showBtn = document.getElementById('menubtn');
        var showmenu = document.getElementById('menu');
        var closeBtn = document.getElementById('closebtn');

        showBtn.addEventListener('click', showMenu);
        function showMenu() {
            showmenu.style.display = "block";
            showBtn.style.display = "none";
        };
        closeBtn.addEventListener('click', closeMenu);
        function closeMenu() {
            showmenu.style.display = "none";
            showBtn.style.display = "block";
        };



        //this code is  for receipt generation

        function generateReceipt(receiptId, amount, studentName, studentId, transactionDate) {
        // Create instance of jsPDF
        var pdf = new jsPDF();

        // Add content to the PDF
        pdf.text(20, 20, 'Malcolm Moffat College of Education');
        pdf.text(20, 30, 'Receipt No: ' + receiptId);
        pdf.text(20, 40, 'Amount paid: ' + amount);
        pdf.text(20, 50, 'Student Name: ' + studentName);
        pdf.text(20, 60, 'Student ID: ' + studentId);
        pdf.text(20, 70, 'Transaction date: ' + transactionDate);
        pdf.text(20, 80, 'Student phone: 0976445026');

        // Output as data URL (base64 encoded)
        var pdfContent = pdf.output('datauristring');

        // Open a new window with the PDF content
        window.open(pdfContent, '_blank');
    }
    generateReceipt();
   
   

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

</body>

</html>