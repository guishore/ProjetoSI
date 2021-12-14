<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["save"])) {

    if ($_FILES['poster']['name'] != "") {
        $postersplit = explode(".", $_FILES['poster']['name']);
        $posterfile = $_GET["id"] .".". $postersplit[1];
        move_uploaded_file($_FILES['poster']['tmp_name'], '../IMAGES/POSTERS/' . $posterfile);
    } else {
        $posterfile = $_POST["oldposter"];
    }

    if ($_FILES['teaser']['name'] != "") {
        $teasersplit = explode(".", $_FILES['teaser']['name']);
        $teaserfile = $_GET["id"] .".". $teasersplit[1];
        move_uploaded_file($_FILES['teaser']['tmp_name'], '../VIDEOS/TEASERS/' . $teaserfile);
    } else {
        $teaserfile = $_POST["oldteaser"];
    }

    if ($_FILES['movie']['name'] != "") {
        $moviesplit = explode(".", $_FILES['movie']['name']);
        $moviefile = $_GET["id"] .".". $moviesplit[1];
        move_uploaded_file($_FILES['movie']['tmp_name'], '../VIDEOS/MOVIES/' . $moviefile);
    } else {
        $moviefile = $_POST["oldmovie"];
    }

    $rating = filter_input(INPUT_POST, "rating", FILTER_SANITIZE_SPECIAL_CHARS);
    $title =  filter_input(INPUT_POST, "title", FILTER_SANITIZE_SPECIAL_CHARS);
    $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS);
    $actors = filter_input(INPUT_POST,"actors", FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST,"description", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST,"price", FILTER_VALIDATE_FLOAT);
    $discount = filter_input(INPUT_POST,"discount", FILTER_VALIDATE_FLOAT);
    $year = filter_input(INPUT_POST,"year", FILTER_VALIDATE_INT);

    if (!isset($_POST["dactive"])) {
        $dactive = "f";
    } else {
        $dactive = $_POST["dactive"];
    }

    $sql = "UPDATE movies SET title='" . $title . "', category='" . $category . "', actors='" . $actors . "', description='" . $description . "' ,price='" . $price . "',discount='" . $discount . "', dactive='" . $dactive . "', rating='" . $rating . "', poster='" . $posterfile . "' ,teaser='" . $teaserfile . "',movie='" . $moviefile . "',year='" . $year . "' WHERE id='" . $_GET['id'] . "'";
    $ret = pg_query($connection, $sql);


    if ($ret) {
        header('location: ../edit-movie.php?id=' . $_GET["id"]);
    } else {
        header('location: ../edit-movie.php?error=upload&id=' . $_GET["id"]);
    }

}