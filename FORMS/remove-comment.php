<?php

session_start();

require_once "../PARTS/connection.php";

$commentID = filter_input(INPUT_POST,'commentID', FILTER_VALIDATE_INT);

$sql = "DELETE FROM comments WHERE id = '".$commentID."'";
$ret = pg_query($connection, $sql);

$title = "comment removed";
$description = $_POST["comment"];
$date = date("Y-m-d");
$username = $_POST['username'];

$sql2 = "insert into public.notifications(title,description,date,username)values('" . $title . "','" . $description . "','" . $date . "','" . $username . "')";
$ret2 = pg_query($connection, $sql2);

header('location: ../edit-movie.php?id='.$_GET['id']);