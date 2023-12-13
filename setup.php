<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE Jovero";
    $conn->exec($sql);

    $conn->exec("USE Jovero");

    $sql = "CREATE TABLE JoveroK_Users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(100) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $conn->exec($sql);

    $sql = "CREATE TABLE JoveroK_Instructors (
        instructor_id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(100) NOT NULL,
        expertise VARCHAR(100)
    )";
    $conn->exec($sql);

    $sql = "CREATE TABLE JoveroK_Courses (
        course_id INT AUTO_INCREMENT PRIMARY KEY,
        course_name VARCHAR(100) NOT NULL,
        instructor_id INT,
        FOREIGN KEY (instructor_id) REFERENCES JoveroK_Instructors(instructor_id)
    )";
    $conn->exec($sql);

    $sql = "CREATE TABLE JoveroK_Students (
        student_id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        full_name VARCHAR(100) NOT NULL,
        date_of_birth DATE,
        address VARCHAR(255),
        FOREIGN KEY (user_id) REFERENCES JoveroK_Users(id)
    )";
    $conn->exec($sql);

    $sql = "CREATE TABLE JoveroK_Enrollment (
        enrollment_id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT,
        course_id INT,
        FOREIGN KEY (student_id) REFERENCES JoveroK_Students(student_id),
        FOREIGN KEY (course_id) REFERENCES JoveroK_Courses(course_id)
    )";
    $conn->exec($sql);

    echo "Tables created successfully";
} catch(PDOException $e) {
    echo "Error creating tables: " . $e->getMessage();
}

$conn = null;
?>
