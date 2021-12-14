<?php
session_start();

if (!isset($_SESSION['logged']) && $_SESSION['admin'] != "t") {
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
    <link rel="stylesheet" href="CSS/add-movie.css">
</head>

<body>
<script>username = "<?php echo $_SESSION['username']?>"</script>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Admin</h1>

        <div id="add-movie-tab">
            <h2>Add Movie</h2>
            <form action="FORMS/add-movie.php" method="post" enctype="multipart/form-data">
                <div id="info-left-section">
                    <div id="info-image-frame">
                        <img id="info-image" src="" alt="Movie Poster" style="display: none;">
                        <label for="info-image-file" id="info-image-file-frame">
                            <input accept="image/*" type="file" name="poster" id="info-image-file" onchange="loadFile(event)" required>
                            <img id="edit-image-icon" src="IMAGES/ICONS/plus-dark.svg" alt="Edit Icon">
                        </label>
                    </div>
                    <ul id="ratings">
                        <li style="color: white">G</li>
                        <li>PG</li>
                        <li>PG-13</li>
                        <li>R</li>
                    </ul>
                    <input id="info-rating" name="rating" type="text" style="display: none;" value="G" required>
                </div>
                <div id="info-right-section">
                    <input id="movie-name" name="title" type="text" placeholder="Movie Title" required>
                    <select id="movie-category" name="category">
                        <option value="action">Action</option>
                        <option value="adventure">Adventure</option>
                        <option value="animation">Animation</option>
                        <option value="biography">Biography</option>
                        <option value="comedy">Comedy</option>
                        <option value="crime">Crime</option>
                        <option value="documentary">Documentary</option>
                        <option value="drama">Drama</option>
                        <option value="family">Family</option>
                        <option value="fantasy">Fantasy</option>
                        <option value="horror">Horror</option>
                        <option value="musical">Musical</option>
                        <option value="mystery">Mystery</option>
                        <option value="romance">Romance</option>
                        <option value="sci-fi">Sci-Fi</option>
                        <option value="superhero">Superhero</option>
                        <option value="thriller">Thriller</option>
                        <option value="war">War</option>
                        <option value="western">Western</option>
                    </select>
                    <input id="movie-actors" type="text" placeholder="Lead Actors" name="actors" required>
                    <input id="movie-year" type="text" placeholder="Year" name="year" required>
                    <textarea id="movie-description" name="description" id="" cols="30" rows="10" placeholder="Description"></textarea>
                    <div id="info-upload-section">
                            <div id="info-price">
                                <input type="number" step="0.01" max="10000" min="0" placeholder="Price" name="price" required>
                                <span>€</span>
                            </div>
                            <div id="info-percentage">
                                <input id="info-percentage-value" type="number" max="100" min="0" placeholder="Discount" name="discount">
                                <span>%</span>
                                <input type="checkbox" name="dactive" id="dactive">
                            </div>
                        </div>
                        <div id="info-bottom-section">
                            <label for="info-teaser-file" id="info-teaser-file-frame">
                                <input accept="video/mp4,video/x-m4v,video/*" type="file" id="info-teaser-file" name="teaser" required>
                                <h3>Upload Teaser</h3>
                            </label>
                            <label for="info-movie-file" id="info-movie-file-frame">
                                <input accept="video/mp4,video/x-m4v,video/*" type="file" id="info-movie-file" name="movie" required>
                                <h3>Upload Movie</h3>
                            </label>
                            <input id="info-button" type="submit" name="save" value="Save">
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