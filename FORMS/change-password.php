<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["save"])) {

    $oldpassword = md5($_POST["old_password"]);
    $newpassword = md5($_POST["new_password"]);
    $confirmpassword = md5($_POST["confirm_password"]);

    $userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");
    $data = pg_fetch_array($userdata);

    if ($oldpassword != $data['password']) {
        header('location: ../settings.php?error=wrong-password');
    } elseif ($newpassword != $confirmpassword) {
        header('location: ../settings.php?error=wrong-match');
    } else {

        $sql = "UPDATE users SET password='" . $newpassword . "' WHERE username='" . $_SESSION['username'] . "'";
        $ret = pg_query($connection, $sql);

        if ($ret) {
            header('location: ../settings.php');
        } else {
            header('location: ../settings.php?error=unknown');
        }

    }



}
