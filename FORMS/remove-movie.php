<?php

session_start();

require_once "../PARTS/connection.php";

$id = filter_input(INPUT_POST,'id', FILTER_VALIDATE_INT);

$sql = "UPDATE movies SET available='false' WHERE id='" . $id . "'";
$ret = pg_query($connection, $sql);

header('location: ../admin.php');


