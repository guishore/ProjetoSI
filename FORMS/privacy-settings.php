<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["save"])) {

    $oldpassword = md5($_POST["old_password"]);
    $newpassword = md5($_POST["new_password"]);
    $confirmpassword = md5($_POST["confirm_password"]);

    if (!isset($_POST["private"])) {
        $private = "f";
    } else {
        $private = $_POST["private"];
    }

    if (isset($_POST["hide_info"])) {
        $info = date("Y-m-d H:i:s");
    } else {
        $info = "2010-10-10 10:10:10";
    }

    $sql = "UPDATE users SET private_profile ='" . $private . "', hide_watch_info ='" . $info . "' WHERE username='" . $_SESSION['username'] . "'";
    $ret = pg_query($connection, $sql);

    if ($ret) {
        header('location: ../settings.php');
    } else {
        header('location: ../settings.php?error=unknown');
    }


}
