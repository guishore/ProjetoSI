<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Settings</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/settings.css">
</head>

<body>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Settings</h1>

        <ul id="settings-menu">
            <li id="settings-profile-button" onclick="settingsMenuClick('#settings-profile','#settings-profile-button')">Edit Profile</li>
            <li id="settings-password-button" onclick="settingsMenuClick('#settings-password', '#settings-password-button')">Change Password</li>
            <li id="settings-privacy-button" onclick="settingsMenuClick('#settings-privacy', '#settings-privacy-button')">Privacy & Security</li>
        </ul>

        <div id="settings">
            <form action="" id="settings-profile">
                <h2>Edit Profile</h2>

                <label for="form-picture">Profile Picture</label>
                <input type="file" id="form-picture" value="Guilherme Costa">

                <label for="form-name">Name</label>
                <input type="text" id="form-name" value="Guilherme Costa">

                <label for="form-name">Username</label>
                <input type="text" id="form-username" value="guishore">

                <label for="form-name">Email</label>
                <input type="email" id="form-email" value="guilhermepmcosta@gmail.com">

                <input type="submit" name="" id="form-profile-submit" value="Save Changes">
            </form>

            <form action="" id="settings-password">
                <h2>Change Password</h2>

                <label for="form-old-password">Old Password</label>
                <input type="password" id="form-old-password">

                <label for="form-new-password">New Password</label>
                <input type="password" id="form-new-password">

                <label for="form-confirm-new-password">Confirm New Password</label>
                <input type="password" id="form-confirm-new-password">

                <input type="submit" name="" id="form-password-submit" value="Save Changes">
            </form>

            <form action="" id="settings-privacy">
                <h2>Privacy & Security</h2>

                <label for="form-search">Hide profile on search results</label>
                <input type="checkbox" id="form-search">

                <label for="form-info">Hide watch info</label>
                <input type="checkbox" id="form-info">
                <p>(This will only apply for 6 hours)</p>
                
                <input type="submit" name="" id="form-privacy-submit" value="Save Changes">
            </form>
        </div>

        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>