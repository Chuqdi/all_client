<?php  
// Establish database connection
include('connection.php');

    $id = $_POST["id"];  
    $text = $_POST["text"];  
    $column_name = $_POST["column_name"];  
    $sql = "UPDATE participants SET ".$column_name."='".$text."' WHERE id='".$id."'";  
    mysqli_query($conn, $sql);
    // if(mysqli_query($conn, $sql))  
    // {  
    //     echo 'Data Updated';  
    // }  

 ?>