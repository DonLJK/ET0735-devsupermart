<?php
include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['id'])) {
    header("Location: Store.php");
}


//*/
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <h1>Hello to shop with a pepper</h1>
        <title>Devops Project</title>
    </head>
    <body>
        <div>
            <!--USER ID ADDED USING BUTTON-->
        <form method="POST" action="user.php">
            <!--<input name="start" type="submit" value="Start">-->
            <button name="start" class="btn btn-primary shop-item-button">START</button>
        </form>

        </div>
    </body>
</html>