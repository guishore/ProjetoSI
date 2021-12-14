<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["add-balance"])) {

    $date = date("Y-m-d");
    $startuser = $_SESSION["username"];
    $type = "add";
    $amount = filter_input(INPUT_POST,"amount", FILTER_VALIDATE_FLOAT);

    $balance = pg_query($connection, "SELECT balance FROM users WHERE username='" . $_SESSION['username'] . "'");

    $balance = pg_fetch_array($balance)[0];

    if (isset($_POST["amount"])) {
        $newBalance = $balance + $_POST["amount"];
    } else {
        $newBalance = $balance;
    }

    $sql = "UPDATE users SET balance='" . $newBalance . "' WHERE username='" . $_SESSION['username'] . "'";
    $ret = pg_query($connection, $sql);

    $sql2 = "insert into public.transactions(date,startuser,type,amount)values('" . $date . "','" . $startuser . "','" . $type . "','" . $amount . "')";
    $ret2 = pg_query($connection, $sql2);

    if ($ret2) {
        header('location: ../account.php');
    } else {
        header('location: ../account.php?error=add');
    }

}