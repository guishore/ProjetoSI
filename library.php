<?php
session_start();

if ((!isset($_SESSION['logged']))) {
    header('Location: login-register.php');
}

require_once "PARTS/connection.php";

$userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");

$data = pg_fetch_array($userdata);
$balance = number_format((float)$data['balance'], 2, '.', '');

$purchasedata = pg_query($connection, "SELECT movie_id FROM public.purchases WHERE username='" . $_SESSION['username'] . "'");
$purchases = pg_fetch_all($purchasedata);
$purchasesNumber = count($purchases);

?>

<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | My Library</title>
    <?php include("PARTS/head-tag.php"); ?>

</head>

<body>
<script>username = "<?php echo $_SESSION['username']?>"</script>

    <script>
        $(document).ready(function() {
            document.getElementById("library-icon").src = "IMAGES/ICONS/folder-full-white.svg";
        });
    </script>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">My Library</h1>

        <ul id="card-grid">

            <?php
            for ($i = 0; $i < $purchasesNumber; $i++){

                $mid =  $purchases[$i]['movie_id'];

                $moviedata = pg_query($connection, "SELECT * FROM movies WHERE id='" . $mid . "'");
                $row = pg_fetch_array($moviedata);

                echo '
                    <li onclick="menuclick('.$ap.'movie.php?id='.$mid.$ap.')" class="card card-medium romance-category '.$row['category'].'-category '.$row['rating'].'-rating">
                        <img class="card-item card-medium-image" src="IMAGES/POSTERS/'.$row['poster'].'" alt="Movie Poster">
                        <video class="card-medium-video" src="VIDEOS/TEASERS/' . $row['teaser'] . '" muted></video>
                        <div class="card-item card-medium-bottom">
                            <h3>'.$row['title'].'</h3>
                            <h3 style="display: none;">'.$row['actors'].'</h3>
                            <ul class="card-medium-action-buttons">
                                <li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>
                            </ul>
                        </div>
                    </li>
                ';

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