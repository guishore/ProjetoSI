<?php
session_start();
require_once "../PARTS/connection.php";

$sql5 = "UPDATE public.notifications SET read='t' WHERE (read='f' AND username='".$_SESSION['username']."')";
$ret5 = pg_query($connection, $sql5);