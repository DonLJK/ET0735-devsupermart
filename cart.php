<?php
include 'config.php';

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

//FOR NOW CAN PASS CART TYPE TO DB
if (isset($_POST['purchase'])) {
    $d = $_POST['delivery'];
    $p = $_POST['button-product'];
    //ADD MORE POSTS
    $sql2 = "INSERT INTO cart (cart_type, cart_id, cart_date, prod_id, prod_quantity) VALUES ('$d','0', NOW(), '$p', '4')";	
}

$r = @mysqli_query($conn, $sql2);
if($r)
{
    echo '<h1>UOOOOOOOOOOOOOOOOOOOOOOOOOH</h1><h2>YOU DID IT YOU MAD LAD</h2>';
}
else
{
    echo "Error: ".$sql2."<br>".$conn->error;
}


$conn->close();
?>