<?php
include 'config.php';

session_start();

error_reporting(0);

if(isset($_SESSION['id']))
{
    header("Location: Store.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <h1 style="text-align:center;">Welcome to Shop with a Pepper</h1>
        <title>Devops Project</title>
    </head>
    <body>
        <div style="text-align:center;">
            <!--USER ID ADDED USING BUTTON-->
        <form method="POST" action="user.php">
            <input style="background-color: Green; border: none; color: white; padding: 12px 70px; text-align: center; text-decoration: none; display: inline-block;  margin: 2px 6px;  cursor: pointer; font-size:20px; " name="start" type="submit" value="Click to Begin">
            <!--<button name="start" class="btn btn-primary shop-item-button">START</button>-->
        </form>

        </div>
    </body>
</html>