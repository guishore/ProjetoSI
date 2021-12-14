<?php

session_start();

require_once "../PARTS/connection.php";

$sql = "UPDATE users SET watching='false' WHERE username='" . $_SESSION["username"] . "'";
$ret = pg_query($connection, $sql);