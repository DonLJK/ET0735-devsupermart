<?php
include 'config.php';
session_start();
error_reporting(0);

//================== SELECT ======================//
$s = "SELECT * FROM product";
$result = $conn->query($s);
/*
if ($result->num_rows > 0) {


	echo "<table border='1'>";
	echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Price</th>";
    echo "<th>Quantity</th>";
    echo "</tr>";

//============ DISPLAY DATA =================//
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
        echo "<td>". $row['prod_id']. "</td>";
        echo "<td>". $row['prod_name']. "</td>";
        echo "<td>". $row['prod_price']. "</td>";
        echo "<td>". $row['prod_quantity']. "</td>";
        echo "</tr>";
	}

	echo '</table>'; 
	

} else {

	echo '0 result';

}*/

//$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>The Generics | Store</title>
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
                </ul>
            </nav>
            <h1 class="band-name band-name-large">The Generics</h1>
        </header>
        <!--PRODUCT TABLE INTEGRATED CAN DISPLAY-->
        <section class="container content-section">
            <h2 class="section-header">MUSIC</h2>
            <?php
            while ($row = $result->fetch_assoc()) {
        
            ?>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title"><?php echo $row['prod_name']; ?></span>
                    <img class="shop-item-image" src="<?php echo $row['prod_image']?>">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$ <?php echo $row['prod_price']; ?></span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                
            </div>
        </section>
        <?php
            }
            //$conn->close();
        ?>
        <section class="container content-section">
            <h2 class="section-header">MERCH</h2>
            <div class="shop-items">
                <div class="shop-item">
                    <span class="shop-item-title">T-Shirt</span>
                    <img class="shop-item-image" src="Images/Shirt.png">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$19.99</span>
                       
                            <button class="btn btn-primary shop-item-button" type="button" name="product-add">ADD TO CART</button>
                      
                    </div>
                </div>
                <div class="shop-item">
                    <span class="shop-item-title">Coffee Cup</span>
                    <img class="shop-item-image" src="Images/Cofee.png">
                    <div class="shop-item-details">
                        <span class="shop-item-price">$6.99</span>
                        <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>
        <!----------------------------------------------------- CART -------------------------------------------------------->
        
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
                  
                    <input type="radio" id="delivery1" name="delivery" value="Pick-up">Pick-up <br>
                    <input type="radio" id="delivery2" name="delivery"  value="Deliver">Deliver (+ $4 to total)<br>
                    <input name="purchase" type="submit" value="Purchase">
                    
                </form> 
            <?php

            //$ndwd = $_POST['delivery'];
            //echo $ndwd;

            $conn->close();?>
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">$0</span>
            </div>
            <!--New Div -->
             
            <!--End of Div-->
           
        </section>
         <!--Testing--->
         


















         <!-- Working Table display -->
        <?php
        /*
        $sql = "SELECT prod_id from product where prod_name = 'Apple'";
        $r = $conn->query($sql);
        if ($r->num_rows > 0) {

            
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Name</th>";
            echo "<th>Price</th>";
            echo "</tr>";
            
            while($row = $r->fetch_assoc())
            {
            echo "<tr>";
            echo "<td>".$row['prod_id']. "</td>";
            echo "<td>".$row['prod_name']."</td>";
            echo "<td>".$row['prod_price']."</td>";
            echo "</tr>";
            }
            echo "</table>";   
        }
        else 
        {
            echo "0 results";
        }
        //$conn -> close();

        
        */
        
        //insert the prod ids in the cart to the cart table
        //inserting into _______ (Values inside bracket is HTML value)
        // have another to insert cart total into payment table
        //$i = "INSERT INTO ________" ( , , prod_id, ) values('', NOW(), $_POST['Prod id?'], )?>
        
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

