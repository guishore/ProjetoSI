<?php
session_start();

if ((!isset($_SESSION['logged']))) {
    header('Location: login-register.php');
}

require_once "PARTS/connection.php";

$userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");

$data = pg_fetch_array($userdata);
$balance = number_format((float)$data['balance'], 2, '.', '');

$lastmoviedata = pg_query($connection, "SELECT * FROM movies WHERE available='true' ORDER BY id DESC");
$lastmovie = pg_fetch_array($lastmoviedata);

?>

<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Home</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/home.css">
</head>

<body>
<script>username = "<?php echo $_SESSION['username']?>"</script>

<script>
    $(document).ready(function () {
        document.getElementById("home-icon").src = "IMAGES/ICONS/home-full-white.svg";
    });
</script>

<?php include("PARTS/menu-bar.php"); ?>
<?php include("PARTS/notification-tab.php"); ?>

<div id="primary-area">

    <div id="highlighted-card" class="card" >
        <img onclick="menuclick('movie.php?id=' + <?php echo $lastmovie['id'] ?>)" class="card-large-image" src="IMAGES/POSTERS/<?php echo $lastmovie['poster'] ?>" alt="Movie Poster">
        <div class="card-large-bottom">
            <h2><?php echo $lastmovie['title'] ?></h2>
            <p><?php echo $lastmovie['description'] ?></p>

            <h3><?php echo round($lastmovie['price'],2) ?>€</h3>
            <ul class="card-large-action-buttons">
                <!--<li id="add-to-wishlist-button" class="add-to-wishlist-button" data-id="'<?php echo $lastmovie['id'] ?>'"><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>-->
                <li id="add-to-cart-button" onclick="addToCart('<?php echo $lastmovie['id'] ?>')"><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"><span>Add to cart</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="card-list">

        <h2 class="card-list-title">Action Movies</h2>

        <ul>

            <?php

            $moviedata = pg_query($connection, "SELECT * FROM movies WHERE available='true' AND category='action' ORDER BY title");

            while ($row = pg_fetch_array($moviedata)) {

                $wishlistdata = pg_query($connection, "SELECT id FROM public.wishlist WHERE username='" . $_SESSION['username'] . "' AND movie_id='" . $row['id'] . "'");
                $wishlist = pg_fetch_all($wishlistdata);
                $wishlistNumber = count($wishlist);

                $purchasedata = pg_query($connection, "SELECT id FROM public.purchases WHERE username='" . $_SESSION['username'] . "' AND movie_id='" . $row['id'] . "'");
                $purchases = pg_fetch_all($purchasedata);
                $purchasesNumber = count($purchases);

                if ($row['dactive'] == "t") {

                    $dprice = $row['price'] * (100 - $row['discount']) * 0.01;

                    echo '
                        
                        <li class="card card-medium">
                            <img onclick="menuclick('.$ap.'movie.php?id='.$row["id"].$ap.')" class="card-item card-medium-image" src="IMAGES/POSTERS/' . $row['poster'] . '" alt="Movie Poster">
                            <video onclick="menuclick('.$ap.'movie.php?id='.$row["id"].$ap.')" class="card-medium-video" src="VIDEOS/TEASERS/' . $row['teaser'] . '" muted></video>
                            <div class="card-item card-medium-bottom">
                                <h3>' . $row['title'] . '</h3>
                                <div class="discount">
                                    <h4 class="percentage">' . $row['discount'] . '% Off</h4>
                                    <h4 class="oldprice">' . round($row['price'],2) . '€</h4>
                                    <h4 class="newprice">' . round($dprice,2) . '€</h4>
                                </div>
                                <ul class="card-medium-action-buttons">
                                ';
                                if($purchasesNumber>0){
                                    echo '<li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>';
                                } else {
                                    if ($wishlistNumber > 0) {
                                        echo '<li class="add-to-wishlist-button added" data-id="' . $row['id'] . '"><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>';
                                    } else {
                                        echo '<li class="add-to-wishlist-button" data-id="' . $row['id'] . '"><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>';
                                    }
                                    echo'<li onclick="addToCart(' . $ap . $row['id'] . $ap . ')"><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>';
                                }
                                echo'
                                </ul>
                            </div>
                        </li>
                        
                        ';

                } else {
                    echo '
                        
                        <li class="card card-medium">
                            <img onclick="menuclick('.$ap.'movie.php?id='.$row["id"].$ap.')" class="card-item card-medium-image" src="IMAGES/POSTERS/' . $row['poster'] . '" alt="Movie Poster">
                            <video onclick="menuclick('.$ap.'movie.php?id='.$row["id"].$ap.')" class="card-medium-video" src="VIDEOS/TEASERS/' . $row['teaser'] . '" muted></video>
                            <div class="card-item card-medium-bottom">
                                <h3>' . $row['title'] . '</h3>
                                <h4>' . round($row['price'],2) . '€</h4>
                                <ul class="card-medium-action-buttons">
                                ';
                                if($purchasesNumber>0){
                                    echo '<li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>';
                                } else {
                                    if ($wishlistNumber > 0) {
                                        echo '<li class="add-to-wishlist-button added" data-id="' . $row['id'] . '"><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>';
                                    } else {
                                        echo '<li class="add-to-wishlist-button" data-id="' . $row['id'] . '"><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>';
                                    }
                                    echo'<li onclick="addToCart(' . $ap . $row['id'] . $ap . ')"><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>';
                                }
                                echo'
                                </ul>
                            </div>
                        </li>
                        
                        ';
                }
            }

            ?>

        </ul>

        <div class="card-list-previous-button"><img src="IMAGES/ICONS/arrow-left-dark.svg" alt="Delete Icon"></div>
        <div class="card-list-next-button"><img src="IMAGES/ICONS/arrow-right-dark.svg" alt="Delete Icon"></div>

    </div>

    <div class="card-list">

        <h2 class="card-list-title">Sci-Fi Movies</h2>

        <ul>
            <?php

            $moviedata = pg_query($connection, "SELECT * FROM movies WHERE available='true' AND category='sci-fi' ORDER BY title");

            while ($row = pg_fetch_array($moviedata)) {

                $wishlistdata = pg_query($connection, "SELECT id FROM public.wishlist WHERE username='" . $_SESSION['username'] . "' AND movie_id='" . $row['id'] . "'");
                $wishlist = pg_fetch_all($wishlistdata);
                $wishlistNumber = count($wishlist);

                $purchasedata = pg_query($connection, "SELECT id FROM public.purchases WHERE username='" . $_SESSION['username'] . "' AND movie_id='" . $row['id'] . "'");
                $purchases = pg_fetch_all($purchasedata);
                $purchasesNumber = count($purchases);

                if ($row['dactive'] == "t") {

                    $dprice = $row['price'] * (100 - $row['discount']) * 0.01;

                    echo '
                        
                        <li class="card card-medium">
                            <img onclick="menuclick('.$ap.'movie.php?id='.$row["id"].$ap.')" class="card-item card-medium-image" src="IMAGES/POSTERS/' . $row['poster'] . '" alt="Movie Poster">
                            <video onclick="menuclick('.$ap.'movie.php?id='.$row["id"].$ap.')" class="card-medium-video" src="VIDEOS/TEASERS/' . $row['teaser'] . '" muted></video>
                            <div class="card-item card-medium-bottom">
                                <h3>' . $row['title'] . '</h3>
                                <div class="discount">
                                    <h4 class="percentage">' . $row['discount'] . '% Off</h4>
                                    <h4 class="oldprice">' . round($row['price'],2) . '€</h4>
                                    <h4 class="newprice">' . round($dprice,2) . '€</h4>
                                </div>
                                <ul class="card-medium-action-buttons">
                                ';
                    if($purchasesNumber>0){
                        echo '<li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>';
                    } else {
                        if ($wishlistNumber > 0) {
                            echo '<li class="add-to-wishlist-button added" data-id="' . $row['id'] . '"><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>';
                        } else {
                            echo '<li class="add-to-wishlist-button" data-id="' . $row['id'] . '"><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>';
                        }
                        echo'<li onclick="addToCart(' . $ap . $row['id'] . $ap . ')"><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>';
                    }
                    echo'
                                </ul>
                            </div>
                        </li>
                        
                        ';

                } else {
                    echo '
                        
                        <li class="card card-medium">
                            <img onclick="menuclick('.$ap.'movie.php?id='.$row["id"].$ap.')" class="card-item card-medium-image" src="IMAGES/POSTERS/' . $row['poster'] . '" alt="Movie Poster">
                            <video onclick="menuclick('.$ap.'movie.php?id='.$row["id"].$ap.')" class="card-medium-video" src="VIDEOS/TEASERS/' . $row['teaser'] . '" muted></video>
                            <div class="card-item card-medium-bottom">
                                <h3>' . $row['title'] . '</h3>
                                <h4>' . round($row['price'],2) . '€</h4>
                                <ul class="card-medium-action-buttons">
                                ';
                    if($purchasesNumber>0){
                        echo '<li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>';
                    } else {
                        if ($wishlistNumber > 0) {
                            echo '<li class="add-to-wishlist-button added" data-id="' . $row['id'] . '"><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>';
                        } else {
                            echo '<li class="add-to-wishlist-button" data-id="' . $row['id'] . '"><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>';
                        }
                        echo'<li onclick="addToCart(' . $ap . $row['id'] . $ap . ')"><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"></li>';
                    }
                    echo'
                                </ul>
                            </div>
                        </li>
                        
                        ';
                }
            }

            ?>
        </ul>

        <div class="card-list-previous-button"><img src="IMAGES/ICONS/arrow-left-dark.svg" alt="Delete Icon"></div>
        <div class="card-list-next-button"><img src="IMAGES/ICONS/arrow-right-dark.svg" alt="Delete Icon"></div>

    </div>

    <script src="JS/cards.js"></script>
    <script src="JS/notifications.js"></script>
    <script src="JS/main.js"></script>

</div>

</body>

</html>