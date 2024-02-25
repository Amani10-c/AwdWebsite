<?php

$linkserver= mysqli_connect("localhost","root","","MYuserinfordb");

// Check the connection
if ($linkserver === false) {
    die("ERROR:Could not connect. " . mysqli_connect_error());
}

$sql= "CREATE TABLE products(
    p_id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    p_name VARCHAR(30) NOT NULL,
    p_price VARCHAR(30) NOT NULL,
    p_description VARCHAR(30),
    prud_img TEXT 
    )";

if(mysqli_query($linkserver,$sql)){
    echo " Table Created";
}else{
    echo "ERROR:Could not able to execute $sql. " . mysqli_error($linkserver);
}
mysqli_close($linkserver);
?>