  
<?php
echo "Connecting to database". "<br>";
$dbServername = "34.93.23.26";
$dbUser = "test";
$dbPassword = "test@123";
$dbName = "technovation";

$connection = mysqli_connect($dbServername, $dbUser ,$dbPassword, $dbName)
OR die('Could not connect to mysql' . mysqli_connect_error());

echo "<script>console.log('Connected to database')</script>";

$query = "SELECT * FROM requests inner join client on requests.client_id = client.client_id;";
$result = mysqli_query($connection, $query);

$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		echo "<hr>";
		echo "name of the club: " . $row['name'] . "<br>";
		echo "purpose: " . $row['purpose'] . "<br>";
		echo "<hr>";
	}
}

?>