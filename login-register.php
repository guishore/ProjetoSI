<!DOCTYPE html>
<html>

<head>
    <title>LDMovies</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/login-register.css">
</head>

<body>

<div id="login-tab" class="main-tab">

    <form class="top-section" action="FORMS/login.php" method="post">
        <h1>LDMovies</h1>
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" name="login" value="Login">
        <h4 id="login-error"></h4>
    </form>

    <div class="bottom-section">
        <h2>Don't have an account?</h2>
        <button onclick="loginRegisterButton('#register-tab')">Register</button>
    </div>

</div>

<div id="register-tab" class="main-tab">

    <form class="top-section" action="FORMS/register.php" method="post" enctype="multipart/form-data">
        <h1>LDMovies</h1>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="username" maxlength="12" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="non-binary">Non-Binary</option>
            <option value="prefer-not-to-say">Prefer not to say</option>
        </select>
        <select type="text" name="country" required>
            <?php include('PARTS/country-list.php') ?>
        </select>
        <input type="tel" name="phone" placeholder="Phone" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm-password" placeholder="Confirm Password" required>
        <label for="profile-picture" id="profile-picture-frame">
            <input accept="image/*" id="profile-picture" type="file" name="picture" required>
            <h3>Upload Profile Picture</h3>
        </label>
        <input type="submit" name="register" value="Register">
        <h4 id="register-error"></h4>
    </form>

    <div class="bottom-section">
        <h2>Already have an account?</h2>
        <button onclick="loginRegisterButton('#login-tab')">Login</button>
    </div>

</div>

<?php

if (isset($_GET['error'])) {
    if ($_GET['error'] == 'login-username') {
        echo '<script>
                $("#login-error").text("Username not registered");
                </script>';
    } elseif ($_GET['error'] == 'login-password') {
        echo '<script>
                $("#login-error").text("Wrong password");
                </script>';
    } elseif ($_GET['error'] == 'register') {
        echo '<script>
                $("#login-tab").css({display: "none"});
                $("#register-tab").css({display: "block"});
                $("#register-error").text("Unknown error");
                </script>';
    } elseif ($_GET['error'] == 'register-cpwd') {
        echo '<script>
                $("#login-tab").css({display: "none"});
                $("#register-tab").css({display: "block"});
                $("#register-error").text("Passwords do not match");
                </script>';
    } elseif ($_GET['error'] == 'register-username') {
        echo '<script>
                $("#login-tab").css({display: "none"});
                $("#register-tab").css({display: "block"});
                $("#register-error").text("Username taken");
                </script>';
    } elseif ($_GET['error'] == 'register-email') {
        echo '<script>
                $("#login-tab").css({display: "none"});
                $("#register-tab").css({display: "block"});
                $("#register-error").text("Email already in use");
                </script>';
    }
}

?>

<script src="JS/main.js"></script>

</body>

</html>