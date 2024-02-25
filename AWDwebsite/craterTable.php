<?php

$linkserver= mysqli_connect("localhost","root","","MYuserinfordb");

// Check the connection
if ($linkserver === false) {
    die("ERROR:Could not connect. " . mysqli_connect_error());
}

$sql= "CREATE TABLE userinformation (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    User_name VARCHAR(30) NOT NULL,
    User_Password VARCHAR(100) NOT NULL,
    email VARCHAR(70) NOT NULL UNIQUE,
    User_city VARCHAR(30) NOT NULL
    )";
if(mysqli_query($linkserver,$sql)){
    echo " Table created successfully.";
}else{
    echo "ERROR:Could not able to execute $sql. " . mysqli_error($linkserver);
}
mysqli_close($linkserver);
?>