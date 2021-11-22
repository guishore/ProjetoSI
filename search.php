<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Search</title>
    <?php include("PARTS/head-tag.php"); ?>
</head>

<body>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Search</h1>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search"><img id="search-bar-icon" src="IMAGES/ICONS/search-dark.svg" alt="Search Icon">

        <ul id="card-grid">

            <li class="card card-small">
                <img class="card-item card-small-image" src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster">
                <div class="card-item card-small-bottom">
                    <h3>Joker</h3>
                    <h3 style="display: none;">Joaquin Phoenix, Robert De Niro</h3>
                </div>
            </li>

            <li class="card card-small">
                <img class="card-item card-small-image" src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster">
                <div class="card-item card-small-bottom">
                    <h3>The French Dispatch</h3>
                    <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                </div>
            </li>

        </ul>

        <script src="JS/cards.js"></script>
        <script src="JS/search.js"></script>
        <script src="JS/notifications.js"></script>

    </div>

</body>

</html>