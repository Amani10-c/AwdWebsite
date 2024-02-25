<?php

$linkserver= mysqli_connect("localhost","root","");

// Check the connection
if ($linkserver === false) {
    die("ERROR:Could not connect. " . mysqli_connect_error());
}

$sql= "CREATE DATABASE MYuserinfordb";
if(mysqli_query($linkserver,$sql)){
    echo " Database created successfully";
}else{
    echo "ERROR:Could not able to execute $sql. " . mysqli_error($linkserver);
}
mysqli_close($linkserver);
?>