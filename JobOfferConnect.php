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

$email = "Josh.Holden18@bcp.org";
$deliverytime = trim($_REQUEST['deliverymonth'].$_REQUEST['deliveryday'].$_REQUEST['deliveryhour'].$_REQUEST['deliveryminute'].$_REQUEST['ampm']);
if( strlen($deliverytime) > 100 || strlen($deliverytime)< 1 ) {
	exit();
}


$maxprice = trim($_REQUEST['maxprice']);
if( strlen($maxprice) > 100 || strlen($maxprice)< 1 ) {
	exit();
}
$maxprice = $conn->real_escape_string($maxprice);

$markup = trim($_REQUEST['markup']);
if( strlen($markup) > 100 || strlen($markup)< 1 ) {
	exit();
}
$markup = $conn->real_escape_string($markup);

$ordertime = trim($_REQUEST['ordertime']);
if( strlen($ordertime) > 100 || strlen($ordertime)< 1 ) {
	exit();
}
$ordertime = $conn->real_escape_string($ordertime);
$restaurant = trim($_REQUEST['restaurant']);
if( strlen($restaurant) > 100 || strlen($restaurant)< 1 ) {
	exit();
}
$restaurant = $conn->real_escape_string($restaurant);

$sql = "INSERT INTO `BCPDelivery_Offers` (`MaxPrice`, `MarkupPrice`, `DeliveryTime`, `OrderPlace`, `OrderTime`, `email`)
VALUES ('$maxprice', '$markup', '$deliverytime', '$restaurant', '$ordertime', '$email')";
echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>