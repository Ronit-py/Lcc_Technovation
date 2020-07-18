<?php
    echo "Connecting to database". "<br>";
    $dbServername = "34.93.23.26";
    $dbUser = "test";
    $dbPassword = "test@123";
    $dbName = "technovation";

    $connection = mysqli_connect($dbServername, $dbUser ,$dbPassword, $dbName)
    OR die('Could not connect to mysql' . mysqli_connect_error());

    echo "<script>console.log('Connected to database')</script>";

?>
<!DOCTYPE html>
<!-- saved from url=(0030)http://www.sjceplacements.org/ -->
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <title>SJCE Seminar hall booking</title>

    <link rel="shortcut icon" type="image/x-icon" href="http://www.sjceplacements.org/SJCE.ico">

    <!-- Bootstrap Core CSS -->
    <link href="./SJCE Placements - Login_Register_files/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="./SJCE Placements - Login_Register_files/base_styles.css" rel="stylesheet">


    <!-- Custom page CSS -->
    <link href="./SJCE Placements - Login_Register_files/index.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .form-control#purpose {
            height: 100px;

        }

        @media only screen and (max-width: 768px) {
            .white-font {
                text-align: center;

            }
        }
    </style>
</head>

<body id="page-top" class="index">
    <div id="mainPanel">
        <header style="background-color: dimgrey;">
            <div class="head-content">
                <h4 class="white-font" style="color:aliceblue;">JSS Mahavidyapeetha</h4>
                <h3 class="white-font" style="color:aliceblue;">JSS Science &amp; Technology University</h3>
                <h2 class="white-font" style="color: aliceblue;">Sri Jayachamarajendra College of Engineering</h2>

                <hr style="width:40%;" style="color:white;">
                <h1 class="white-font" style="color: aliceblue;"><b>
                        SJCE Seminar Hall Booking Portal


                    </b></h1>
            </div>
        </header>
        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-custom">
            <div class="container">
                <div class="navbar-header">
                    <div class="myHeader">
                        <img width="50" height="50" src="./SJCE Placements - Login_Register_files/SJCE_Final.png">
                        <a class="navbar-brand" style="cursor:normal;padding-left:00px;">SJCE Placements</a>
                    </div>
                </div>

                <div class="collapse navbar-collapse" id="navbar-cllps">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-active">
                            <a style="width:auto;cursor:normal;">Seminar hall booking</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div id="snackbar">This is my snackbar</div>
        <div id="loginPanel">
            <div class="container">
                <div class="card">
                    <?php

                        $query = "SELECT * FROM requests inner join clients on requests.client_id = clients.client_id where status = 'PENDING';";
                        $result = mysqli_query($connection, $query);

                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='card-body'>";
                                echo "name of the club: " . $row['name'] . "<br>";
                                echo "purpose: " . $row['purpose'] . "<br>";
                                echo "</div>";
                            }
                        }
                    ?>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="text-center">
        <div class="row">
            <div class="col-md-12">
                <p style="color: cadetblue;">© SJCE - 2020</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="http://www.sjceplacements.org/#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>
    <!-- jQuery -->
    <script src="./SJCE Placements - Login_Register_files/jquery.min.js.download"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./SJCE Placements - Login_Register_files/bootstrap.min.js.download"></script>

    <script src="./SJCE Placements - Login_Register_files/common.js.download"></script>
    <script src="./SJCE Placements - Login_Register_files/validateForm.js.download"></script>

    </div>



</body>