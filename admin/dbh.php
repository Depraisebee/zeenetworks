<?php 


$host = "localhost";
$dbname = "zeenetworkdb";
$username = "root";
$password = "";
$conn = mysqli_connect( $host, $username, $password,$dbname );
if(!$conn){
    echo "Failed to Connect";
}

// try {
//     $dbh = new PDO('mysql:host =localhost; dbname=zeenetworkdb;', 'root', '');
// } catch (PDOException $e) {
//     //echo $e->getMessage();
//     echo"An error has occured".$e->getMessage();
// }