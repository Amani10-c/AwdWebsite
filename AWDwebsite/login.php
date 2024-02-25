<?php
// Start the session
session_start();
$uname = $_GET['User_name'];
$upass = $_GET['User_password'];


if(!isset($_SESSION[$uname])) {
  echo "Hello " . $_SESSION[$uname] . ",welcome back!";
} else {
    $_SESSION[$uname] = "$uname";
  echo "Hello " . $_SESSION[$uname] . ",welcome back!";
}


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

$sql = "SELECT * FROM userinformation WHERE User_name = '$uname' AND User_password = '$upass'";

$result = mysqli_query($linkserver, $sql);

if (mysqli_num_rows($result) > 0) {
    // Login successful
    header("Location: personalinformatin.php");
    exit();
} else {
    // Login failed
    echo "ERROR:Invalid username or password  " . mysqli_error($linkserver);
}
mysqli_close($linkserver);
?>



