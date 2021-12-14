<?php
session_start();

if ((!isset($_SESSION['logged']))) {
    header('Location: login-register.php');
}

require_once "PARTS/connection.php";

$userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");

$data = pg_fetch_array($userdata);
$balance = number_format((float)$data['balance'], 2, '.', '');

$wishlistdata = pg_query($connection, "SELECT movie_id FROM public.wishlist WHERE username='" . $_SESSION['username'] . "'");
$wishlist = pg_fetch_all($wishlistdata);
$wishlistNumber = count($wishlist);

?>

<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Wishlist</title>
    <?php include("PARTS/head-tag.php"); ?>
</head>

<body>
<script>username = "<?php echo $_SESSION['username']?>"</script>

<script>
    $(document).ready(function () {
        document.getElementById("wishlist-icon").src = "IMAGES/ICONS/bookmark-full-white.svg";
    });
</script>

<?php include("PARTS/menu-bar.php"); ?>
<?php include("PARTS/notification-tab.php"); ?>

<div id="primary-area">

    <h1 id="page-title">Wishlist</h1>

    <ul id="card-grid">

        <?php
        for ($i = 0; $i < $wishlistNumber; $i++) {

            $mid = $wishlist[$i]['movie_id'];

            $moviedata = pg_query($connection, "SELECT * FROM movies WHERE id='" . $mid . "'");
            $row = pg_fetch_array($moviedata);

            if ($row['available'] == "t") {

                if ($row['dactive'] == "t") {

                    $discounted = $row['price'] * (100 - $row['discount']) * 0.01;

                    echo '
                    <li class="card card-medium">
                        <img onclick="menuclick(' . $ap . 'movie.php?id=' . $mid . $ap . ')" class="card-item card-medium-image" src="IMAGES/POSTERS/' . $row['poster'] . '" alt="Movie Poster">
                        <video onclick="menuclick(' . $ap . 'movie.php?id=' . $mid . $ap . ')" class="card-medium-video" src="VIDEOS/TEASERS/' . $row['teaser'] . '" muted></video>
                        <div class="card-item card-medium-bottom">
                            <h3>' . $row['title'] . '</h3>
                            <div class="discount">
                                <h4 class="percentage">' . $row['discount'] . '% Off</h4>
                                <h4 class="oldprice">' . $row['price'] . '€</h4>
                                <h4 class="newprice">' . $discounted . '€</h4>
                            </div>
                            <ul class="card-medium-action-buttons">
                                <li onclick="window.location.href=' . $ap . './FORMS/update-wishlist.php?id=' . $row['id'] . $ap . '"><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>
                                <li onclick="addToCart(' . $ap . $row['id'] . $ap . ')"><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>
                            </ul>
                        </div>
                    </li>
                    
                ';
                } else {
                    echo '
                    <li class="card card-medium">
                        <img onclick="menuclick(' . $ap . 'movie.php?id=' . $mid . $ap . ')" class="card-item card-medium-image" src="IMAGES/POSTERS/' . $row['poster'] . '" alt="Movie Poster">
                        <video onclick="menuclick(' . $ap . 'movie.php?id=' . $mid . $ap . ')" class="card-medium-video" src="VIDEOS/TEASERS/' . $row['teaser'] . '" muted></video>
                        <div class="card-item card-medium-bottom">
                            <h3>' . $row['title'] . '</h3>
                            <h4>' . $row['price'] . '€</h4>
                            <ul class="card-medium-action-buttons">
                                <li onclick="window.location.href=' . $ap . './FORMS/update-wishlist.php?id=' . $row['id'] . $ap . '"><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>
                                <li onclick="addToCart(' . $ap . $row['id'] . $ap . ')"><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>
                            </ul>
                        </div>
                    </li>
                    
                ';
                }
            }

        }
        ?>

    </ul>

    <script src="JS/cards.js"></script>
    <script src="JS/search.js"></script>
    <script src="JS/notifications.js"></script>
    <script src="JS/main.js"></script>

</div>

</body>

</html>