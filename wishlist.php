<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Wishlist</title>
    <?php include("PARTS/head-tag.php"); ?>
</head>

<body>

    <script>
        $(document).ready(function() {
            document.getElementById("wishlist-icon").src = "IMAGES/ICONS/bookmark-full-white.svg";
        });
    </script>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Wishlist</h1>

        <ul id="card-grid">

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>Joker</h3>
                    <h4>14.99€</h4>
                    <ul class="card-medium-action-buttons">
                        <li><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>
                        <li><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>
                    </ul>
                </div>
            </li>

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>The French Dispatch</h3>
                    <div class="discount">
                        <h4 class="percentage">40% Off</h4>
                        <h4 class="oldprice">14.99€</h4>
                        <h4 class="newprice">8.99€</h4>
                    </div>
                    <ul class="card-medium-action-buttons">
                        <li><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>
                        <li><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>
                    </ul>
                </div>
            </li>

        </ul>

        <script src="JS/cards.js"></script>
        <script src="JS/search.js"></script>
        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>