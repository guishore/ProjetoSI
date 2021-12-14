<?php

session_start();

$id = $_POST['id'];

\array_splice($_SESSION['movies'], $id, 1);

header('location: ../shopping-cart.php');
