<?php
include 'config.php';
include 'header.html';

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

$output = "";
//FOR NOW CAN PASS CART TYPE TO DB

if (isset($_POST['user'])) {
    //ADD MORE POSTS
    $sql3 = "INSERT INTO user (id) VALUES ('0')";	
}

$r = @mysqli_query($conn, $sql3);
if($r)
{
    $output = "UOOOOOOOOOOOOOOOOOOOOOOOOOH YOU DID IT YOU MAD LAD";
}
else
{
    echo "Error: ".$sql3."<br>".$conn->error;
}



$conn->close();

include 'Store.php';
include 'footer.html';
?>

