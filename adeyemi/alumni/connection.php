<?php  

// Establish database connection
$conn = new mysqli('localhost', 'root', '', 'alumnidb');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>