<?php

session_start();

require_once "../PARTS/connection.php";

$sql = "UPDATE users SET watching='true', watching_id='" . $_GET['id'] . "' WHERE username='" . $_SESSION["username"] . "'";
$ret = pg_query($connection, $sql);
