<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["register"])) {

    $name = filter_input(INPUT_POST,"name", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = strtolower($_POST['username']);
    $email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST,"phone", FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_input(INPUT_POST,"gender", FILTER_SANITIZE_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST,"country", FILTER_SANITIZE_SPECIAL_CHARS);
    $password = $_POST["password"];
    $cpassword = $_POST["confirm-password"];

    $sql_user = "SELECT * FROM users WHERE username='$username'";
    $sql_email = "SELECT * FROM users WHERE email='$email'";
    $res_user = pg_query($connection, $sql_user);
    $res_email = pg_query($connection, $sql_email);

    if (pg_num_rows($res_user) > 0) {
        header('location: ../login-register.php?error=register-username');
    }else if(pg_num_rows($res_email) > 0){
        header('location: ../login-register.php?error=register-email');
    }else if ($password != $cpassword) {
        header('location: ../login-register.php?error=register-cpwd');
    } else {

        if (isset($_FILES['picture'])) {
            $picturesplit = explode(".", $_FILES['picture']['name']);
            $picturefile = $username. "." . $picturesplit[1];
            move_uploaded_file($_FILES['picture']['tmp_name'], '../VIDEOS/MOVIES/' . $picturefile);
        } else{
            $picturefile = null;
        }

        $sql = "insert into public.users(name,username,password,email,phone,gender,country,picture)values('" . $name . "','" . $username . "','" . md5($password) . "','" . $email . "','" . $phone . "','" . $gender . "','" . $country . "','" . $picturefile . "')";
        $ret = pg_query($connection, $sql);

        if ($ret) {
            header('location: ../login-register.php');
        } else {
            header('location: ../login-register.php?error=register');
        }
    }

}