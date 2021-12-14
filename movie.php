<?php
session_start();

if ((!isset($_SESSION['logged']))) {
    header('Location: login-register.php');
}

require_once "PARTS/connection.php";

$userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");

$data = pg_fetch_array($userdata);
$balance = number_format((float)$data['balance'], 2, '.', '');
$picture = $data['picture'];
$name = $data['name'];

$id = $_GET["id"];

$moviedata = pg_query($connection, "SELECT * FROM movies WHERE id = '" . $id . "'");
$movie = pg_fetch_array($moviedata);

$purchasedata = pg_query($connection, "SELECT id FROM public.purchases WHERE username='" . $_SESSION['username'] . "' AND movie_id='" . $id . "'");
$purchases = pg_fetch_all($purchasedata);
$purchasesNumber = count($purchases);

$wishlistdata = pg_query($connection, "SELECT id FROM public.wishlist WHERE username='" . $_SESSION['username'] . "' AND movie_id='" . $id . "'");
$wishlist = pg_fetch_all($wishlistdata);
$wishlistNumber = count($wishlist);

if ($purchasesNumber > 0) {
    $purchased = true;
} else {
    $purchased = false;
}

$commentsdata = pg_query($connection, "SELECT * FROM comments WHERE movie_id='" . $_GET['id'] . "'");
$comments = pg_fetch_all($commentsdata);
$commentsNumber = count($comments);
?>

<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Home</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/movie.css">
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

    <div id="highlighted-card" class="card">
        <img class="card-large-image" src="IMAGES/POSTERS/<?php echo $movie['poster'] ?>" alt="Movie Poster">
        <div class="card-large-bottom">
            <div id="rating" <?php if ($movie['rating'] == "R") echo 'class="r-rating-tag"' ?>><?php if ($movie['rating'] == "R" || $movie['rating'] == "G") {
                    echo $movie['rating'] . " Rated";
                } else {
                    echo $movie['rating'];
                } ?></div>
            <h2><?php echo $movie['title'] ?></h2>
            <h4>Lead Cast:<span></span><?php echo $movie['actors'] ?></h4>
            <p><?php echo $movie['description'] ?></p>
            <?php
            if (!$purchased) {
                echo '<h3>14.99€</h3>';
            }
            ?>
            <ul class="card-large-action-buttons">
                <?php
                if ($purchased) {
                    echo '
                             <li onclick="moviePlayerEnter('.$id.')" id="play-button"><img src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"><span>Play</span></li>

                        ';
                } else {
                    if($wishlistNumber > 0) {
                        echo '<li class="add-to-wishlist-button" class="added" data-id="' . $id . '"><img src="IMAGES/ICONS/bookmark-full-dark.svg" alt="Wishlist Icon"></li>';
                    } else {
                        echo '<li class="add-to-wishlist-button" data-id="' . $id . '"><img src="IMAGES/ICONS/bookmark-dark.svg" alt="Wishlist Icon"></li>';
                    }
                    echo '
                            <li id="add-to-cart-button" onclick="addToCart(' . $ap . $id . $ap . ')"><img src="IMAGES/ICONS/cart-dark.svg" alt="Shopping Cart Icon"><span>Add to cart</span></li>
                        ';
                }
                ?>
            </ul>
        </div>
        <div id="movie-player">
            <video src="VIDEOS/TEASERS/<?php echo $movie['movie'] ?>" controls controlsList="nodownload"></video>
            <button onclick="moviePlayerLeave()"><img src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>
        </div>
    </div>


    <?php
    if ($commentsNumber > 0 || $purchased) {
        echo '
                <ul id="comment-section">
                <h3>Comments</h3>
            ';
    } else {
        echo '
                <script>$("#primary-area").css({"padding-bottom": 0});</script>
            ';
    }

    while ($row = pg_fetch_array($commentsdata)) {

        $date = strtotime(date("Y-m-d")) - strtotime($row['date']);
        $date = abs(round($date / 86400));
        if ($date <= 0) {
            $date = "Today";
        } elseif ($date == 1) {
            $date = $date . " day ago";
        } else {
            $date = $date . " days ago";
        }

        echo '

                <li class="comment">
                    <div class="profile-picture">
                        <img src="IMAGES/PROFILE/' . $row['picture'] . '" alt="User Profile Picture">
                    </div>
                    <div class="comment-right-section">
                        <div class="comment-top-line">
                            <h3>' . $row['name'] . '</h3>
                            <h4>' . $date . '</h4>
                        </div>
                        <p class="comment-text">' . $row['comment'] . '</p>
                    </div>
                </li>
            
            ';
    }

    if ($purchased) {
        echo '<li class="comment">
                    <div class="profile-picture">
                        <img src="IMAGES/PROFILE/' . $picture . '" alt="User Profile Picture">
                    </div>
                    <div class="comment-right-section">
                        <div class="comment-top-line">
                            <h3>' . $name . '</h3>
                        </div>
                        <form action="FORMS/send-comment.php?id=' . $id . '" method="post">
                            <textarea maxlength="1000" name="comment" id="CommentArea" cols="30" rows="10"></textarea>
                            <input type="text" name="picture" value="' . $picture . '" style="display: none">
                            <input type="text" name="name" value="' . $name . '" style="display: none">
                            <label><input type="submit" value="Post" name="post"><img src="IMAGES/ICONS/arrow-right-dark.svg" alt=""></label>
                        </form>
                    </div>
                </li>';
    }

    if ($commentsNumber > 0 || $purchased) {
        echo '</ul>
    ';
    }

    ?>


    <script src="JS/movie.js"></script>
    <script src="JS/cards.js"></script>
    <script src="JS/notifications.js"></script>
    <script src="JS/main.js"></script>

</div>

</body>

</html>