<?php

session_start();

require_once "../PARTS/connection.php";

$sql = "DELETE FROM wishlist WHERE movie_id = '".$_GET['id']."' AND username = '".$_SESSION['username']."'";
$ret = pg_query($connection, $sql);

