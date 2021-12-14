<?php
session_start();

if (!isset($_SESSION['logged'])) {
    header('Location: login-register.php');
}

require_once "PARTS/connection.php";

$userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");

$data = pg_fetch_array($userdata);
$balance = number_format((float)$data['balance'], 2, '.', '');

?>

<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Shopping Cart</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/shopping-cart.css">
</head>

<body>
<script>username = "<?php echo $_SESSION['username']?>"</script>

<?php include("PARTS/menu-bar.php"); ?>
<?php include("PARTS/notification-tab.php"); ?>

<div id="primary-area">

    <h1 id="page-title">Shopping Cart</h1>

    <ul id="line-list">

        <h2>Shopping List</h2>

        <?php

        $cartList = array();
        $total = 0;

        if(count($_SESSION['movies'])>0){

        for ($i = 0; $i < count($_SESSION['movies']); $i++){

            $movieID = $_SESSION['movies'][$i];
            $moviedata = pg_query($connection, "SELECT * FROM movies WHERE id='" . $movieID . "'");
            $movie = pg_fetch_array($moviedata);

            $cartList[$i]['title'] = $movie['title'];
            $cartList[$i]['price'] = $movie['price'];
            $cartList[$i]['discount'] = $movie['discount'];
            $cartList[$i]['dactive'] = $movie['dactive'];

            $discountedPrice = $movie['price'] * (100 - $movie['discount']) * 0.01;

            echo'
            
            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/POSTERS/'.$movie['poster'].'" alt="Movie Poster">
                </div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">'.$movie['title'].'</h3>
                        <h3 style="display: none;">'.$movie['actors'].'</h3>';
            if($movie['dactive'] == "t") {
                echo '
                        <div class="line-list-price-discount">
                            <h3 class="line-list-discounted-price">'.round($movie['price'],2).'€</h3>
                            <h3 class="line-list-current-price">'.round($discountedPrice,2).'€</h3>
                        </div>';
            } else {
                echo '
                        <div class="line-list-price">
                            <h3 class="line-list-current-price">'.round($movie['price'],2).'€</h3>
                        </div>';
            }
            echo'
                    </div>
                    <form class="line-list-action-buttons" action="FORMS/remove-from-cart.php" method="post">
                        <input type="text" name="id" value="'.$i.'" style="display: none">
                        <label class="line-list-delete-button"><input type="submit" name="delete" style="display: none"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></label>
                    </form>
                </div>
            </li>
            
            ';

        }

        } else {
            echo '<h3>The Shopping Cart is Empty</h3>';
        }

        ?>

    </ul>


            <?php

            if(count($cartList)>0) {
                echo'
                
                
                <div id="order-summary">
            
                    <h2>Order Summary</h2>
            
                    <ul id="order-list">
                
                ';

                for ($i = 0; $i < count($cartList); $i++) {

                    if ($cartList[$i]['dactive'] == "t") {
                        $itemprice = $cartList[$i]['price'] * (100 - $cartList[$i]['discount']) * 0.01;
                    } else {
                        $itemprice = $cartList[$i]['price'];
                    }

                    echo '
                        <li>
                            <h4 class="order-left">' . $cartList[$i]['title'] . '</h4>
                            <h4 class="order-right">' . round($itemprice, 2) . '€</h4>
                        </li>
                    ';

                    $total = $total + $itemprice;
                }

            echo'
                </ul>
                <div id="order-total">
                    <h3 class="order-left">Total</h3>
                    <h3 class="order-right">'.round($total,2).'€</h3>
                </div>
        
                <form id="order-buttons" action="FORMS/buy-movie.php" method="post">
                    <input type="button" value="Continue Shopping" onclick="window.location='.$ap.'index.php'.$ap.'">
                    <input type="text" value="'.$total.'" name="total" style="display: none">
                    <input type="text" value="'.$balance.'" name="balance" style="display: none">
                    <input value="Checkout" type="submit" name="checkout">Checkout</input>
                </form>
            

            </div>    
            ';
            }
        ?>

    <script src="JS/notifications.js"></script>
    <script src="JS/main.js"></script>

</div>

</body>

</html>