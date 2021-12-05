<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Admin</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/add-movie.css">
</head>

<body>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Admin</h1>

        <div id="add-movie-tab">
            <h2>Add Movie</h2>
            <form action="">
                <div id="info-left-section">
                    <div id="info-image-frame">
                        <img id="info-image" src="" alt="Movie Poster" style="display: none;">
                        <label for="info-image-file" id="info-image-file-frame">
                            <input accept="image/*" type="file" id="info-image-file" onchange="loadFile(event)">
                            <img id="edit-image-icon" src="IMAGES/ICONS/plus-dark.svg" alt="Edit Icon">
                        </label>
                    </div>
                    <ul id="ratings">
                        <li style="color: white">G</li>
                        <li>PG</li>
                        <li>PG-13</li>
                        <li>R</li>
                    </ul>
                    <input id="info-rating" type="text" style="display: none;" value="G">
                </div>
                <div id="info-right-section">
                    <input id="movie-name" type="text" placeholder="Movie Name">
                    <select id="movie-category">
                        <option value="drama">Action</option>
                        <option value="comedy">Adventure</option>
                        <option value="drama">Animation</option>
                        <option value="comedy">Biography</option>
                        <option value="drama">Comedy</option>
                        <option value="comedy">Crime</option>
                        <option value="drama">Documentary</option>
                        <option value="comedy">Drama</option>
                        <option value="drama">Family</option>
                        <option value="comedy">Fantasy</option>
                        <option value="drama">Horror</option>
                        <option value="comedy">Musical</option>
                        <option value="drama">Mystery</option>
                        <option value="comedy">Romance</option>
                        <option value="drama">Sci-Fi</option>
                        <option value="comedy">Superhero</option>
                        <option value="drama">Thriller</option>
                        <option value="comedy">War</option>
                        <option value="drama">Western</option>
                    </select>
                    <input id="movie-actors" type="text" placeholder="Lead Actors">
                    <textarea id="movie-description" name="" id="" cols="30" rows="10" placeholder="Description"></textarea>
                    <div id="info-upload-section">
                            <div id="info-price">
                                <input type="number" value="14.99" max="10000" min="0" placeholder="Price">
                                <span>€</span>
                            </div>
                            <div id="info-percentage">
                                <input id="info-percentage-value" type="number" value="40" max="100" min="0" placeholder="Discount">
                                <span>%</span>
                                <input type="checkbox">
                            </div>
                        </div>
                        <div id="info-bottom-section">
                            <label for="info-teaser-file" id="info-teaser-file-frame">
                                <input accept="video/mp4,video/x-m4v,video/*" type="file" id="info-teaser-file" onchange="loadFile(event)">
                                <h3>Upload Teaser</h3>
                            </label>
                            <label for="info-movie-file" id="info-movie-file-frame">
                                <input accept="video/mp4,video/x-m4v,video/*" type="file" id="info-movie-file" onchange="loadFile(event)">
                                <h3>Upload Movie</h3>
                            </label>
                            <input id="info-button" type="submit" value="Save">
                        </div>
                </div>
            </form>
        </div>

        <script>
            var loadFile = function(event) {
                var output = document.getElementById('info-image');
                output.src = URL.createObjectURL(event.target.files[0]);
                output.onload = function() {
                    URL.revokeObjectURL(output.src) // free memory
                }
                $("#info-image").css({
                    display: "block"
                });
                $("#edit-image-icon").attr("src", "IMAGES/ICONS/pencil-dark.svg");
            };
        </script>
        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>