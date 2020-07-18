<?php

session_start();
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'bookingsystem');

$email=$_POST['email'];   //admin is stored in name
$date=$_POST['date'];
$checkin=$_POST['checkin'];
$checkout=$_POST['checkout'];
$purpose=$_POST['purpose'];


$reg="INSERT INTO clientrequest( email , date , checkin , checkout , purpose ) VALUES ('$email','$date','$checkin','$checkout','$purpose')";
    mysqli_query($con ,$reg);
    echo "request sent successful";
    
   
?>