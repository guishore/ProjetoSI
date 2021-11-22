<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | My Library</title>
    <?php include("PARTS/head-tag.php"); ?>
    
</head>

<body>

    <script>
        $(document).ready(function() {
            document.getElementById("library-icon").src = "IMAGES/ICONS/folder-full-white.svg";
        });
    </script>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">My Library</h1>

        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search"><img id="search-bar-icon" src="IMAGES/ICONS/search-dark.svg" alt="Search Icon">

        <ul id="card-grid">

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>Joker</h3>
                    <h3 style="display: none;">Joaquin Phoenix, Robert De Niro</h3>
                    <ul class="card-medium-action-buttons">
                        <li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>
                    </ul>
                </div>
            </li>

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>The French Dispatch</h3>
                    <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                    <ul class="card-medium-action-buttons">
                        <li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>
                    </ul>
                </div>
            </li>

            <li class="card card-medium">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>The French Dispatch</h3>
                    <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                    <ul class="card-medium-action-buttons">
                        <li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>
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