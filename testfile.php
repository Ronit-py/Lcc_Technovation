<?php
echo "Connecting to database". "<br>";
$dbServername = "localhost";
$dbUser = "root";
$dbPassword = "12345678";
$dbName = "test";

$connection = mysqli_connect($dbServername, $dbUser ,$dbPassword, $dbName)
OR die('Could not connect to mysql' . mysqli_connect_error());

echo "Connected to database". "<br>";

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
