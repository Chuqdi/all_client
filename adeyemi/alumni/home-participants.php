<?php 

    include('connection.php');    
    include('errors.php'); 


    session_start();
    $session_user = $_SESSION['username'];


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
                        <li class="active"> <a href="home"> Dashboard </a> </li>
                        <li> <a href="users"> <i class="fa-solid fa-users"></i> Users </a> </li>
                        <li> <a href="activities"> <i class="fa-solid fa-chart-line"></i> Activities </a> </li>
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
        <p> Dashboard - Participants </p>
    </section>

    <section id="date-filter" class="bdbt">
        <div class="container">
            <div class="row">
                <div class="col-md-4 dtft">
                    DATE FILTER
                </div>
                <div class="col-md-4 dtft">
                    FROM <i class="fa-solid fa-calendar-days"></i> <input type="date" name="" />
                </div>
                <div class="col-md-4 dtft">
                    TO <i class="fa-solid fa-calendar-days"></i> <input type="date" name="" />
                </div>
            </div>
        </div>
    </section>

    <section id="summary-icons" class="bdbt">
        <div class="container">
            <div class="row">

                <div class="col-md-3 smic">
                <a href="home">
                    <p> Trainings </p>
                    <h1> 60 </h1>
                </a>
                </div>
                
                <div id="smic-active" class="col-md-3 smic">
                <a href="home-participants">
                    <p> Participants </p>
                    <h1> 1,036 </h1>
                    </a>
                </div>
                
                <div class="col-md-3 smic">
                <a href="home-organisations">
                    <p> Organisations </p>
                    <h1> 43 </h1>
                </a>
                </div>

                <div class="col-md-3 smic">
                <a href="home-countries">
                    <p> Countries </p>
                    <h1> 12 </h1>
                </a>
                </div>

            </div>
        </div>
    </section>


    <section id="trainings" class="bdbt">
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
                <td class="grn"> 001 </td>
                <td> 002 </td>
                <td class="grn"> Digital Security Best Practices </td>
                <td> Training </td>
                <td class="grn"> MEL </td>
                <td> 22-09-2022 </td>
                <td class="grn"> MEL </td>
            </tr>
            <tr>
                <td class="grn"> 001 </td>
                <td> 002 </td>
                <td class="grn"> Digital Security Best Practices </td>
                <td> Training </td>
                <td class="grn"> MEL </td>
                <td> 22-09-2022 </td>
                <td class="grn"> MEL </td>
            </tr>
            <tr>
                <td class="grn"> 001 </td>
                <td> 002 </td>
                <td class="grn"> Digital Security Best Practices </td>
                <td> Training </td>
                <td class="grn"> MEL </td>
                <td> 22-09-2022 </td>
                <td class="grn"> MEL </td>
            </tr>
        </table>
    </section>
  

</div> 
<!-- cont -->


</div>
<!-- row -->

</div>
<!-- container -->

</body>
</html>