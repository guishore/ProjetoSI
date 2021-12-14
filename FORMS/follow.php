<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["follow"])) {
    $enduser = strtolower($_POST["username"]);

    $sql_user = "SELECT * FROM follows WHERE startuser='".$_SESSION['username']."' AND enduser='$enduser'";
    $res_user = pg_query($connection, $sql_user);
    $result = pg_fetch_array($res_user);

    $userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $enduser . "'");
    $data = pg_fetch_array($userdata);

    if (pg_num_rows($res_user) > 0) {
        header('location: ../account.php?error=already-following');
    } elseif ($enduser == $_SESSION['username']) {
        header('location: ../account.php?error=self');
    } elseif ($data['private_profile'] == "t") {
        header('location: ../account.php?error=private');
    } else {

        $sql = "insert into public.follows(startuser,enduser)values('" . $_SESSION['username'] . "','" . $enduser . "')";
        $ret = pg_query($connection, $sql);

        if ($ret) {
            header('location: ../account.php');
        } else {
            header('location: ../account.php?error=follow');
        }
    }
}