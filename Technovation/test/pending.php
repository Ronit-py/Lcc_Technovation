<?php
    $dbServername = "34.93.23.26";
    $dbUser = "test";
    $dbPassword = "test@123";
    $dbName = "technovation";

    $connection = mysqli_connect($dbServername, $dbUser ,$dbPassword, $dbName)
    OR die('Could not connect to mysql' . mysqli_connect_error());

    echo "<script>console.log('Connected to database')</script>";

    if(isset($_POST['accept'])){

      $request_id = $_POST['accept'];

      $accept_query = "UPDATE requests SET status = 'ACCEPTED' WHERE request_id = '$request_id';";

      $result = mysqli_query($connection, $accept_query);

      if($result) {
        echo "<script>console.log('Accepted')</script>";
      }
      else{
        echo "<script>console.log('Failure')</script>";
      }
    }

    if(isset($_POST['reject'])){

      $request_id = $_POST['reject'];

      $accept_query = "UPDATE requests SET status = 'REJECTED' WHERE request_id = '$request_id';";

      $result = mysqli_query($connection, $accept_query);
      echo $result;

      if($result) {
        echo "<script>console.log('Rejected')</script>";
      }
      else{
        echo "<script>console.log('Failure')</script>";
      }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Accepted Requests</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
</body>

</html>


<?php
    $query = "SELECT * FROM requests inner join clients on requests.client_id = clients.client_id where status = 'PENDING';";
    $result = mysqli_query($connection, $query);

    $resultCheck = mysqli_num_rows($result);

    if($resultCheck > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          $date = date('D d M',strtotime($row['date']));
          $check_in = date('h:m a',strtotime($row['check_in']));
          $check_out = date('h:m a',strtotime($row['check_out']));
          $client_name = $row['name'];
          $client_mail = $row['mail_id'];
          $client_phone = $row['phone'];
          $purpose = $row['purpose'];

            echo '<div class="row">
             <div class="col-sm-4">
              <div class="card bg-light mb-3">
              <div class="card-header">' . $date . '</div>  
              <div class="card-body">
                <h5 class="card-title">'. $check_in .' to '.$check_out.'</h5>
                <p class="card-text">'. $client_name .'</p>
                <form method = "post" onsubmit="">
                <button type=submit name="accept" class="btn btn-success mr-2" value ='.$row["request_id"].'>Accept</button>
                <button type=submit name="reject" class="btn btn-danger ml-2" value = '.$row["request_id"].'>Reject</button>
              </div>
            </div>
          </div>
          <div class="col-sm-8">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">'. $client_name.'</h5>
                <p class="card-text">'. $purpose .'</p>
                <p class="card-text"> Phone:'.$client_phone.'</p>
              </div>
            </div>
          </div>
        </div>';
    }
  }
?>
