<?php

session_start();

if (!in_array($_GET['id'], $_SESSION['movies'])) {
    array_push($_SESSION['movies'], $_GET['id']);
}