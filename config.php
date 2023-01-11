<?php 

$server = "localhost";
$user = "root";
$pass = ""; //just change this to 1
$database = "devops_supermarketdb";

$conn = mysqli_connect($server, $user, $pass, $database);

if (!$conn) {
    die("<script>alert('Connection Failed.')</script>");
}

?>