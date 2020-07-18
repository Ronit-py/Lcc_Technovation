<?php
session_start();

if (isset($_POST["submit"])){

    $dbServername = "34.93.23.26";
    $dbUser = "test";
    $dbPassword = "test@123";
    $dbName = "technovation";

    $connection = mysqli_connect($dbServername, $dbUser ,$dbPassword, $dbName)
    OR die('Could not connect to mysql' . mysqli_connect_error());

    echo "<script>console.log('Connected to database')</script>";

    $mail = $_POST['email'];

    $check_user = "SELECT client_id FROM clients WHERE mail_id = '$mail';";

    $result = mysqli_query($connection, $check_user);
    

    $resultCheck = mysqli_num_rows($result);

    if($resultCheck == 1) {

        echo "<script>console.log('User authenticated')</script>";
        $client_id = mysqli_fetch_assoc($result)['client_id'];
     
        $_SESSION['authenticated_mail'] = $mail;
        $_SESSION['db_connection'] = $connection;
        $_SESSION['client_id'] = $client_id; 
        header("location: bookingform.php");
        
        }
        else
        {
            echo "<script>alert('User not registered')</script>";
    
        }

}

?>
<!DOCTYPE html>
<!-- saved from url=(0030)http://www.sjceplacements.org/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


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
    <script>
    function changebooking(){
        document.getElementById("proceedbutton").style.color="white";
        document.getElementById("proceedbutton").style.backgroundColor="grey";
        document.getElementById("adminbutton").style.color="black";
        document.getElementById("adminbutton").style.backgroundColor="#f1f1f1";
    }


    function changeadmin(){
        document.getElementById("adminbutton").style.color="white";
        document.getElementById("adminbutton").style.backgroundColor="grey";
        document.getElementById("proceedbutton").style.color="black";
        document.getElementById("proceedbutton").style.backgroundColor="#f1f1f1";
    }

</script>
<style type="text/css">
   .form-control#purpose{
       height: 100px;

   }
    @media only screen and (max-width: 768px) {
        .white-font{
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
                <h3 class="white-font"style="color:aliceblue;">JSS Science &amp; Technology University</h3>
                <h2 class="white-font"style="color: aliceblue;">Sri Jayachamarajendra College of Engineering</h2>

                <hr style="width:40%;"style="color:white;">
                <h1 class="white-font"style="color: aliceblue;"><b>
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
            <div class="row loginBar container ">
                <div class="card"></div>
                    <div class="" style="background-color:#f1f1f1;">
                        <div class="containerx">
                            <ul class="tabs" style="list-style-type:none;">
                                <li class="tab-custom-item tabhead-active col-sm-6"id="proceedbutton"style="color:white;background-color:grey" onclick="changebooking();" data-tab="login">Book seminar hall</li>
                                <li class="tab-custom-item col-sm-6" data-tab="register" id="adminbutton" onclick="changeadmin();" >Admin login</li>
                            </ul>
                        </div>
                        <div id="login" class="containerx tab-content tab-active">
                        <form id="admin_form" method="post" action="index.php">
                        <input class="form-control" type="email" placeholder="EMAIL" name="email" id="useremail" required=""style="height:45px;"><br>
                        <button type="submit" class="loginbtn" name="submit">Proceed</button>
                        
                        </form>

                        </div>
                        <div id="register" class="containerx tab-content">
                            <form id="admin_form" method="post" action="login.php">
                                <input class="form-control" type="text" placeholder="Admin Name" name="admin" id="usn" required=""style="height:45px;"><br>
                                <input class="form-control" type="password" placeholder="Password" name="password" id="password" required=""style="height:45px;"><br>

                                <br>
                                <br>
                                <button type="submit" class="loginbtn">LOG IN</button>
                            </form>
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

 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

 <script src="js/jquery.js" type="text/javascript"></script>
 <script src="jqueryui/jquery-ui.js" type="text/javascript"></script>
 <script>

         $("#dateinput").datepicker();


 </script>
 <script>
  const timer =document.querySelector('.timepicker');
  M.Timepicker.init(timer,{
      showClearBtn:true,
      i18n:{
          clear:'remove',
          cancel:'No',
          done:'Yes'
      }
  });
</script>
</html>
