<?php
include 'config.php';

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

if (isset($_POST['submit']))
{
    //echo "TEST";
    
    $findid = "SELECT * FROM user where id='1'";
    $nfind = mysqli_query($conn, $findid);
    if($nfind == true)
    {
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

//*/
?>
