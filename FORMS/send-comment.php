<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["post"])) {

    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $picture = $_POST["picture"];
    $movieID = $_GET['id'];
    $date = date("Y-m-d");;

        $sql = "insert into public.comments(name,comment,picture,movie_id,date,username)values('" . $name . "','" . $comment . "','" . $picture . "','" . $movieID . "','" . $date . "','" . $_SESSION['username'] . "')";
        $ret = pg_query($connection, $sql);

        if ($ret) {
            header('location: ../movie.php?id='.$_GET['id']);
        } else {
            header('location: ../movie.php?error=comment&id='.$_GET['id']);
        }

}