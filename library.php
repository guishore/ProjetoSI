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

        <div id="search-bar">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search"><img id="search-bar-icon" src="IMAGES/ICONS/search-dark.svg" alt="Search Icon">
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
                <li id="g-rating" onclick="ratingSelection(this.id)">G</li>
                <li id="pg-rating" onclick="ratingSelection(this.id)">PG</li>
                <li id="pg-13-rating" onclick="ratingSelection(this.id)">PG-13</li>
                <li id="r-rating" onclick="ratingSelection(this.id)">R</li>
            </ul>
        </div>

        <ul id="card-grid">

            <li class="card card-medium drama-category r-rating">
                <img class="card-item card-medium-image" src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster">
                <div class="card-item card-medium-bottom">
                    <h3>Joker</h3>
                    <h3 style="display: none;">Joaquin Phoenix, Robert De Niro</h3>
                    <ul class="card-medium-action-buttons">
                        <li><img class="play-button" src="IMAGES/ICONS/play-dark.svg" alt="Play Icon"></li>
                    </ul>
                </div>
            </li>

            <li class="card card-medium romance-category comedy-category r-rating">
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