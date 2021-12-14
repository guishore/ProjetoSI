<?php
session_start();

if (!isset($_SESSION['logged']) || $_SESSION['admin'] != "t") {
    header('Location: login-register.php');
}

require_once "PARTS/connection.php";

$userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");

$data = pg_fetch_array($userdata);
$balance = number_format((float)$data['balance'], 2, '.', '');

$id = $_GET["id"];

$moviedata = pg_query($connection, "SELECT * FROM movies WHERE id = '" . $id . "'");

$movie = pg_fetch_array($moviedata);

$commentsdata = pg_query($connection, "SELECT * FROM comments WHERE movie_id='" . $_GET['id'] . "'");
$comments = pg_fetch_all($commentsdata);
$commentsNumber = count($comments);

?>

<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Admin</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/edit-movie.css">
</head>

<body>
<script>username = "<?php echo $_SESSION['username']?>"</script>

<?php include("PARTS/menu-bar.php"); ?>
<?php include("PARTS/notification-tab.php"); ?>

<div id="primary-area">

    <h1 id="page-title">Admin</h1>

    <div id="main-tab">

        <div id="edit-tab">
            <h2>Info & Pricing</h2>
            <form action="FORMS/edit-movie.php?id=<?php echo $id ?>" method="post" enctype="multipart/form-data">
                <div id="info-left-section">
                    <div id="info-image-frame">
                        <img id="info-image" src="IMAGES/POSTERS/<?php echo $movie['poster'] ?>"
                             alt="Movie Poster">
                        <label for="info-image-file" id="info-image-file-frame">
                            <input accept="image/*" type="file" id="info-image-file" name="poster"
                                   onchange="loadFile(event)">
                            <input type="text" name="oldposter" value="<?php echo $movie['poster'] ?>"
                                   style="display: none">
                            <img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon">
                        </label>
                    </div>
                    <ul id="ratings">
                        <?php
                        if ($movie['rating'] == "G") {
                            echo '
                            <li style="color: white">G</li>';
                        } else {
                            echo '
                                <li>G</li>';
                        }
                        if ($movie['rating'] == "PG") {
                            echo '
                            <li style="color: white">PG</li>';
                        } else {
                            echo '
                                <li>PG</li>';
                        }
                        if ($movie['rating'] == "PG-13") {
                            echo '
                            <li style="color: white">PG-13</li>';
                        } else {
                            echo '
                                <li>PG-13</li>';
                        }
                        if ($movie['rating'] == "R") {
                            echo '
                            <li style="color: white">R</li>';
                        } else {
                            echo '
                                <li>R</li>';
                        }
                        ?>
                    </ul>
                    <input id="info-rating" type="text" style="display: none;" value="<?php echo $movie['rating'] ?>" name="rating" required>
                </div>
                <div id="info-right-section">
                    <input id="movie-name" type="text" value="<?php echo $movie['title'] ?>" placeholder="Movie Title"
                           name="title" required>
                    <select id="movie-category" name="category">
                        <option id="action-category" value="action">Action</option>
                        <option id="adventure-category" value="adventure">Adventure</option>
                        <option id="animation-category" value="animation">Animation</option>
                        <option id="biography-category" value="biography">Biography</option>
                        <option id="comedy-category" value="comedy">Comedy</option>
                        <option id="crime-category" value="crime">Crime</option>
                        <option id="documentary-category" value="documentary">Documentary</option>
                        <option id="drama-category" value="drama">Drama</option>
                        <option id="family-category" value="family">Family</option>
                        <option id="fantasy-category" value="fantasy">Fantasy</option>
                        <option id="horror-category" value="horror">Horror</option>
                        <option id="musical-category" value="musical">Musical</option>
                        <option id="mystery-category" value="mystery">Mystery</option>
                        <option id="romance-category" value="romance">Romance</option>
                        <option id="sci-fi-category" value="sci-fi">Sci-Fi</option>
                        <option id="superhero-category" value="superhero">Superhero</option>
                        <option id="thriller-category" value="thriller">Thriller</option>
                        <option id="war-category" value="war">War</option>
                        <option id="western-category" value="western">Western</option>
                    </select>
                    <?php
                    echo '
                    
                    <script>
                        $("#'.$movie['category'].'-category").prop("selected", true);
                    </script>
                    
                    ';
                    ?>
                    <input id="movie-actors" type="text" value="<?php echo $movie['actors'] ?>"
                           placeholder="Lead Actors" name="actors" required>
                    <input id="movie-year" type="text" placeholder="Year" value="<?php echo $movie['year'] ?>" name="year" required>
                    <textarea name="description" id="movie-description" name="" id="" cols="30" rows="10"
                              placeholder="Description" required><?php echo $movie['description'] ?></textarea>
                    <div id="info-upload-section">
                        <div id="info-price">
                            <input type="number" step="0.01" value="<?php echo round($movie['price'],2) ?>" max="10000" min="0"
                                   placeholder="Price" name="price" required>
                            <span>€</span>
                        </div>
                        <div id="info-percentage">
                            <input id="info-percentage-value" type="number" value="<?php echo $movie['discount'] ?>"
                                   max="100" min="0" placeholder="Discount" name="discount" required>
                            <span>%</span>
                            <?php

                            if ($movie['dactive'] == "t") {
                                echo '<input type="checkbox" class="active" value="true" checked name="dactive">';
                            } else {
                                echo '<input type="checkbox" value="true" name="dactive">';
                            }

                            ?>

                        </div>
                    </div>
                    <div id="info-bottom-section">
                        <label for="info-teaser-file" id="info-teaser-file-frame">
                            <input accept="video/mp4,video/x-m4v,video/*" type="file" id="info-teaser-file"
                                   value="<?php echo $movie['teaser'] ?>" name="teaser">
                            <h3>Upload Teaser</h3>
                        </label>
                        <label for="info-movie-file" id="info-movie-file-frame">
                            <input accept="video/mp4,video/x-m4v,video/*" type="file" id="info-movie-file"
                                   value="<?php echo $movie['movie'] ?>" name="movie">
                            <h3>Upload Movie</h3>
                        </label>
                        <input type="text" name="oldteaser" value="<?php echo $movie['teaser'] ?>"
                               style="display: none">
                        <input type="text" name="oldmovie" value="<?php echo $movie['movie'] ?>" style="display: none">
                        <input id="info-button" type="submit" name="save" value="Save">
                    </div>
                </div>
            </form>
        </div>

        <div id="edit-right-section">

            <div id="comments-tab">
                <h2>Comments</h2>
                <ul>

                    <?php

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
                        
                            <li>
                                <div class="comment-top-line">
                                    <h3>' . $row['name'] . '</h3>
                                    <p>' . $date . '</p>
                                </div>
                                <p>' . $row['comment'] . '</p>
                                <form action="FORMS/remove-comment.php?id=' . $_GET['id'] . '" method="post">
                                    <input type="number" value="' . $row['id'] . '" name="commentID" style="display:none;">
                                    <input type="text" value="' . $row['username'] . '" name="username" style="display:none;">
                                    <input type="text" value="' . $row['comment'] . '" name="comment" style="display:none;">
                                    <label class="comment-delete-button"><input type="submit" name="remove" value=""><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></label>
                                </form>
                            </li>
                        
                        ';
                    }

                    ?>

                </ul>

            </div>

        </div>

    </div>

    <script src="JS/notifications.js"></script>
    <script src="JS/main.js"></script>

</div>

</body>

</html>