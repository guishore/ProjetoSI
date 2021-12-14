<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['admin'] != "t") {
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
    <title>LDMovies | Admin</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/admin.css">
</head>

<body class="admin">
<script>username = "<?php echo $_SESSION['username']?>"</script>

<?php include("PARTS/menu-bar.php"); ?>
<?php include("PARTS/notification-tab.php"); ?>

<div id="primary-area">

    <h1 id="page-title">Admin</h1>

    <div id="line-list">

        <h2>Movie List</h2>

        <div id="search-bar">
            <input type="text" id="myInput" onkeyup="myFunctionAdmin()" placeholder="Search">
            <img id="search-bar-icon" src="IMAGES/ICONS/search-dark.svg" alt="Search Icon">
            <button id="add-movie-button" onclick="menuclick('add-movie.php');"><img src="IMAGES/ICONS/plus-dark.svg"
                                                                                     alt="Plus Icon"> Add Movie
            </button>
        </div>

        <ul>

            <?php

            $moviedata = pg_query($connection, "SELECT * FROM movies WHERE available='true' ORDER BY title");

            while ($row = pg_fetch_array($moviedata)) {

                if ($row['dactive'] == "t") {

                    $price = $row['price'] * (100 - $row['discount']) * 0.01 ;

                    echo '
                        
                    <li class="line-list-item">
                        <div class="line-list-image-frame"><img src="IMAGES/POSTERS/'.$row['poster'].'" alt="Movie Poster"></div>
                        <div class="line-list-right-section">
                            <div class="line-list-top-line">
                                <h3 class="line-list-title">'.$row['title'].'</h3>
                                <h3 style="display: none;">'.$row['actors'].'</h3>
                                <div class="line-list-price-discount">
                                    <h3 class="line-list-discounted-price">'.round($row['price'],2).'€</h3>
                                    <h3 class="line-list-current-price">'.round($price,2).'€</h3>
                                </div>
                            </div>
                            <ul class="line-list-action-buttons">
                                <li class="line-list-edit-button" onclick="menuclick('.$ap.'edit-movie.php?id='.$row['id'].$ap.')"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                                <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"></li>
                            </ul>
                            <form action="FORMS/remove-movie.php" method="post" id="confirm-remove">
                                <input type="text" name="id" value="'.$row['id'].'" style="display: none">
                                <input type="button" value="Cancel">
                                <input type="submit" name="remove" value="Confirm">
                            </form>
                        </div>
                    </li>
                        
                        ';
                } else {

                    echo '
                    
                    <li class="line-list-item">
                        <div class="line-list-image-frame"><img src="IMAGES/POSTERS/'.$row['poster'].'" alt="Movie Poster"></div>
                        <div class="line-list-right-section">
                            <div class="line-list-top-line">
                                <h3 class="line-list-title">'.$row['title'].'</h3>
                                <h3 style="display: none;">'.$row['actors'].'</h3>
                                <div class="line-list-price">
                                    <h3>'.round($row['price'],2).'€</h3>
                                </div>
                            </div>
                            <ul class="line-list-action-buttons">
                                <li class="line-list-edit-button" onclick="menuclick('.$ap.'edit-movie.php?id='.$row['id'].$ap.')"><img
                                            src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                                <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon">
                                </li>
                            </ul>
                            <form action="FORMS/remove-movie.php" method="post" id="confirm-remove">
                                <input type="text" name="id" value="'.$row['id'].'" style="display: none">
                                <input type="button" value="Cancel">
                                <input type="submit" name="remove" value="Confirm">
                            </form>
                        </div>
                    </li>
                    
                    ';

                }

            }

            ?>

        </ul>

    </div>

    <script>

        $(".line-list-delete-button").click(function () {
            $(this).parent(".line-list-action-buttons").css({display: "none"});
            $(this).parent(".line-list-action-buttons").parent(".line-list-right-section").children("form").css({display: "block"});
        });

    </script>

    <script src="JS/notifications.js"></script>
    <script src="JS/main.js"></script>
    <script src="JS/search.js"></script>

</div>

</body>

</html>