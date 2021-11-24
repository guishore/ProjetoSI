<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Shopping Cart</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/shopping-cart.css">
</head>

<body>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Shopping Cart</h1>

        <ul id="line-list">

            <h2>Shopping List</h2>

            <li>
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3>Title</h3>
                        <h3>14.99</h3>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

        </ul>

        <div id="order-summary">

            <h2>Order Summary</h2>

            <ul id="order-list">
                <li>
                    <h4 class="order-left">Movie</h4>
                    <h4 class="order-right">14,99€</h4>
                </li>
                <li>
                    <h4 class="order-left">Movie</h4>
                    <h4 class="order-right">14,99€</h4>
                </li>
                <li>
                    <h4 class="order-left">Movie</h4>
                    <h4 class="order-right">14,99€</h4>
                </li>
            </ul>

            <div id="order-total">
                <h3 class="order-left">Total</h3>
                <h3 class="order-right">36,97€</h3>
            </div>

            <div id="order-buttons">
                <button>Continue Shopping</button>
                <button>Checkout</button>
            </div>

        </div>

        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>