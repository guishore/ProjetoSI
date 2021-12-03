<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Admin</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/admin-edit.css">
</head>

<body>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Admin</h1>

        <div id="main-tab">

            <div id="edit-tab">
                <h2>Info & Pricing</h2>
            </div>

            <div id="comments-tab">
                <h2>Comments</h2>

            </div>

            <div id="stats-tab">
                <h2>Sales Graph</h2>

            </div>

            <div id="sales-tab">
                <h2>Latest Buyers</h2>

            </div>

        </div>

        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>