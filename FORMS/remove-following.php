<?php

session_start();

require_once "../PARTS/connection.php";

$enduser = filter_input(INPUT_POST,'enduser', FILTER_SANITIZE_SPECIAL_CHARS);
$enduser = strtolower($enduser);

$sql = "DELETE FROM follows WHERE startuser = '". $_SESSION['username'] ."' AND enduser ='". $enduser ."'";
$ret = pg_query($connection, $sql);

header('location: ../account.php');