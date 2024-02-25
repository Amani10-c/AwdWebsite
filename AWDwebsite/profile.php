<?php
$uname = $_GET['User_name'];
$upass = $_GET['User_password'];

$linkserver = mysqli_connect("localhost", "root", "", "MYuserinfordb");

if ($linkserver === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM userinformation WHERE User_name = '$uname' AND User_password = '$upass'";

$result = mysqli_query($linkserver, $sql);

if (mysqli_num_rows($result) > 0) {
    // Login successful
    // Redirect to user profile page
    $user = mysqli_fetch_assoc($result);
    $user_id = $user['id']; // Assuming you have an 'id' column in the 'userinformation' table
    header("Location: profile.php?id=$user_id");
    exit();
} else {
    // Login failed
    echo "<p>Invalid username or password.</p>";
}

mysqli_close($linkserver);
?>

