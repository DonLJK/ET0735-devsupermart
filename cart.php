<?php

include 'config.php';

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

//HAD TO CHANGE THE PRODCT TABLE COLUMN ID TO PROD_ID
if (isset($_POST['purchase'])) {
    //ADD MORE POSTS
    $sql3 = "SELECT user.id, product.id FROM user, product where user.id='1' AND product.prod_name='apple'";	
    
    


$r = @mysqli_query($conn, $sql3);
if($r == true)
{
    $row = mysqli_fetch_assoc($r);
    echo $row['id'];
    $prod = "SELECT id from id where prod_name = bread";
    //$uid = $row['id'];
    //$prod = $row['product.id'];
    //$quant = $_POST['quantity-check'];*/
    $uid = $row['id'];
    
    $quant = 2;
    $sql2 = "INSERT INTO cart (id, customer_id, prod_id, prod_quantity) VALUES ('0','$uid', '$prod', '$quant')";
    $q = @mysqli_query($conn, $sql2);
    if($q == true)
    {
        echo "YOU DID IT";
    }
    else
    {
        echo "Error: ".$q."<br>".$conn->error;
    }
}
else
{
    echo "Error: ".$r."<br>".$conn->error;
}

}

$conn->close();





?>


<!---


/*
if (isset($_POST['start']))
{
    //echo "TEST";
    
    $findid = "SELECT * FROM user where id='1'";
    $nfind = mysqli_query($conn, $findid);
    if($nfind == true)
    {
        echo "hmmmm";
        $row = mysqli_fetch_assoc($nfind);
        $_SESSION['id']=$row['id'];
        header("Location: Store.php");
    }
    else
    {
        echo "everything went wrong";
        alert("Error: ".$nfind."<br>".$conn->error);
    }

}
*/

--->