<?php  

// Establish database connection
include('connection.php');

session_start();
$activity_code = $_SESSION['activity_code'];
//$activity_code = 'fgfsd';

            $output = '';  
            $sql = "SELECT * FROM participants WHERE activity_code = '$activity_code' ORDER BY id ASC";  
            $result = mysqli_query($conn, $sql);  

            $output .= '  
                <div class="table-responsive">  
                    <table class="table table-bordered">  
                            <tr>  
                                <th> ID </th>
                                <th class="grn"> First Name </th>
                                <th> Last Name </th>
                                <th class="grn"> Organisation </th>
                                <th> Organisation Type </th>
                                <th class="grn"> Country </th>
                                <th> Email Address </th>
                                <th class="grn"> Phone Number </th> 
                                <th> Gender </th>
                                <th> </th>
                            </tr>';  

            if(mysqli_num_rows($result) > 0)  
            {  
                while($row = mysqli_fetch_array($result))  
                {  
                    $output .= '  
                            <tr>  
                                <td>'.$row["id"].'</td>  
                                <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td>  
                                <td class="surname" data-id2="'.$row["id"].'" contenteditable>'.$row["surname"].'</td>  
                                <td class="organisation" data-id3="'.$row["id"].'" contenteditable>'.$row["organisation"].'</td>  
                                <td class="organisation_type" data-id4="'.$row["id"].'" contenteditable>'.$row["organisation_type"].'</td>  
                                <td class="country" data-id5="'.$row["id"].'" contenteditable>'.$row["country"].'</td>  
                                <td class="email_address" data-id6="'.$row["id"].'" contenteditable>'.$row["email_address"].'</td>  
                                <td class="phone_number" data-id7="'.$row["id"].'" contenteditable>'.$row["phone_number"].'</td>  
                                <td class="gender" data-id8="'.$row["id"].'" contenteditable>'.$row["gender"].'</td>  
                                <td><button type="button" name="delete_btn" data-id9="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                            </tr>  
                    ';  
                }  
                $output .= '  
                    <tr>  
                            <td></td>  
                            <td id="first_name" contenteditable></td>  
                            <td id="surname" contenteditable></td>  
                            <td id="organisation" contenteditable></td>  
                            <td id="organisation_type" contenteditable></td>  
                            <td id="country" contenteditable></td>  
                            <td id="email_address" contenteditable></td>  
                            <td id="phone_number" contenteditable></td>  
                            <td id="gender" contenteditable></td>  
                            <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
                    </tr>  
                ';  
            }  
            else  
            {  
                $output .= '<tr>  
                                    <td colspan="4">Data not Found</td>  
                                </tr>';  
            }  
            $output .= '</table>  
                </div>';  
            echo $output;  


 ?>









<?php  

// Establish database connection
// include('connection.php');

// session_start();
// $activity_code = $_SESSION['activity_code'];

//             $output = '';  
//             $sql = "SELECT * FROM participants ORDER BY id ASC";  
//             $result = mysqli_query($conn, $sql);  
//             $output .= '  
//                 <div class="table-responsive">  
//                     <table class="table table-bordered">  
//                             <tr>  
//                                 <th> ID </th>
//                                 <th class="grn"> First Name </th>
//                                 <th> Last Name </th>
//                                 <th class="grn"> Organisation </th>
//                                 <th> Organisation Type </th>
//                                 <th class="grn"> Country </th>
//                                 <th> Email Address </th>
//                                 <th class="grn"> Phone Number </th> 
//                                 <th> Gender </th>
//                                 <th> </th>
//                             </tr>';  

//             if(mysqli_num_rows($result) > 0)  
//             {  
//                 while($row = mysqli_fetch_array($result))  
//                 {  
//                     $output .= '  
//                             <tr>  
//                                 <td>'.$row["id"].'</td>  
//                                 <td class="first_name" data-id1="'.$row["id"].'" contenteditable>'.$row["first_name"].'</td>  
//                                 <td class="surname" data-id2="'.$row["id"].'" contenteditable>'.$row["surname"].'</td>  
//                                 <td class="organisation" data-id3="'.$row["id"].'" contenteditable>'.$row["organisation"].'</td>  
//                                 <td class="organisation_type" data-id4="'.$row["id"].'" contenteditable>'.$row["organisation_type"].'</td>  
//                                 <td class="country" data-id5="'.$row["id"].'" contenteditable>'.$row["country"].'</td>  
//                                 <td class="email_address" data-id6="'.$row["id"].'" contenteditable>'.$row["email_address"].'</td>  
//                                 <td class="phone_number" data-id7="'.$row["id"].'" contenteditable>'.$row["phone_number"].'</td>  
//                                 <td class="gender" data-id8="'.$row["id"].'" contenteditable>'.$row["gender"].'</td>  
//                                 <td><button type="button" name="delete_btn" data-id9="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
//                             </tr>  
//                     ';  
//                 }  
//                 $output .= '  
//                     <tr>  
//                             <td></td>  
//                             <td id="first_name" contenteditable></td>  
//                             <td id="surname" contenteditable></td>  
//                             <td id="organisation" contenteditable></td>  
//                             <td id="organisation_type" contenteditable></td>  
//                             <td id="country" contenteditable></td>  
//                             <td id="email_address" contenteditable></td>  
//                             <td id="phone_number" contenteditable></td>  
//                             <td id="gender" contenteditable></td>  
//                             <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
//                     </tr>  
//                 ';  
//             }  
//             else  
//             {  
//                 $output .= '<tr>  
//                                     <td colspan="4">Data not Found</td>  
//                                 </tr>';  
//             }  
//             $output .= '</table>  
//                 </div>';  
//             echo $output;  


 ?>