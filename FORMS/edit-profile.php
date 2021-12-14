<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["save"])) {

    if ($_FILES['movie']['name'] != "") {
        $picturesplit = explode(".", $_FILES['movie']['name']);
        $picturefile = $_GET["id"] . "." . $picturesplit[1];
        move_uploaded_file($_FILES['picture']['tmp_name'], '../IMAGES/PROFILE/' . $picturefile);
    } else {
        $picturefile = $_POST["hiddenPicture"];
    }

    $name = filter_input(INPUT_POST,"name", FILTER_SANITIZE_SPECIAL_CHARS);
    $username = strtolower($_POST['username']);
    $email = filter_input(INPUT_POST,"email",FILTER_VALIDATE_EMAIL);
    $phone = filter_input(INPUT_POST,"phone", FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_input(INPUT_POST,"gender", FILTER_SANITIZE_SPECIAL_CHARS);
    $country = filter_input(INPUT_POST,"country", FILTER_SANITIZE_SPECIAL_CHARS);

    $userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");
    $data = pg_fetch_array($userdata);

    $sql_user = "SELECT * FROM users WHERE username='$username'";
    $res_user = pg_query($connection, $sql_user);
    $sql_email = "SELECT * FROM users WHERE email='$email'";
    $res_email = pg_query($connection, $sql_email);

    if (pg_num_rows($res_user) > 0 && $username != $_SESSION['username']) {
        header('location: ../settings.php?error=username-taken');
    } elseif (pg_num_rows($res_email) > 0 && $email != $data['email']) {
        header('location: ../settings.php?error=email-taken');
    } else {

        $sql = "UPDATE users SET name='" . $name . "', username='" . $username . "', email='" . $email . "', phone='" . $phone . "' ,gender='" . $gender . "',country='" . $country . "', picture='" . $picturefile . "'WHERE username='" . $_SESSION['username'] . "'";
        $ret = pg_query($connection, $sql);


        if ($username != $_SESSION['username']) {

            $sql2 = "UPDATE follows SET startuser='" . $username . "'WHERE startuser='" . $_SESSION['username'] . "'";
            $ret = pg_query($connection, $sql2);

            $sql3 = "UPDATE follows SET enduser='" . $username . "'WHERE enduser='" . $_SESSION['username'] . "'";
            $ret = pg_query($connection, $sql3);

            $sql4 = "UPDATE notifications SET username='" . $username . "'WHERE username='" . $_SESSION['username'] . "'";
            $ret = pg_query($connection, $sql4);

            $sql5 = "UPDATE transactions SET startuser='" . $username . "'WHERE startuser='" . $_SESSION['username'] . "'";
            $ret = pg_query($connection, $sql5);

            $sql6 = "UPDATE transactions SET enduser='" . $username . "'WHERE enduser='" . $_SESSION['username'] . "'";
            $ret = pg_query($connection, $sql6);

            $sql7 = "UPDATE purchases SET username='" . $username . "'WHERE username='" . $_SESSION['username'] . "'";
            $ret = pg_query($connection, $sql7);

            $sql8 = "UPDATE wishlist SET username='" . $username . "'WHERE username='" . $_SESSION['username'] . "'";
            $ret = pg_query($connection, $sql8);
        }

        $_SESSION['username'] = $username;


        if ($ret) {
            header('location: ../settings.php');
        } else {
            header('location: ../settings.php?error=unknown');
        }

    }


}