<?php

$linkserver= mysqli_connect("localhost","root","","MYuserinfordb");

// Check the connection
if ($linkserver === false) {
    die("ERROR:Could not connect. " . mysqli_connect_error());
}

$sql= "CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prodectName VARCHAR(255) NOT NULL,
    prodectTybe VARCHAR(255) NOT NULL,
    myFile VARCHAR(255) NOT NULL,
    comment TEXT,
    fullName VARCHAR(255) NOT NULL,
    useremail VARCHAR(255) NOT NULL,
    num VARCHAR(20) NOT NULL,
    fav VARCHAR(50) NOT NULL,
    addres TEXT NOT NULL,
    submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if(mysqli_query($linkserver,$sql)){
    echo " تم إنشاء الجدول بنجاح.";
}else{
    echo "ERROR:Could not able to execute $sql. " . mysqli_error($linkserver);
}
mysqli_close($linkserver);
?>