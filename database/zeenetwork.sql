
CREATE DATABASE zeenetworkdb;
USE zeenetworkdb;

CREATE TABLE `admins`( 
    `admin_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `unique_id` varchar(1000) NOT NULL,
    `fname` varchar(1000) NOT NULL,
    `lname` varchar(1000) NOT NULL,
    `email` varchar(1000) NOT NULL,
    `phone` varchar(1000) NOT NULL, 
    `profile_image` varchar(1000) NOT NULL,
    `password` varchar(1000) NOT NULL);


CREATE TABLE `students`(
    `student_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `unique_id` varchar(255) NOT NULL,
    `student_fname` varchar(255) NOT NULL,
    `student_lname` varchar(255) NOT NULL,
     `choice` varchar(255) NOT NULL,
    `student_nrc` varchar(255) NOT NULL,
    `students_id` varchar(1000) NOT NULL,
    `phone` varchar(1000) NOT NULL,
    `institution` varchar(1000) NOT NULL,
    `user_name` varchar(1000) NOT NULL,
    `profile_image` varchar(1000) NOT NULL,
    `password` varchar(255) NOT NULL);
    

CREATE TABLE payments (
    payment_id INT PRIMARY KEY AUTO_INCREMENT,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    student_id INT,
    student_nrc VARCHAR(255) NOT NULL,
    students_id VARCHAR(255) NOT NULL,
    network VARCHAR(255) NOT NULL,
    bank VARCHAR(255) NOT NULL,
    account_number VARCHAR(255) NOT NULL,
    amount DECIMAL(10,2) NOT NULL,
    transaction_id VARCHAR(255) NOT NULL,
    transaction_date DATETIME NOT NULL
    -- Adding other payment-related columns as needed
);

CREATE TABLE `profiles`( 
    `image_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `profile_image` varchar(1000) NOT NULL);
   

CREATE TABLE `updates` (
    `updates_id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `admin_name` varchar(100) NOT NULL,
    `admin_id` int(10) NOT NULL, -- Changed data type to match the referenced column
    FOREIGN KEY (`admin_id`) REFERENCES `admins` (`admin_id`),
    `update_post` varchar(1000) NOT NULL,
    `time_posted` varchar(1000) NOT NULL
);


CREATE TABLE `feedback`( 
    `id` int(10) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `studentsEmail` varchar(1000) NOT NULL,
    `studentsFeed` varchar(1000) NOT NULL
);


