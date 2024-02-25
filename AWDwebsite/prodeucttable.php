<?php

$linkserver= mysqli_connect("localhost","root","","MYuserinfordb");

if ($linkserver === false) {
    die("ERROR:Could not connect. " . mysqli_connect_error());
}

$sql= "INSERT INTO products (p_name, p_price, p_description) 
VALUES ('Mebkara', '90 SAR', 'It is a tool in which embers and incense are placed'),
       ('Buknuk', '90 SAR', ' It is a black head covering consisting of a piece of transparent black silk fabric sewn entirely except for an opening for the face'),
       ('Hawan', '90 SAR', 'mortar The bowl is used to prepare ingredients or materials by crushing and grinding them into a fine paste or powder in the kitchen'
        )";

if(mysqli_query($linkserver,$sql)){
echo"Data inserted";
}else{
    echo "ERROR:Data not inserted  " . mysqli_error($linkserver);
}
mysqli_close($linkserver);
?>





