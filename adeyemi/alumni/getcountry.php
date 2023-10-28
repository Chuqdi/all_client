<?php

include "connection.php";
 
$country = $_POST['country'];
         
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$totalRecords =  mysqli_query($conn, "SELECT COUNT(*) as counts, activity FROM participants where activity != '' AND activity != 'ACTIVITY' AND country = '$country' group by activity" ) ;
$rowt = mysqli_num_rows($totalRecords);   
$totalPages = ceil($rowt  / 5);
// $sql = "SELECT * FROM participants group by activity LIMIT 10 OFFSET " . ($page - 1) * 10 ;

$sql = "SELECT COUNT(*) as counts, activity, activity_type, completion_date, activity_type, lead_unit, completion_year  FROM participants where activity != ''  AND activity != 'ACTIVITY' AND country = '$country' group by activity LIMIT 5 OFFSET " . ($page - 1) * 5 ;
$results =  mysqli_query($conn, $sql);
?>



<table> 

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

$sqltab = "SELECT * FROM participants where activity = '".$rowxx["activity"]."' AND country = '$country'";
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


 


 <div style=" text-align:center"> 
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
