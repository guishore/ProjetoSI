<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST['login'])) {

    $username = strtolower($_POST['username']);
    $hashpassword = md5($_POST['password']);

    $sql_user = "SELECT * FROM users WHERE username='$username'";
    $res_user = pg_query($connection, $sql_user);

    if (pg_num_rows($res_user) == 0) {
        header('location: ../login-register.php?error=login-username');
    } else {

        $sql = "select * from public.users where username = '" . $username . "' and password ='" . $hashpassword . "'";

        $data = pg_query($connection, $sql);
        $userdata = pg_fetch_array($data);
        $admin = $userdata['admin'];
        $login_check = pg_num_rows($data);

        if ($login_check > 0) {

            $_SESSION['logged'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['admin'] = $admin;
            $_SESSION['movies']=array();

            header('location: ../index.php');
        } else {
            header('location: ../login-register.php?error=login-password');
        }
    }
} else {
    header('location: ../login-register.php?error=login');
}