<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Home</title>

    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/notifications.css">
    <link rel="stylesheet" href="CSS/cards.css">
    <link rel="stylesheet" href="CSS/menu-bar.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>

<body>

    <script>
        $(document).ready(function() {
            document.getElementById("home-icon").src = "IMAGES/ICONS/home-full-white.svg";
        });
    </script>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <div id="highlighted-card" class="card">
            <img class="card-large-image" src="IMAGES/MOVIES/Inception.jpg" alt="Movie Poster">
            <div class="card-large-bottom">
                <h2>Inception</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu netus et malesuada lobortis risus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin porta dui nec libero lobortis porta.</p>

                <!--<h3>14.99€</h3>-->
                <ul class="card-large-action-buttons">
                    <li><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>
                    <li><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"><span>Add to cart</span></li>
                </ul>
            </div>
        </div>

        <ul class="card-list">

            <h2 class="card-list-title">Recommended</h2>

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>Joker</h3>
                    <h4>14.99€</h4>
                    <ul class="card-medium-action-buttons">
                        <li><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>
                        <li><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>
                    </ul>
                </div>
            </li>

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/BladeRunner2049.jpg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>Blade Runner 2049</h3>
                    <h4>14.99€</h4>
                    <ul class="card-medium-action-buttons">
                        <li><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>
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
                        <li><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>
                        <li><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>
                    </ul>
                </div>
            </li>

        </ul>

        <ul class="card-list">

            <h2 class="card-list-title">Blockbuster Movies</h2>

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>Joker</h3>
                    <h4>14.99€</h4>
                    <ul class="card-medium-action-buttons">
                        <li><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>
                        <li><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>
                    </ul>
                </div>
            </li>

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>Joker</h3>
                    <h4>14.99€</h4>
                    <ul class="card-medium-action-buttons">
                        <li><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>
                        <li><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>
                    </ul>
                </div>
            </li>

        </ul>

        <script src="JS/cards.js"></script>
        <script src="JS/notifications.js"></script>

    </div>

</body>

</html>