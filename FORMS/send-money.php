<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["send"])) {

    $date = date("Y-m-d");
    $startuser = $_SESSION["username"];
    $endtuser = $_POST["username"];
    $type = "send";
    $amount = $_POST["amount"];

    $title = "Received from " . $_SESSION["username"];
    $description = $_POST["amount"] . "€";
    $username = $_POST["username"];

    $sql_user = "SELECT * FROM users WHERE username='$endtuser'";
    $res_user = pg_query($connection, $sql_user);

    if (pg_num_rows($res_user) == 0) {
        header('location: ../account.php?error=send-username');
    } else {

        $balance = pg_query($connection, "SELECT balance FROM users WHERE username='" . $_SESSION['username'] . "'");
        $balance = pg_fetch_array($balance)[0];
        $benduser = pg_query($connection, "SELECT balance FROM users WHERE username='" . $endtuser . "'");
        $benduser = pg_fetch_array($benduser)[0];

        $newbalance = $balance - $_POST["amount"];
        $newbenduser = $benduser + $_POST["amount"];

        if($newbalance>=0) {

            $sql3 = "UPDATE users SET balance='" . $newbalance . "' WHERE username='" . $_SESSION["username"] . "'";
            $ret3 = pg_query($connection, $sql3);

            $sql4 = "UPDATE users SET balance='" . $newbenduser . "' WHERE username='" . $endtuser . "'";
            $ret4 = pg_query($connection, $sql4);


        $sql = "insert into public.transactions(date,startuser,enduser,type,amount)values('" . $date . "','" . $startuser . "','" . $endtuser . "','" . $type . "','" . $amount . "')";
        $ret = pg_query($connection, $sql);

        $sql2 = "insert into public.notifications(title,description,date,username)values('" . $title . "','" . $description . "','" . $date . "','" . $username . "')";
        $ret2 = pg_query($connection, $sql2);

            if ($ret2) {
                header('location: ../account.php');
            } else {
                header('location: ../account.php?error=send');
            }

        } else {
            header('location: ../account.php?error=send-amount');
        }
    }
}