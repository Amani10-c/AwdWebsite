<?php
// Start the session
session_start();
$uname= $upass = $uemail =$ucity ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uname = $_POST['User_name'];
    $upass = $_POST['User_password'];
    $uemail = $_POST['email'];
    $ucity = $_POST['User_city'];
}

// Set session variables
$_SESSION["uname"] = "$uname";
$_SESSION["upass"] = "$upass";
$_SESSION["uemail"] = "$uemail";
$_SESSION["ucity"] = "$ucity";
echo "Session variables are set.";
print_r($_SESSION);
echo "<br>";


// Set Cookie variables
setcookie($uname,$ucity,time()+86400*30);
if(!isset($_COOKIE[$uname])) {
  echo "Cookie named '" . $uname . "' is not set!";
} else {
  echo "Cookie '" . $uname . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$uname];
}

$linkserver= mysqli_connect("localhost","root","","MYuserinfordb");

if ($linkserver === false) {
    die("ERROR:Could not connect. " . mysqli_connect_error());
}

$sql= "INSERT INTO userinformation( User_name, User_password, email, User_city) 
       VALUES('$uname','$upass',' $uemail','$ucity')";

if(mysqli_query($linkserver,$sql)){
    header("Location: login.html");
    exit();
}else{
    echo "ERROR:Could not able to execute  " . mysqli_error($linkserver);
}
mysqli_close($linkserver);

?>











