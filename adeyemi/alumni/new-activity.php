<?php 

    include('connection.php');    
    include('errors.php'); 


    session_start();
    $session_user = $_SESSION['username'];

    
    if (isset($_POST['save_act'])){

        //Retrieve form data
        $activity_code = mysqli_real_escape_string($conn, $_POST['activity_code']);
        $activity = mysqli_real_escape_string($conn, $_POST['activity']);
        $activity_type = mysqli_real_escape_string($conn, $_POST['activity_type']);
        $lead_unit = mysqli_real_escape_string($conn, $_POST['lead_unit']);
        $completion_date = mysqli_real_escape_string($conn, $_POST['completion_date']);
      
        // Perform data validation and sanitization (you can add more validation logic)
        if(empty($activity_code)) {array_push($errors, $_POST['activity_code']);}
        if(empty($activity)) {array_push($errors, $_POST['activity']);}
        if(empty($activity_type)) {array_push($errors, $_POST['activity_type']);}
        if(empty($lead_unit)) {array_push($errors, $_POST['lead_unit']);}
        if(empty($completion_date)) {array_push($errors, $_POST['completion_date']);}
      
      
        if (count($errors) == 0){

        $completion_date = date("Y-m-d");
      
            // Construct and execute the SQL query
            $sql = "INSERT INTO participants (completion_date, activity_code, activity, activity_type, lead_unit) VALUES ('$completion_date', '$activity_code', '$activity', '$activity_type', '$lead_unit')";
            //mysqli_query($conn, $sql);
            if(mysqli_query($conn, $sql))  
            {  
                echo 'Data Inserted';  
            }  
            else{
                echo 'Data Error'; 
            }

            $_SESSION['activity_code'] = $activity_code;
            $_SESSION['activity'] = $activity;
            $_SESSION['activity_type'] = $activity_type;
            $_SESSION['lead_unit'] = $lead_unit;
            $_SESSION['completion_date'] = $completion_date;


            // echo '<script type="text/javascript">';
            // echo 'alert("' . $_SESSION['activity_code'] . '");';
            // echo '</script>';
    
        }
    }




include 'includes/header.php'; 


?>


<body>

<div class="container">
    <div class="row">

    <div class="col-md-2 menu2"> </div>  

        <div class="col-md-2 menu1">

            <div class="title">
                <a href="home"> WACSI Alumni Database </a>
            </div>

            <nav>
                <ul>
                    <li> <a href="home"> Dashboard </a> </li>
                    <li> <a href="users"> <i class="fa-solid fa-users"></i> Users </a> </li>
                    <li> <a href="activities"> <i class="fa-solid fa-chart-line"></i> Activities </a> </li>
                    <li class="active"> <a href="new-activity"> <i class="fa-solid fa-calendar-plus"></i> Add New Activity </a> </li>
                    <li> <a href="reports"> <i class="fa-solid fa-chart-line"></i> Reports </a> </li>
                </ul>
            </nav>

        </div>      


<div class="col-md-10 cont">

    <section id="top-bar" class="bdbt">
        <i class="fa-sharp fa-solid fa-magnifying-glass"></i> &nbsp &nbsp
        <span> | </span> &nbsp &nbsp
        <span> <b> <?php echo $session_user; ?> </b> </span> &nbsp
        <i class="fa-sharp fa-solid fa-circle-user"></i>
    </section>

    <section id="pg-title" class="bdbt">
        <p> Add Activity </p>
    </section>


    <section id="new-activity">

            <?php
                $activity_code = $_POST['activity_code']??'';
                $activity = $_POST['activity']??'';
                $activity_type = $_POST['activity_type']??'';
                $lead_unit = $_POST['lead_unit']??'';
                $completion_date = $_POST['completion_date']??'';
            ?>

            <form method="post" action="new-participants.php">           
                <input class="input100" id="input300" type="text" name="activity" value="<?php echo $activity; ?>" placeholder="Activity Name">
                <input class="input100" id="input300" type="text" name="activity_code" value="<?php echo $activity_code; ?>" placeholder="Activity Code">
                <input class="input100" id="input301" type="text" name="activity_type" value="<?php echo $activity_type; ?>" placeholder="Activity Type">
                <input class="input100" id="input651" type="text" name="lead_unit" value="<?php echo $lead_unit; ?>" placeholder="Lead Unit">
                <input class="input100" id="input301" type="Date" name="completion_date" value="<?php echo $completion_date; ?>" placeholder="Completion Date">
                <div class="clear"></div>
            
                <div class="save">
                    <div class="container-login100-form-btn m-b-50" id="btn" style="float: right; margin-right: 10px;">
                        <button type="submit" class="login100-form-btn" id="btn1" name="save_act" >
                            ADD PARTICIPANTS
                        </button>
                    </div>
                </div>
            </form>

          

    </section>


    <!-- <section id="trainings" class="bdbt">
   
        <table id="train-tb">
            <tr>
                <th class="grn"> First Name </th>
                <th> Last Name </th>
                <th class="grn"> Organisation </th>
                <th> Country </th>
                <th class="grn"> Email Address </th>
                <th> Phone Number </th>
                <th class="grn"> Gender </th>
            </tr>
            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>
            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>
            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>

            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>

            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>

            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>

            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>

            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>

            <tr>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
                <td>  </td>
                <td class="grn">  </td>
            </tr>
        </table>

    </section> -->
  

</div> 
<!-- cont -->


</div>
<!-- row -->

</div>
<!-- container -->

</body>
</html>



<script type="text/javascript">


</script>            