<?php


$servername = "localhost";
$username = "webapp17Us3r";
$password = "5DfJa2aduPkQtmEK";
$dbname = "playground17";
$email = "Josh.Holden18@bcp.org";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);


// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";
echo "Currently under development.";

$order = trim($_REQUEST['order']);
if( strlen($order) > 100 || strlen($order)< 1 ) {
	exit();
}
$order = $conn->real_escape_string($order);

?>