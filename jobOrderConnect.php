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

$order = trim($_REQUEST['order']);
if( strlen($order) > 100 || strlen($order)< 1 ) {
	exit();
}
$order = $conn->real_escape_string($order);

$deliverylocation = trim($_REQUEST['deliverylocation']);
if( strlen($deliverylocation) > 100 || strlen($deliverylocation)< 1 ) {
	exit();
}
$deliverylocation = $conn->real_escape_string($deliverylocation);

$deliverytime = trim($_REQUEST['deliverymonth'].$_REQUEST['deliveryday'].$_REQUEST['deliveryhour'].$_REQUEST['deliveryminute'].$_REQUEST['ampm']);
if( strlen($deliverytime) > 100 || strlen($deliverytime)< 1 ) {
	exit();
}


$restaurant = trim($_REQUEST['restaurant']);
if( strlen($restaurant) > 100 || strlen($restaurant)< 1 ) {
	exit();
}
$restaurant = $conn->real_escape_string($restaurant);

$price = trim($_REQUEST['price']);
if( strlen($price) > 100 || strlen($price)< 1 ) {
	exit();
}
$price = $conn->real_escape_string($price);

$markup = trim($_REQUEST['markup']);
if( strlen($markup) > 100 || strlen($markup)< 1 ) {
	exit();
}
$markup = $conn->real_escape_string($markup);
$sql = "INSERT INTO `BCPDelivery_Orders` (`Order`, `ApproxPrice`, `DeliveryTime`, `DeliveryPlace`, `FoodPlace`, `MaxMarkup`, `email`)
VALUES ('$order', '$price', '$deliverytime', '$deliverylocation', '$restaurant', '$markup', '$email')";
echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>
?>