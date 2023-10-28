<?php 

    include('connection.php');    
    include('errors.php'); 


    session_start();
    $session_user = $_SESSION['username'];

    if (isset($_POST['complete_add'])){
          session_stop();
          header('location: activities.php');
    }

    if (isset($_POST['save_act'])){

    
        //Retrieve form data
        $activity_code = mysqli_real_escape_string($conn, $_POST['activity_code']);
        $activity = mysqli_real_escape_string($conn, $_POST['activity']);
        $activity_type = mysqli_real_escape_string($conn, $_POST['activity_type']);
        $lead_unit = mysqli_real_escape_string($conn, $_POST['lead_unit']);
        $completion_date = mysqli_real_escape_string($conn, $_POST['completion_date']);
      
        //Perform data validation and sanitization (you can add more validation logic)
        if(empty($activity_code)) {array_push($errors, $_POST['activity_code']);}
        if(empty($activity)) {array_push($errors, $_POST['activity']);}
        if(empty($activity_type)) {array_push($errors, $_POST['activity_type']);}
        if(empty($lead_unit)) {array_push($errors, $_POST['lead_unit']);}
        if(empty($completion_date)) {array_push($errors, $_POST['completion_date']);}
      
      
        if (count($errors) == 0){
    
        $completion_date = date("Y-m-d");
      
            //Construct and execute the SQL query
            $sql = "INSERT INTO participants (completion_date, activity_code, activity, activity_type, lead_unit) VALUES ('$completion_date', '$activity_code', '$activity', '$activity_type', '$lead_unit')";
            mysqli_query($conn, $sql);
    
            
            $_SESSION['activity_code'] = $activity_code;
            $_SESSION['activity'] = $activity;
            $_SESSION['activity_type'] = $activity_type;
            $_SESSION['lead_unit'] = $lead_unit;
            $_SESSION['completion_date'] = $completion_date;
    
    
    
            echo '<script type="text/javascript">';
            echo 'alert("' . $_SESSION['activity_code'] . '");';
            echo '</script>';
    
    
            
    
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
        <p> Add Participants </p>
    </section>


    <section id="new-activity">

            <?php
               //  $activity_code = $_POST['activity_code']??'';
               //  $activity = $_POST['activity']??'';
               //  $activity_type = $_POST['activity_type']??'';
               //  $lead_unit = $_POST['lead_unit']??'';
               //  $completion_date = $_POST['completion_date']??'';

               $activity_code = $_SESSION['activity_code'];
               $activity = $_SESSION['activity'];
               $activity_type = $_SESSION['activity_type'];
               $lead_unit = $_SESSION['lead_unit'];
               $completion_date = $_SESSION['completion_date'];


            
            ?>

            <form method="post">           
                <input class="input100" id="input300" type="text" name="activity" value="<?php echo $activity; ?>" placeholder="Activity Name">
                <input class="input100" id="input300" type="text" name="activity_code" value="<?php echo $activity_code; ?>" placeholder="Activity Code">
                <input class="input100" id="input301" type="text" name="activity_type" value="<?php echo $activity_type; ?>" placeholder="Activity Type">
                <input class="input100" id="input651" type="text" name="lead_unit" value="<?php echo $lead_unit; ?>" placeholder="Lead Unit">
                <input class="input100" id="input301" type="Date" name="completion_date" value="<?php echo $completion_date; ?>" placeholder="Completion Date">
                <div class="clear"></div>
            
                <!-- <div class="save">
                    <div class="container-login100-form-btn m-b-50" id="btn" style="float: right; margin-right: 10px;">
                        <button type="submit" class="login100-form-btn" id="btn1" name="save_act" >
                            ADD PARTICIPANTS
                        </button>
                    </div>
                </div> -->
            </form>

          

    </section>


    <section id="trainings" class="bdbt">

        <div id="live_data"></div>

    </section>

     <section>
          <div class="">
               <form action="POST" method="new-participants.php">
                    <button type="submit" class="login100-form-btn" id="btn1" name="complete_add" >
                         COMPLETE
                    </button>
               </form>
          </div>
     </section>




    
  

</div> 
<!-- cont -->


</div>
<!-- row -->

</div>
<!-- container -->

</body>
</html>



<script>  
 $(document).ready(function(){  
      function fetch_data()  
      {  
           $.ajax({  
                url:"select.php",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                }  
           });  
      }  
      fetch_data();  
      $(document).on('click', '#btn_add', function(){  
          var completion_date = <?php echo json_encode($completion_date); ?>;
          var activity_code = <?php echo json_encode($activity_code); ?>;

          var activity = <?php echo json_encode($activity); ?>;
          var activity_type = <?php echo json_encode($activity_type); ?>;
          
           var first_name = $('#first_name').text();  
           var surname = $('#surname').text();  
           var organisation = $('#organisation').text();  
           var organisation_type = $('#organisation_type').text();  
           var country = $('#country').text();  
           var email_address = $('#email_address').text();  
           var phone_number = $('#phone_number').text();  
           var gender = $('#gender').text();  
           var lead_unit = <?php echo json_encode($lead_unit); ?>;
           if(completion_date == '')  
           {  
                alert("Enter Completion Date");  
                return false;  
           }
           if(activity_code == '')  
           {  
                alert("Enter Activity Code");  
                return false;  
           }
           if(activity == '')  
           {  
                alert("Enter Activity Name");  
                return false;  
           }
           if(activity_type == '')  
           {  
                alert("Enter Activity Type");  
                return false;  
           }
           if(first_name == '')  
           {  
                alert("Enter First Name");  
                return false;  
           }  
           if(surname == '')  
           {  
                alert("Enter Surname");  
                return false;  
           }  
           if(organisation == '')  
           {  
                alert("Enter Organisation");  
                return false;  
           } 
           if(organisation_type == '')  
           {  
                alert("Enter Organisation Type");  
                return false;  
           } 
           if(country == '')  
           {  
                alert("Enter Country");  
                return false;  
           } 
           if(email_address == '')  
           {  
                alert("Enter Email Address");  
                return false;  
           } 
           if(phone_number == '')  
           {  
                alert("Enter Phone Number");  
                return false;  
           } 
           if(gender == '')  
           {  
                alert("Enter Gender");  
                return false;  
           } 
           if(lead_unit == '')  
           {  
                alert("Enter Lead Unit");  
                return false;  
           } 
           $.ajax({  
                url:"insert.php",  
                method:"POST",  
                data:{completion_date:completion_date, activity_code:activity_code, activity:activity, activity_type:activity_type, first_name:first_name, surname:surname, organisation:organisation, organisation_type:organisation_type, country:country, email_address:email_address, phone_number:phone_number, gender:gender, lead_unit:lead_unit},  
                dataType:"text",  
                success:function(data)  
                {  
                     //alert(data);  
                     fetch_data();  
                }  
           })  
      });  
      function edit_data(id, text, column_name)  
      {  
           $.ajax({  
                url:"edit.php",  
                method:"POST",  
                data:{id:id, text:text, column_name:column_name},  
                dataType:"text",  
                success:function(data){  
                    //alert(data);  
                }  
           });  
      }  
     //  $(document).on('blur', '.activity_code', function(){  
     //       var id = $(this).data("id1");  
     //       var activity_code = $(this).text();  
     //       edit_data(id, activity_code, "activity_code");  
     //  }); 
      $(document).on('blur', '.first_name', function(){  
           var id = $(this).data("id1");  
           var first_name = $(this).text();  
           edit_data(id, first_name, "first_name");  
      });  
      $(document).on('blur', '.surname', function(){  
           var id = $(this).data("id2");  
           var surname = $(this).text();  
           edit_data(id,surname, "surname");  
      });  
      $(document).on('blur', '.organisation', function(){  
           var id = $(this).data("id3");  
           var organisation = $(this).text();  
           edit_data(id,organisation, "organisation");  
      }); 
      $(document).on('blur', '.organisation_type', function(){  
           var id = $(this).data("id4");  
           var organisation_type = $(this).text();  
           edit_data(id,organisation_type, "organisation_type");  
      }); 
      $(document).on('blur', '.country', function(){  
           var id = $(this).data("id5");  
           var country = $(this).text();  
           edit_data(id,country, "country");  
      }); 
      $(document).on('blur', '.email_address', function(){  
           var id = $(this).data("id6");  
           var email_address = $(this).text();  
           edit_data(id,email_address, "email_address");  
      }); 
      $(document).on('blur', '.phone_number', function(){  
           var id = $(this).data("id7");  
           var phone_number = $(this).text();  
           edit_data(id,phone_number, "phone_number");  
      }); 
      $(document).on('blur', '.gender', function(){  
           var id = $(this).data("id8");  
           var gender = $(this).text();  
           edit_data(id,gender, "gender");  
      }); 
      $(document).on('click', '.btn_delete', function(){  
           var id=$(this).data("id9");  
           if(confirm("Are you sure you want to delete this?"))  
           {  
                $.ajax({  
                     url:"delete.php",  
                     method:"POST",  
                     data:{id:id},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          fetch_data();  
                     }  
                });  
           }  
      });  
 });  
 </script>       