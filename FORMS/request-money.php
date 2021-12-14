<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["request"])) {

    $date = date("Y-m-d");
    $startuser = $_SESSION["username"];
    $endtuser = $_POST["username"];
    $type = "request";
    $state = "pending";
    $amount = $_POST["amount"];

    $title = "Request from " . $_SESSION["username"];
    $description = $_POST["amount"] . "€";
    $username = $_POST["username"];

    $sql_user = "SELECT * FROM users WHERE username='$endtuser'";
    $res_user = pg_query($connection, $sql_user);

    if (pg_num_rows($res_user) == 0) {
        header('location: ../account.php?error=request-username');
    } else {

        $sql = "insert into public.transactions(date,startuser,enduser,type,state,amount)values('" . $date . "','" . $startuser . "','" . $endtuser . "','" . $type . "','" . $state . "','" . $amount . "')";
        $ret = pg_query($connection, $sql);

        $sql2 = "insert into public.notifications(title,description,date,username)values('" . $title . "','" . $description . "','" . $date . "','" . $username . "')";
        $ret2 = pg_query($connection, $sql2);

        if ($ret2) {
            header('location: ../account.php');
        } else {
            header('location: ../account.php?error=request');
        }
    }
}