<?php

$str = "dbname=postgres user=postgres password=postgres host=localhost port=5432";

$connection = pg_connect($str);

if (!$connection) {
    die("Connection Error");
}