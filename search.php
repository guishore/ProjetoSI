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
    <title>LDMovies | Search</title>
    <?php include("PARTS/head-tag.php"); ?>
</head>

<body>
<script>username = "<?php echo $_SESSION['username']?>"</script>

<?php include("PARTS/menu-bar.php"); ?>
<?php include("PARTS/notification-tab.php"); ?>

<div id="primary-area">

    <h1 id="page-title">Search</h1>

    <div id="search-bar">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search"><img id="search-bar-icon"
                                                                                         src="IMAGES/ICONS/search-dark.svg"
                                                                                         alt="Search Icon">
        <button id="category-button">Category <img src="IMAGES/ICONS/arrow-down-dark.svg" alt=""></button>
        <button id="rating-button">Rating <img src="IMAGES/ICONS/arrow-down-dark.svg" alt=""></button>
        <ul id="category-list">
            <li id="all-movies-category" onclick="categorySelection(this.id)">All Movies</li>
            <li id="action-category" onclick="categorySelection(this.id)">Action</li>
            <li id="adventure-category" onclick="categorySelection(this.id)">Adventure</li>
            <li id="animation-category" onclick="categorySelection(this.id)">Animation</li>
            <li id="biography-category" onclick="categorySelection(this.id)">Biography</li>
            <li id="comedy-category" onclick="categorySelection(this.id)">Comedy</li>
            <li id="crime-category" onclick="categorySelection(this.id)">Crime</li>
            <li id="documentary-category" onclick="categorySelection(this.id)">Documentary</li>
            <li id="drama-category" onclick="categorySelection(this.id)">Drama</li>
            <li id="family-category" onclick="categorySelection(this.id)">Family</li>
            <li id="fantasy-category" onclick="categorySelection(this.id)">Fantasy</li>
            <li id="horror-category" onclick="categorySelection(this.id)">Horror</li>
            <li id="musical-category" onclick="categorySelection(this.id)">Musical</li>
            <li id="mystery-category" onclick="categorySelection(this.id)">Mystery</li>
            <li id="romance-category" onclick="categorySelection(this.id)">Romance</li>
            <li id="sci-fi-category" onclick="categorySelection(this.id)">Sci-Fi</li>
            <li id="superhero-category" onclick="categorySelection(this.id)">Superhero</li>
            <li id="thriller-category" onclick="categorySelection(this.id)">Thriller</li>
            <li id="war-category" onclick="categorySelection(this.id)">War</li>
            <li id="western-category" onclick="categorySelection(this.id)">Western</li>
        </ul>
        <ul id="rating-list">
            <li id="all-ratings" onclick="ratingSelection(this.id)">All Ratings</li>
            <li id="G-rating" onclick="ratingSelection(this.id)">G</li>
            <li id="PG-rating" onclick="ratingSelection(this.id)">PG</li>
            <li id="PG-13-rating" onclick="ratingSelection(this.id)">PG-13</li>
            <li id="R-rating" onclick="ratingSelection(this.id)">R</li>
        </ul>
        <button id="order-title" class="order-button order-active" onclick="window.location.href='search.php'">Title <img
                    src="IMAGES/ICONS/arrow-up-dark.svg" alt="Arrow Up Icon"></button>
        <button id="order-year" class="order-button" onclick="window.location.href='search.php?order=year'">Year <img
                    src="IMAGES/ICONS/arrow-up-dark.svg" alt="Arrow Up Icon"></button>
    </div>

    <ul id="card-grid">

        <?php
        if (isset($_GET['order'])) {
            echo '
            <script>
              $("#order-title").removeClass("order-active");
              $("#order-year").addClass("order-active");
            </script>
            ';
            $moviedata = pg_query($connection, "SELECT * FROM movies WHERE available='true' ORDER BY year DESC ");
        } else {
            $moviedata = pg_query($connection, "SELECT * FROM movies WHERE available='true' ORDER BY title");
        }

        while ($row = pg_fetch_array($moviedata)) {

            echo '

            <li data-title="' . $row['title'] . '" data-year="' . $row['year'] . '" class="card card-small ' . $row['category'] . '-category ' . $row['rating'] . '-rating" onclick="menuclick(' . $ap . 'movie.php?id=' . $row['id'] . $ap . ')">
                <img class="card-item card-small-image" src="IMAGES/POSTERS/' . $row['poster'] . '" alt="Movie Poster">
                <div class="card-item card-small-bottom">
                    <h3>' . $row['title'] . '</h3>
                    <h3 style="display: none;">' . $row['actors'] . '</h3>
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