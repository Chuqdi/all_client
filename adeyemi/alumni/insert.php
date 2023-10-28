<?php  
// Establish database connection
include('connection.php');

    session_start();
    // $activity_code = $_SESSION['activity_code'];
    // $activity = $_SESSION['activity'];
    // $activity_type = $_SESSION['activity_type'];
    // $lead_unit = $_SESSION['lead_unit'];
    // $completion_date = $_SESSION['completion_date'];



    $sql = "INSERT INTO participants(completion_date, activity_code, activity, activity_type, first_name, surname, organisation, organisation_type, country, email_address, phone_number, gender, lead_unit) VALUES('".$_POST["completion_date"]."', '".$_POST["activity_code"]."', '".$_POST["activity"]."', '".$_POST["activity_type"]."', '".$_POST["first_name"]."', '".$_POST["surname"]."', '".$_POST["organisation"]."', '".$_POST["organisation_type"]."', '".$_POST["country"]."', '".$_POST["email_address"]."', '".$_POST["phone_number"]."', '".$_POST["gender"]."', '".$_POST["lead_unit"]."')";  
    mysqli_query($conn, $sql);



    // $sql = "INSERT INTO participants(completion_date, activity_code, activity, activity_type, first_name, surname, organisation, organisation_type, country, email_address, phone_number, gender, lead_unit) VALUES('$completion_date', '$activity_code', '$activity', '$activity_type', '".$_POST["first_name"]."', '".$_POST["surname"]."', '".$_POST["organisation"]."', '".$_POST["organisation_type"]."', '".$_POST["country"]."', '".$_POST["email_address"]."', '".$_POST["phone_number"]."', '".$_POST["gender"]."', '$lead_unit')";  
    // mysqli_query($conn, $sql);





    // if(mysqli_query($conn, $sql))  
    // {  
    //     echo 'Data Inserted';  
    // }  

 ?> 