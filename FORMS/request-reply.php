<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["result"])) {

    if ($_POST["result"] == "Accept") {

        $balance = pg_query($connection, "SELECT balance FROM users WHERE username='" . $_SESSION['username'] . "'");
        $balance = pg_fetch_array($balance)[0];
        $bstartuser = pg_query($connection, "SELECT balance FROM users WHERE username='" . $_POST["startuser"] . "'");
        $bstartuser = pg_fetch_array($bstartuser)[0];

        $newbalance = $balance - $_POST["amount"];
        $newbstartuser = $bstartuser + $_POST["amount"];

        if($newbalance>=0) {

            $sql3 = "UPDATE users SET balance='" . $newbalance . "' WHERE username='" . $_SESSION["username"] . "'";
            $ret3 = pg_query($connection, $sql3);

            $sql4 = "UPDATE users SET balance='" . $newbstartuser . "' WHERE username='" . $_POST["startuser"] . "'";
            $ret4 = pg_query($connection, $sql4);

            $state = "accepted";
        } else{
            $state = "pending";
        }
    } elseif ($_POST["result"] == "Deny") {
        $state = "denied";
    } elseif ($_POST["result"] == "Cancel") {
        $state = "canceled";
    } else {
        $state = "pending";
    }

    $title = "request " . $state;
    $description = $_POST["amount"] . "€";
    $date = date("Y-m-d");
    if(isset($_POST["startuser"])) $username = $_POST["startuser"];

    $sql = "UPDATE transactions SET state='" . $state . "' WHERE id='" . $_POST["id"] . "'";
    $ret = pg_query($connection, $sql);

    if ($state == "accepted" || $state == "denied") {
        $sql2 = "insert into public.notifications(title,description,date,username)values('" . $title . "','" . $description . "','" . $date . "','" . $username . "')";
        $ret2 = pg_query($connection, $sql2);

        if ($ret2) {
            header('location: ../account.php');
        } else {
            header('location: ../account.php?error=request-reply');
        }
    } else {
        if ($ret) {
            header('location: ../account.php');
        } else {
            header('location: ../account.php?error=request-reply');
        }
    }



}