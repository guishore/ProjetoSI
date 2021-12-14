<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["save"])) {

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

    $sql = "insert into public.movies(title, category, actors,description,price,discount,dactive,rating,year)values('" . $title . "','" . $category . "','" . $actors . "','" . $description . "','" . $price . "','" . $discount . "','" . $dactive . "','" . $rating . "','" . $year . "') returning id";

    $ret = pg_query($connection, $sql);

    $insert_row = pg_fetch_row($ret);
    $insertID = $insert_row[0];

    if (isset($_FILES['poster'])) {
        $postersplit = explode(".", $_FILES['poster']['name']);
        $posterfile = $insertID . "." . $postersplit[1];
        move_uploaded_file($_FILES['poster']['tmp_name'], '../IMAGES/POSTERS/' . $posterfile);
    }
    if (isset($_FILES['teaser'])) {
        $teasersplit = explode(".", $_FILES['teaser']['name']);
        $teaserfile = $insertID . "." . $teasersplit[1];
        move_uploaded_file($_FILES['teaser']['tmp_name'], '../VIDEOS/TEASERS/' . $teaserfile);
    }
    if (isset($_FILES['movie'])) {
        $moviesplit = explode(".", $_FILES['movie']['name']);
        $moviefile = $insertID . "." . $moviesplit[1];
        move_uploaded_file($_FILES['movie']['tmp_name'], '../VIDEOS/MOVIES/' . $moviefile);
    }

    $sql2 = "UPDATE movies SET poster='" . $posterfile . "' ,teaser='" . $teaserfile . "',movie='" . $moviefile . "' WHERE id='" . $insertID . "'";

    $ret2 = pg_query($connection, $sql2);

    if ($ret2) {
        header('location: ../admin.php');
    } else {
        header('location: ../admin.php?error=upload');
    }

}