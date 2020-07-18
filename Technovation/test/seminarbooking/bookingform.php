<?php

session_start();

$dbServername = "34.93.23.26";
$dbUser = "test";
$dbPassword = "test@123";
$dbName = "technovation";

$connection = mysqli_connect($dbServername, $dbUser ,$dbPassword, $dbName)
OR die('Could not connect to mysql' . mysqli_connect_error());

$mail = $_SESSION["authenticated_mail"];


if (isset($_POST["submit"])){

    if(!empty($_POST["email"]) and !empty($_POST["date"]) and !empty($_POST["checkin"]) and !empty($_POST["checkout"]) and !empty($_POST["purpose"])){

        $email=$_POST['email'];  
        $date=$_POST['date'];
        $checkin=$_POST['checkin'];
        $checkout=$_POST['checkout'];
        $purpose=$_POST['purpose'];
        $status = 'PENDING';
        $client_id = $_SESSION['client_id'];

        $formatted_date = date('Y-m-d',strtotime($date));
        $formatted_check_in = date('H:i:s',strtotime($checkin));
        $formatted_check_out = date('H:i:s',strtotime($checkout));

        $check_availability = "SELECT request_id from requests where '$formatted_date' = date and '$formatted_check_in' >= check_in and '$formatted_check_out' <= check_out;";


        $result = mysqli_query($connection ,$check_availability);

        if(mysqli_num_rows($result) == 0){
            $insert_request = "INSERT INTO requests ( purpose , date , check_in , check_out , client_id, status ) VALUES ('$purpose','$formatted_date','$formatted_check_in','$formatted_check_out','$client_id','$status');";

            $result = mysqli_query($connection ,$insert_request);

            if($result){
                header('location:success.html');
            }
            else{
                echo "<script>alert('Failure ');</script>";
            }

        }else{
            echo "<script>alert('Slot already occupied');</script>";

        }
        
        //echo "<script>setTimeout(\"location.href = 'bookingform.php';\",1000);</script>";

    }
  
else {
  $date = $_POST["date"];
  $checkin = $_POST["checkin"];
  $checkout = $_POST["checkout"];
  $purpose = $_POST["purpose"];
  echo "<script>alert('Please fill all the fields for a successful request.');</script>";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="requestform.css">
    <link rel="stylesheet" href="form.css">
        <!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="Time.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="jqueryui/jquery-ui.css">
<link  rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
<link rel="stylesheet" href="jqueryui/jquery-ui.theme.css" >

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body>




  <div class="container">
    <div class="form"style="background: grey;opacity:1;width:100%;margin:20px" >
    <form id="booking_form" method="post" action="">
      <h2>BOOK SEMINAR HALL</h2>
      <div class="alert alert-error"></div>
        <div class="row100">
            <div class="col">
                <div class="inputbox">
                    <input type="text" name="email" class="form-control-plaintext"  value="<?php echo htmlspecialchars($_SESSION["authenticated_mail"]);?>" >
                    <span class="text">E-Mail</span>
                    <span class="line"></span>
                </div>
            </div>
            <div class="col">
                <div class="inputbox">
                    <input type="text" name="date" class="form-control-plaintext" id="date" value="<?php echo (isset($date)) ? htmlspecialchars($date) : '';?>">

                    <span class="text">Select Date</span>
                    <span class="line"></span>
                </div>
            </div>


            <div class="col">
                <div class="inputbox">
                        <!-- Time Picker -->


                        <input type="text" name="checkin" class="checkin" id="time" value="<?php echo (isset($checkin)) ? htmlspecialchars($checkin) : '';?>">

                        <!-- End ofTime Picker-->
                    <span class="text">Check In</span>

                    <span class="line"></span>
                </div>
            </div>
            <div class="col">
                <div class="inputbox">
                        <!-- Time Picker -->


                        <input type="text" name="checkout" class="checkout" id="time" value="<?php echo (isset($checkout)) ? htmlspecialchars($checkout) : '';?>">

                        <!-- End ofTime Picker-->
                    <span class="text">Check Out</span>

                    <span class="line"></span>
                </div>
            </div>

        </div>
            <div class="row100">
                <div class="col">
                    <div class="inputbox textarea">
                        <textarea name="purpose" required="required" maxlength="100"><?php echo (isset($purpose)) ? htmlspecialchars($purpose) : '';?></textarea>
                        <span class="text">Purpose</span>
                        <span class="line"></span><br>
                    </div>
                </div>
            </div>

            <div class="row100">
                <div class="col">
                  <input type="submit" name="submit" value="submit">
                </div>
            </div>
    </form>
    </div>
    </div>
</body>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="jqueryui/jquery-ui.js" type="text/javascript"></script>
  <script>
             $("#date").datepicker({
              dateformat:"yyyy-mm-dd",
              changeMonth:true,
              changeYear:true
             });
             $("#date").datepicker('setDate','today');


</script>
<!-- check in Time picker-->
<script>

   const checkintime =document.querySelector('.checkin');

   M.Timepicker.init(checkintime,{
       showClearBtn:true,
       i18n:{
           clear:'remove',
           cancel:'No',
           done:'Yes'
       }
   });
</script>
<!-- End of check inTime picker-->
<!-- Check out Time picker-->
<script>

    const checkouttime =document.querySelector('.checkout');
    M.Timepicker.init(checkouttime,{
        showClearBtn:true,
        i18n:{
            clear:'remove',
            cancel:'No',
            done:'Yes'
        }
    });
 </script>
 <!-- End of Check out Time picker-->
<!-- Displaying Present Time-->
<script type="text/javascript">
 function clock(){
   var hours=document.getElementById('hour');
   var minutes=document.getElementById('minutes');
   var seconds=document.getElementById('seconds');

   var h= new Date().getHours();
   var m= new Date().getMinutes();
   var s= new Date().getSeconds();

   hours.innerHTML=h;
   minutes.innerHTML=m;
   seconds.innerHTML=s;
 }
 var interval = setInterval(clock,1000);
 </script>
 <!-- End  Displaying Present Time-->
</html>
