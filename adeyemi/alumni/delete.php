<?php  

// Establish database connection
include('connection.php');

    $sql = "DELETE FROM participants WHERE id = '".$_POST["id"]."'";  
    if(mysqli_query($conn, $sql))  
    {  
        echo 'Data Deleted';  
    }  

 ?>