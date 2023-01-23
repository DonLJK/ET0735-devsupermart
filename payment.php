<?php
include 'config.php';
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: index.php");
}

$s = "SELECT * FROM product";
$result = $conn->query($s);
        
?>

<!DOCTYPE html>
<html>
    <head>
        <title>PAY</title>
        <meta name="description" content="This is the description">
        <link rel="stylesheet" href="style.css" />
        <script src="store.js" async></script>
    </head>
    <body>
        <header class="main-header">
            <nav class="main-nav nav">
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="store.html">STORE</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li class="nav-item" style="float: right; margin-left: 30px; margin-right: 30px;"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <h1 class="band-name band-name-large">PAYMENT</h1>
        </header>
        <p>TEST</p>
        <span class="cart-total-price" name="price" >$0</span>
        
        <footer class="main-footer">
            <div class="container main-footer-container">
                <h3 class="band-name">The Generics</h3>
                <ul class="nav footer-nav">
                    <li>
                        <a href="https://www.youtube.com" target="_blank">
                            <img src="Images/YouTube Logo.png">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.spotify.com" target="_blank">
                            <img src="Images/Spotify Logo.png">
                        </a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com" target="_blank">
                            <img src="Images/Facebook Logo.png">
                        </a>
                    </li>
                </ul>
            </div>
        </footer>
    </body>
</html>

