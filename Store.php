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
        <title>SP-Market</title>
        <meta name="description" content="This is the description">
        <link rel="stylesheet" href="style.css" />
        <script src="store.js" async></script>
        <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
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
            <h1 class="band-name band-name-large">SP-Market</h1>
        </header>

        <!--PRODUCT TABLE INTEGRATED CAN DISPLAY-->
        <section class="container content-section">
            <h2 class="section-header">MUSIC</h2>
            <?php
            while ($row = $result->fetch_assoc()) {
        
            ?>
            <div class="shop-items">
                <div class="shop-item">
                    
                    <form method="POST" action="cart.php">
                        <span class="shop-item-title" id="item-name"><?php echo $row['prod_name']; ?></span>
                        <img class="shop-item-image" src="<?php echo $row['prod_image']?>">
                        <div class="shop-item-details">
                            <span class="shop-item-price">$ <?php echo $row['prod_price']; ?></span>
                            <button class="btn btn-primary shop-item-button" type="button" name="add-product">ADD TO CART</button>
                        </div>
                    </form >
                        <!----Test---->
                        
                        <!----Test---->
                        
                    
                    
                
                </div>
                
            </div>
        </section>
        <?php
            }
            //$conn->close();
        ?>
        
        <section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
            </div>
            <div>
                <form method="post" action="cart.php">
                <div>
                    <input type="radio" id="delivery1" name="delivery" value="Pick-up">Pick-up <br>
                    <input type="radio" id="delivery2" name="delivery"  value="Deliver">Deliver (+ $4 to total)<br>
                </div>
                <div style="text-align:center;">
                    <input style="text-align:center; background-color:turquoise; 
                    border: none;
                    color: white;
                    padding: 12px 70px;
                    text-align: center;
                    text-decoration: none;
                    display: inline-block; 
                    margin: 2px 6px;  cursor:
                    pointer; font-size:20px; "
                    name="purchase" type="submit" value="Purchase">
                </div>
                </form> 
            <?php

            $conn->close();?>
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price" name="price" >$0</span>
            </div>
            <!--<p><a href="QRtest.php">Test File</a></p>-->
            
            <div id="qrcode"></div>

            <script>
                // Define the shopping list data as a string
                var shoppingList = document.getElementById("item-name");

                // Generate the QR code image and add it to the container
                
                new QRCode(document.getElementById("qrcode"), shoppingList);
	        </script>
        </section>
       
        
        <footer class="main-footer">
            <div class="container main-footer-container">
                <h3 class="band-name">SP-market</h3>
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

