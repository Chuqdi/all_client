<?php
 
 include('connection.php');

 session_start();
 $session_user = $_SESSION['username'];
 include 'includes/header.php'; 
 $resulta = mysqli_query($conn, "SELECT DISTINCT activity_type FROM participants where activity_type != '' order by activity_type asc ");
 $resultb = mysqli_query($conn, "SELECT DISTINCT lead_unit FROM participants where lead_unit != '' order by lead_unit asc");
 $resultc = mysqli_query($conn, "SELECT DISTINCT organisation_type FROM participants where organisation_type != '' order by organisation_type asc");
 $resultd = mysqli_query($conn, "SELECT DISTINCT country FROM participants where country != '' order by country asc");

?>

<body>

<div class="container">
   <div class="row">

         <div class="col-md-2 menu1">

             <div class="title">
                 <a href="home"> WACSI Alumni Database </a>
             </div>

             <nav>
                 <ul>
                     <li> <a href="home"> Dashboard </a> </li>
                     <li> <a href="users"> <i class="fa-solid fa-users"></i> Users </a> </li>
                     <li class="active"> <a href="activities"> <i class="fa-solid fa-chart-line"></i> Activities </a> </li>
                     <li> <a href="new-activity"> <i class="fa-solid fa-calendar-plus"></i> Add New Activity </a> </li>
                     <li> <a href="reports"> <i class="fa-solid fa-chart-line"></i> Reports </a> </li>
                 </ul>
             </nav>

         </div>    



<div class="col-md-10 cont">

<section id="top-bar" class="bdbt">
 <i class="fa-sharp fa-solid fa-magnifying-glass"></i> &nbsp &nbsp
 <span> | </span> &nbsp &nbsp
 <span> Administrator </span> &nbsp
 <i class="fa-sharp fa-solid fa-circle-user"></i>
</section>


<section id="pg-title" class="bdbt">
         <p> Activities </p>
     </section>

     <section id="date-filter" class="bdbt">
         <div class="container">
             <div class="row">
                 <div class="col-md-4 dtft">
                     DATE FILTER
                 </div>
                 <div class="col-md-4 dtft">
                     FROM <i class="fa-solid fa-calendar-days"></i> <input type="date" name="froms" id="froms"/>
                 </div>
                 <div class="col-md-4 dtft">
                     TO <i class="fa-solid fa-calendar-days"></i> <input type="date" name="tos" id="tos"/>
                 </div>
             </div>
         </div>
     </section>



     <section id="filter" class="bdbt">

<div class="row flex">

<form class="form-check-inline"> 
<span> <label style="font-size: smaller;">Activity Type:</label> 
 <select class="form-control" id="activity" >
 <option disabled selected  hidden value="">Choose </option>
 <?php
    while($rowa =  mysqli_fetch_array($resulta)){
     echo "<option style=\"text-transform : uppercase \" value=\"$rowa[0]\">$rowa[0]</option>";
     } 
   ?>
 </select> 
</span> &nbsp; &nbsp; &nbsp;

<span> <label style="font-size: smaller;">Lead Unit: </label>
 <select  class="form-control" id="leadunit">
 <option disabled selected  hidden value="">Choose </option>
 <?php
    while($rowb =  mysqli_fetch_array($resultb)){
     echo "<option style=\"text-transform : uppercase \" value=\"$rowb[0]\">$rowb[0]</option>";
     } 
   ?>
   </select> 
</span> &nbsp; &nbsp; &nbsp;


<span> <label style="font-size: smaller;"> Organisation Type: </label>
         <select  class="form-control" id="org"> <option disabled selected  hidden value="">Choose </option>
         <?php
            while($rowc =  mysqli_fetch_array($resultc)){
             echo "<option style=\"text-transform : uppercase \" value=\"$rowc[0]\">$rowc[0]</option>";
             } 
           ?>
             </select> 
     </span> &nbsp; &nbsp; &nbsp;

     <span> <label style="font-size: smaller;">Gender: </label>
         <select  class="form-control" id="gender">
         <option disabled selected  hidden value="">Choose </option>
             <option value="Male"> Male </option>
             <option value="Female"> Female </option>
         </select> 
     </span> &nbsp; &nbsp; &nbsp;



     <span> <label style="font-size: smaller;">Country: </label>
         <select  class="form-control" id="country">
         <option disabled selected  hidden value="">Choose </option>
         <?php
            while($rowd =  mysqli_fetch_array($resultd)){
             echo "<option style=\"text-transform : uppercase \" value=\"$rowd[0]\">$rowd[0]</option>";
             } 
           ?>
            </select> 
     </span> &nbsp; &nbsp; &nbsp;


     </form>
     </div>
 </section>



 <div class="col-xs-12 app-loader" style="display: none; position: fixed; top: 0; bottom: 0; width: 100%; height: 100%;
                      left: 0; text-align: center; z-index: 3; padding-top: 15em;">
             <div style="background-color: rgba(0,0,0,0.7); display: block; width: 50%; margin-left: 25%; margin-right: 25%">
                 <i class="fa fa-spinner fa-pulse" style="font-size: 2.5em; color: #ffffff; margin: 25px;"></i>
                 <div class="app-loader-message" style="color: #ffffff;"></div>
             </div>
         </div>



<section id="trainings" class="bdbt">

         <?php
         
             $page = isset($_GET['page']) ? $_GET['page'] : 1;
             $totalRecords =  mysqli_query($conn, "SELECT COUNT(*) as counts, activity FROM participants where activity != '' AND activity != 'ACTIVITY' group by activity" ) ;
             $rowt = mysqli_num_rows($totalRecords);   
             $totalPages = ceil($rowt  / 5);
             // $sql = "SELECT * FROM participants group by activity LIMIT 10 OFFSET " . ($page - 1) * 10 ;
         
             $sql = "SELECT COUNT(*) as counts, activity, activity_type, completion_date, activity_type, lead_unit, completion_year  FROM participants where activity != ''  AND activity != 'ACTIVITY' AND activity_type = 'Training' group by activity LIMIT 5 OFFSET " . ($page - 1) * 5 ;
             $results =  mysqli_query($conn, $sql);
         ?>


      
<table id="myTable"> 

<?php
     if ( mysqli_num_rows($results) > 0) {
  
         echo "<div class='accordion accordion-flush' id='accordion'>";
         echo "<div class='accordion-item'>";
         echo "<h2 class='accordion-header' id='heading'>";
         $index = 1;
         while($rowxx = mysqli_fetch_assoc($results)) {
            
             echo "<div class='card' style='border-color: #ffffff'>";
             echo "<button class='btn accordion-button' data-toggle='collapse' data-target='#collapse" . $index . "' aria-expanded='true' aria-controls='collapse" . $index . "'>";
             echo "
             <div class='activity_summary' id=''>
             <div class='activity_title'>
                 <span class='plus plus3' id='plus2'> <i class='fas fa-angle-down'></i> </span> 
                 <span class='minus minus3' id='minus2'> <i class='fas fa-angle-right'></i> </span> "
                    .$rowxx['activity'] . " <div style='float:right'> " .$rowxx['completion_year'] ."  </div>   
              </div>
             
             <div class='activity_details'>
                 <span> <label style='font-size: 75%; text-transform: capitalize'> COMPLETION DATE: </label> <b>" .$rowxx['completion_date'] . " </b> </span>
                 <span> <label style='font-size: 75%;'>ACTIVITY TYPE: </label> <b> " .$rowxx['activity_type'] . " </b> </span>
                 <span> <label style='font-size: 75%;'>LEAD UNIT:</label>  <b> " .$rowxx['lead_unit'] . " </b> </span>
                 <span> <label style='font-size: 75%;'>NO. OF PARTICIPANTS:</label> <b> " .$rowxx['counts'] . " </b> </span>
             </div>
         
         </div> ";
            
             echo '</button>';

          
             
             echo '<div id="collapse' . $index . '" class="collapse" aria-labelledby="heading' . $index . '" data-parent="#accordion">';
         
             echo '<div class="accordion-body">';

             echo '<div class="col-12">';

             $sqltab = "SELECT * FROM participants where activity = '".$rowxx["activity"]."'";
             $resql = mysqli_query($conn, $sqltab);
      
             echo '<table id="train-tb">
             <tr>
               <th class="grn"> First Name </th>
               <th> Last Name </th>
               <th class="grn"> Organisation </th>
               <th> Country </th>
               <th class="grn"> Email Address </th>
               <th> Phone Number </th>
               <th class="grn"> Gender </th>
           </tr>';

             while($rowql = mysqli_fetch_assoc($resql)) {
             
                 echo "<tr> <td>". $rowql["first_name"] . "</td> 
                 <td>" . $rowql["surname"] . "</td> 
                 <td>" . $rowql["organisation"] . "</td>
                 <td>" . $rowql["country"] . "</td>
                 <td>" . $rowql["email_address"] . "</td>
                 <td>" . $rowql["phone_number"] . "</td>
                 <td>" . $rowql["gender"] . "</td> </tr>" ;
             
             
             }
             
           
             $index++;
             echo "</table>";


             echo "</div>";

         echo "</div>";
         echo "</div>";

        

        
         }

         echo '</h2>';
        

         echo '</div>'; 
            
         echo '</div>';
   
         echo '</div>';

        
        
    
    } 
    else {
     echo "<tr><td colspan='3'>No data available</td></tr>";
 }
    ?>


</table>







</section>




<div style=" text-align:center" id="paginate"> 
<ul class="pagination">
<?php
if ($page > 1): ?>
 <li class="page-item">
   <a class="page-link" href="?page=<?php echo ($page - 1); ?>">&laquo;</a>
 </li>
<?php endif; ?>


<?php for ($i = $page - 5; $i <= $page + 5; $i++): ?>
 <?php if ($i > 0 && $i <= $totalPages): ?>
   <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
     <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
   </li>
 <?php endif; ?>
<?php endfor; ?>

<?php if ($page < $totalPages): ?>
 <li class="page-item">
   <a class="page-link" href="?page=<?php echo ($page + 1); ?>">&raquo;</a>
 </li>
<?php endif; ?>

<?php if ($totalPages > 1): ?>
 <li class="page-item">
   <a class="page-link" href="?page=<?php echo $totalPages; ?>"><?php echo $totalPages; ?></a>
 </li>
<?php endif; ?>
</ul>
</div>



</div>    






<script>
$(document).on("change", "#activity", function(event)
 { 
     
     var activity = $('#activity').val();
     
     console.log(activity);
     $('.app-loader').css("display", "block");
     $('.app-loader-message').html("<div>Fetching Result...</div>");

     // $('#trainings').html('');
     $('#trainings').empty();


     var x=$.ajax({
         type: "POST", 
         url: 'getactivities',
         contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
         data: "activity=" + encodeURIComponent(activity),
         dataType: "text",
         cache: false
     });

     x.done(function(serverResponse)
     {
         var servervalue=serverResponse.trim();
        
        //  $('#paginate').hide(500);
         $('#trainings').empty();
         $('#trainings').html('');
         $('#trainings').append(servervalue);
         $('.app-loader').css("display", "none");


         $('#org').prop('selectedIndex', 0);
         $('#leadunit').prop('selectedIndex', 0); 
         $('#gender').prop('selectedIndex', 0);
         $('#country').prop('selectedIndex', 0);
          
     });

     x.fail(function(){

     });

     x.always(function(){

         
     });

 });




 $(document).on("change", "#leadunit", function(event)
 { 
     
     var leadunit = $('#leadunit').val();
     
     // console.log(activity);
     $('.app-loader').css("display", "block");
     $('.app-loader-message').html("<div>Fetching Result...</div>");

     // $('#trainings').html('');
     $('#trainings').empty();


     var x=$.ajax({
         type: "POST", 
         url: 'getleadunit',
         contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
         data: "leadunit=" + encodeURIComponent(leadunit),
         dataType: "text",
         cache: false
     });

     x.done(function(serverResponse)
     {
         var servervalue=serverResponse.trim();
        
        //  $('#paginate').hide(500);
         $('#trainings').empty();
         $('#trainings').html('');
         $('#trainings').append(servervalue);
         $('.app-loader').css("display", "none");


         $('#org').prop('selectedIndex', 0); 
         $('#activity').prop('selectedIndex', 0);
         $('#gender').prop('selectedIndex', 0);
         $('#country').prop('selectedIndex', 0);
          
     });

     x.fail(function(){

     });

     x.always(function(){

         
     });

 });





 $(document).on("change", "#org", function(event)
 { 
     
     var org = $('#org').val();
     
     // console.log(activity);
     $('.app-loader').css("display", "block");
     $('.app-loader-message').html("<div>Fetching Result...</div>");

     // $('#trainings').html('');
     $('#trainings').empty();


     var x=$.ajax({
         type: "POST", 
         url: 'getorganization',
         contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
         data: "org=" + encodeURIComponent(org),
         dataType: "text",
         cache: false
     });

     x.done(function(serverResponse)
     {
         var servervalue=serverResponse.trim();
        
        //  $('#paginate').hide(500);
         $('#trainings').empty();
         $('#trainings').html('');
         $('#trainings').append(servervalue);
         $('.app-loader').css("display", "none");
 

         $('#leadunit').prop('selectedIndex', 0);
         $('#activity').prop('selectedIndex', 0);
         $('#gender').prop('selectedIndex', 0);
         $('#country').prop('selectedIndex', 0);
          
     });

     x.fail(function(){

     });

     x.always(function(){

         
     });

 });










 $(document).on("change", "#country", function(event)
 { 
     
     var country = $('#country').val();
     
     console.log(country);
     $('.app-loader').css("display", "block");
     $('.app-loader-message').html("<div>Fetching Result...</div>");

     // $('#trainings').html('');
     $('#trainings').empty();


     var x=$.ajax({
         type: "POST", 
         url: 'getcountry',
         contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
         data: "country=" + encodeURIComponent(country),
         dataType: "text",
         cache: false
     });

     x.done(function(serverResponse)
     {
         var servervalue=serverResponse.trim();
        
        //  $('#paginate').hide(500);
         $('#trainings').empty();
         $('#trainings').html('');
         $('#trainings').append(servervalue);
         $('.app-loader').css("display", "none");


         $('#org').prop('selectedIndex', 0);
         $('#leadunit').prop('selectedIndex', 0);
         $('#activity').prop('selectedIndex', 0);
         $('#gender').prop('selectedIndex', 0);
         // $('#country').prop('selectedIndex', 0);
          
     });

     x.fail(function(){

     });

     x.always(function(){

         
     });

 });









 $(document).on("change", "#gender", function(event)
 { 
     
     var gender = $('#gender').val();
     
     // console.log(gender);
     $('.app-loader').css("display", "block");
     $('.app-loader-message').html("<div>Fetching Result...</div>");

     // $('#trainings').html('');
     $('#trainings').empty();


     var x=$.ajax({
         type: "POST", 
         url: 'getgender',
         contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
         data: "gender=" + encodeURIComponent(gender),
         dataType: "text",
         cache: false
     });

     x.done(function(serverResponse)
     {
         var servervalue=serverResponse.trim();
        
        //  $('#paginate').hide(500);
         $('#trainings').empty();
         $('#trainings').html('');
         $('#trainings').append(servervalue);
         $('.app-loader').css("display", "none");


         $('#org').prop('selectedIndex', 0);
         $('#leadunit').prop('selectedIndex', 0);
         $('#activity').prop('selectedIndex', 0);
         
         $('#country').prop('selectedIndex', 0);
          
     });

     x.fail(function(){

     });

     x.always(function(){

         
     });

 });




 $(document).on("change", "#tos", function(event)
 { 
     var from = $('#froms').val();
     var tos = $('#tos').val();

     if (from === ""){
         alert("start date reguired");
     }
     else{
         var partsfrom = from.split('/');
         var outputDatefrom = partsfrom[2] + '/' + partsfrom[1] + '/' + partsfrom[0];

         var partstos = tos.split('/');
         var outputDatetos = partstos[2] + '/' + partstos[1] + '/' + partstos[0];

         // console.log(outputDatetos, outputDatefrom);

         var x=$.ajax({
         type: "POST", 
         url: 'getdates',
         contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
         data: "from=" + encodeURIComponent(from) + "&tos=" + encodeURIComponent(tos),
         dataType: "text",
         cache: false
     });

     x.done(function(serverResponse)
     {
         var servervalue=serverResponse.trim();
        
        //  $('#paginate').hide(500);
         $('#trainings').empty();
         $('#trainings').html('');
         $('#trainings').append(servervalue);
         $('.app-loader').css("display", "none");


         $('#org').prop('selectedIndex', 0);
         $('#leadunit').prop('selectedIndex', 0);
         $('#activity').prop('selectedIndex', 0);
         $('#gender').prop('selectedIndex', 0);
         $('#country').prop('selectedIndex', 0);
          
     });

     x.fail(function(){

     });

     x.always(function(){

         
     });








     }

 });

  

 
</script>


</body>
</html>



