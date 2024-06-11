<?php 

// Retrieve payments along with student information
$sql = "SELECT payments.*, students.student_fname AND students.student_lname
FROM payments
JOIN students ON payments.student_id = students.student_id";


