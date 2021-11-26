<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Home</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/movie.css">
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

                <h3>14.99€</h3>
                <ul class="card-large-action-buttons">
                    <li><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>
                    <li><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"><span>Add to cart</span></li>
                </ul>
            </div>
        </div>

        <ul id="comment-section">

            <h3>Comments</h3>

            <li class="comment">
                <div class="profile-picture">
                    <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="User Profile Picture">
                </div>
                <div class="comment-right-section">
                    <div class="comment-top-line">
                        <h3>Name</h3>
                        <h4>10 minutes ago</h4>
                    </div>
                    <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu netus et malesuada lobortis risus.</p>
                </div>
            </li>

            <li class="comment">
                <div class="profile-picture">
                    <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="User Profile Picture">
                </div>
                <div class="comment-right-section">
                    <div class="comment-top-line">
                        <h3>Name</h3>
                        <h4>10 minutes ago</h4>
                    </div>
                    <p class="comment-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eu netus et malesuada lobortis risus.</p>
                </div>
            </li>

        </ul>

        <script src="JS/cards.js"></script>
        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>