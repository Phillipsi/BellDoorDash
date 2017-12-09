<?php
$servername = "localhost";
$username = "webapp17Us3r";
$password = "5DfJa2aduPkQtmEK";
$dbname = "playground17";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
/*function alert($msg) {
		else{
        $cookie_name = "user";
        $cookie_value = "sanshengwangchuanwushang";
        setcookie($cookie_name, $cookie_value, time()+300);
    }
    echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    if($_COOKIE[$cookie_name]=="sanshengwangchuanwushang") {
     echo "welcome!";
    alert("success!");
    } else {
         header('Location: http://times.bcp.org/webapps18/phi18/loginForm.html');  
    }
	*/
$result = mysqli_query($conn,"SELECT * FROM BCPDelivery_Profile WHERE Email = 'testemail@email.com'");
$row = mysqli_fetch_array($result);
echo "<h2>First Name: ".$row['First Name']."</h2>";
echo "<h2>Last Name: ".$row['Last Name']."</h2>";
$stars =$row['RatingSum']/$row['NumberRatings'];
$totalvotes = 400;
if ($stars>=0.75){echo '<img src="starfull.png">';}
else if ($stars>=0.25){echo '<img src="starhalf.png">' ;}
else{ echo '<img src="starempty.png">' ;}
if ($stars>=1.75){echo '<img src="starfull.png">';}
else if ($stars>=1.25){echo '<img src="starhalf.png">' ;}
else{ echo '<img src="starempty.png">' ;}
if ($stars>=2.75){echo '<img src="starfull.png">';}
else if ($stars>=2.25){echo '<img src="starhalf.png">' ;}
else{ echo '<img src="starempty.png">' ;}
if ($stars>=3.75){echo '<img src="starfull.png">';}
else if ($stars>=3.25){echo '<img src="starhalf.png">' ;}
else{ echo '<img src="starempty.png">' ;}
if ($stars>=4.75){echo '<img src="starfull.png">';}
else if ($stars>=4.25){echo '<img src="starhalf.png">' ;}
else{ echo '<img src="starempty.png">' ;}
echo '<h2>('.round($stars, 2).' / 5.0 , '.$totalvotes.' votes)</h2>';
echo "<h2> Comments: </h2>";
echo $row['Comments'];
mysqli_close($conn);
?>
<html>
    <head>
    </head>
    <body>
     
    </body>
</body>
</html>