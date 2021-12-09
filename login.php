<div></div>
<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Home</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/login-register.css">
</head>

<body>

    <div id="login-tab" class="main-tab">

        <form class="top-section">
            <h1>LDMovies</h1>
            <input type="text" placeholder="username">
            <input type="password" placeholder="password">
            <input type="submit" value="Login">
        </form>

        <div class="bottom-section">
            <h2>Don't have an account?</h2>
            <button onclick="loginRegisterButton('#register-tab')">Register</button>
        </div>

    </div>
    
    <div id="register-tab" class="main-tab">

        <form class="top-section" class="main-tab">
            <h1>LDMovies</h1>
            <input type="text" placeholder="name">
            <input type="text" placeholder="username">
            <input type="email" placeholder="email">
            <input type="text" placeholder="phone">
            <input type="text" placeholder="country">
            <input type="password" placeholder="password">
            <input type="confirm password" placeholder="confirm password">
            <input type="submit" value="Register">
        </form>

        <div class="bottom-section">
            <h2>Already have an account?</h2>
            <button onclick="loginRegisterButton('#login-tab')">Login</button>
        </div>

    </div>

    <script src="JS/main.js"></script>

</body>

</html>