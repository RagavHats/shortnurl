<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS shorten";
if ($conn->query($sql) === TRUE) {
    //echo "Database created successfully";
} else {
   // echo "Error creating database: " . $conn->error;
}


$conn->close();
$db = mysqli_connect($servername,$username,$password,'shorten');

$create = "CREATE TABLE IF NOT EXISTS url_shortner (`url_id` TEXT, `long_url` TEXT, `short_url` TEXT)";
$query = mysqli_query($db, $create);
?>