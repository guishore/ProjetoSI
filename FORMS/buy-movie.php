<?php

session_start();

require_once "../PARTS/connection.php";

if (isset($_POST["checkout"])) {

    $balance = filter_input(INPUT_POST, "balance", FILTER_VALIDATE_FLOAT);
    $total = filter_input(INPUT_POST, "total", FILTER_VALIDATE_FLOAT);

    if ($total < $balance) {

        for ($i = 0; $i < count($_SESSION['movies']); $i++) {

            $movieID = $_SESSION['movies'][$i];

            $sql = "insert into public.purchases(movie_id,username)values('" . $movieID . "','" . $_SESSION['username'] . "')";
            $ret = pg_query($connection, $sql);

            $sql2 = "DELETE FROM wishlist WHERE movie_id = '".$_GET['id']."' AND username = '".$_SESSION['username']."'";
            $ret = pg_query($connection, $sql2);
        }

        $newbalance = $balance - $total;

        if ($newbalance >= 0) {
            $sql3 = "UPDATE users SET balance='" . $newbalance . "' WHERE username='" . $_SESSION["username"] . "'";
            $ret3 = pg_query($connection, $sql3);
        }

        $_SESSION['movies'] = array();
        header('location: ../library.php');
    } else {
        header('location: ../library.php?error=purchase');
    }
}
