<?php
include 'config.php';

if($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
}

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

if(isset($_SESSION['user']))
{
    echo "<script>alert('Test bit')</script>";
}

//*/
?>