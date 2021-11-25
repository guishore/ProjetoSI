<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | My Library</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/admin.css">
</head>

<body>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Admin</h1>

        <ul id="line-list">

            <h2>Movie List</h2>

            <div id="search-bar">
                <input type="text" id="myInput" onkeyup="myFunctionAdmin()" placeholder="Search">
                <img id="search-bar-icon" src="IMAGES/ICONS/search-dark.svg" alt="Search Icon">
                <button id="add-movie-button"><img src="IMAGES/ICONS/plus-dark.svg" alt="Plus Icon"> Add Movie</button>
            </div>

            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">Joker</h3>
                        <h3 style="display: none;">Joaquin Phoenix, Robert De Niro</h3>
                        <div class="line-list-price">
                            <h3>14.99</h3>
                        </div>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-edit-button"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">The French Dispatch</h3>
                        <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                        <div class="line-list-price-discount">
                            <h3 class="line-list-discounted-price">14.99€</h3>
                            <h3 class="line-list-current-price">8.99€</h3>
                        </div>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-edit-button"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">Joker</h3>
                        <h3 style="display: none;">Joaquin Phoenix, Robert De Niro</h3>
                        <div class="line-list-price">
                            <h3>14.99</h3>
                        </div>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-edit-button"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">The French Dispatch</h3>
                        <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                        <div class="line-list-price-discount">
                            <h3 class="line-list-discounted-price">14.99€</h3>
                            <h3 class="line-list-current-price">8.99€</h3>
                        </div>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-edit-button"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">Joker</h3>
                        <h3 style="display: none;">Joaquin Phoenix, Robert De Niro</h3>
                        <div class="line-list-price">
                            <h3>14.99</h3>
                        </div>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-edit-button"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">The French Dispatch</h3>
                        <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                        <div class="line-list-price-discount">
                            <h3 class="line-list-discounted-price">14.99€</h3>
                            <h3 class="line-list-current-price">8.99€</h3>
                        </div>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-edit-button"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">Joker</h3>
                        <h3 style="display: none;">Joaquin Phoenix, Robert De Niro</h3>
                        <div class="line-list-price">
                            <h3>14.99</h3>
                        </div>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-edit-button"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

            <li class="line-list-item">
                <div class="line-list-image-frame"><img src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster"></div>
                <div class="line-list-right-section">
                    <div class="line-list-top-line">
                        <h3 class="line-list-title">The French Dispatch</h3>
                        <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                        <div class="line-list-price-discount">
                            <h3 class="line-list-discounted-price">14.99€</h3>
                            <h3 class="line-list-current-price">8.99€</h3>
                        </div>
                    </div>
                    <ul class="line-list-action-buttons">
                        <li class="line-list-edit-button"><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon"></li>
                        <li class="line-list-delete-button"><img src="IMAGES/ICONS/trash-white.svg" alt="Delete Icon"><span>Add to cart</span></li>
                    </ul>
                </div>
            </li>

        </ul>

        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>
        <script src="JS/search.js"></script>

    </div>

</body>

</html>