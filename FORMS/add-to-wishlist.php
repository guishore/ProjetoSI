<?php

session_start();

require_once "../PARTS/connection.php";

$sql = "insert into public.wishlist(movie_id,username)values('" . $_GET['id'] . "','" . $_SESSION['username'] . "')";
$ret = pg_query($connection, $sql);

