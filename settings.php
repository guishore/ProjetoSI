<?php
session_start();

if ((!isset($_SESSION['logged']))) {
    header('Location: login-register.php');
}

require_once "PARTS/connection.php";

$userdata = pg_query($connection, "SELECT * FROM users WHERE username='" . $_SESSION['username'] . "'");
$data = pg_fetch_array($userdata);

$picture = $data['picture'];
$name = $data['name'];
$username = $data['username'];
$email = $data['email'];
$phone = $data['phone'];
$gender = $data['gender'];
$country = $data['country'];
$balance = number_format((float)$data['balance'], 2, '.', '');
$private = $data['private_profile'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Settings</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/settings.css">
</head>

<body>
<script>username = "<?php echo $_SESSION['username']?>"</script>

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
            <form action="FORMS/edit-profile.php" method="post" enctype="multipart/form-data" id="settings-profile">
                <h2>Edit Profile</h2>

                <label>Profile Picture</label>
                <label id="form-picture-button" for="form-picture">
                    <input type="text" name="hiddenPicture" value="<?php echo $picture ?>" style="display:none;">
                    <input type="file" name="picture" id="form-picture">
                    <h4>Upload New Picture</h4>
                </label>

                <label for="form-name">Name</label>
                <input type="text" id="form-name" value="<?php echo $name ?>" name="name" required>

                <label for="form-name">Username</label>
                <input type="text" id="form-username" value="<?php echo $username ?>" name="username" required>

                <label for="form-name">Email</label>
                <input type="email" id="form-email" value="<?php echo $email ?>" name="email" required>
                
                <label for="form-name">Phone</label>
                <input type="tel" id="form-phone" value="<?php echo $phone ?>" name="phone" required>
                
                <label for="form-name">Gender</label>
                <select id="form-gender" name="gender">
                    <option id="male" value="male">Male</option>
                    <option id="female" value="female">Female</option>
                    <option id="non-binary" value="non-binary">Non-Binary</option>
                    <option id="prefer-not-to-say" value="prefer-not-to-say">Prefer not to say</option>
                </select>

                <label for="form-country">Country</label>
                <select type="text" id="form-country" value="Portugal" name="country" required>
                    <?php include('PARTS/country-list.php') ?>
                </select>

                <?php
                echo '
                    
                    <script>
                        $("#form-gender option[value='.$ap.$data['gender'].$ap.']").prop("selected", true);
                        $("#form-country option[value='.$ap.$data['country'].$ap.']").prop("selected", true);
                    </script>
                    
                    ';
                ?>

                <input type="submit" name="save" id="form-profile-submit" value="Save Changes">
            </form>

            <form action="FORMS/change-password.php" method="post" id="settings-password">
                <h2>Change Password</h2>

                <label for="form-old-password">Old Password</label>
                <input type="password" id="form-old-password" name="old_password" required>

                <label for="form-new-password">New Password</label>
                <input type="password" id="form-new-password" name="new_password" required>

                <label for="form-confirm-new-password">Confirm New Password</label>
                <input type="password" id="form-confirm-new-password" name="confirm_password" required>

                <input type="submit" name="save" id="form-password-submit" value="Save Changes">
            </form>

            <form action="FORMS/privacy-settings.php" method="post" id="settings-privacy">
                <h2>Privacy & Security</h2>

                <label for="form-search">Private Profile</label>
                <div>
                <input type="checkbox" id="form-search" name="private">
                <p>(This will disable people from being able to following you)</p>
                </div>

                <label for="form-info">Hide watch info</label>
                <div>
                    <input type="checkbox" id="form-info" name="hide_info">
                    <p>(This will hide your watch history for 6 hours)</p>
                </div>



                <?php

                if (isset($data['hide_watch_info'])) {
                    $t1 = strtotime(date("Y-m-d H:i:s"));
                    $t2 = strtotime($data['hide_watch_info']);
                    $diff = $t1 - $t2;
                    $hideinfo = round($diff / (60 * 60));
                } else {
                    $hideinfo = 12;
                }

                echo '<script>';
                if($data['private_profile'] == "t"){
                    echo '$("#form-search").prop("checked", true);';
                };
                if($hideinfo < 6){
                    echo '$("#form-info").prop("checked", true);';
                }
                echo'</script>
                    
                    ';
                ?>

                <input type="submit" name="save" id="form-privacy-submit" value="Save Changes">
            </form>
        </div>

        <script src="JS/account.js"></script>
        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>