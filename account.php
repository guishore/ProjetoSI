<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Account</title>

    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/notifications.css">
    <link rel="stylesheet" href="CSS/cards.css">
    <link rel="stylesheet" href="CSS/menu-bar.css">
    <link rel="stylesheet" href="CSS/account.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
</head>

<body>

    <?php include("PARTS/menu-bar.php"); ?>
    <?php include("PARTS/notification-tab.php"); ?>

    <div id="primary-area">

        <h1 id="page-title">Account</h1>

        <div id="main-tab">

            <div id="profile-balance-side">

                <div id="profile-tab">
                    <div id="profile-picture-frame">
                        <img id="profile-picture" src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                    </div>
                    <div id="profile-info">
                        <h2>Name</h2>
                        <h3>Username</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <!-- <a href=""><button><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon">Edit Profile</button></a> -->
                    </div>
                </div>

                <div id="balance-tab">
                    <h3>Balance</h3>
                    <h2>90.90€</h2>

                    <div id="balance-buttons">
                        <button><img src="IMAGES/ICONS/plus-dark.svg" alt=""> Add Balance</button>
                        <button><img src="IMAGES/ICONS/arrow-left-dark.svg" alt=""> Request</button>
                        <button><img src="IMAGES/ICONS/arrow-right-dark.svg" alt=""> Send</button>
                    </div>

                    <ul id="latest-transactions">

                        <h4>Latest Transactions</h4>

                        <li>
                            <div class="transaction-top-line">
                                <div class="transaction-title">Send</div>
                                <div class="transaction-value">10€</div>
                            </div>
                            <div class="transaction-date">10/11/2021</div>
                        </li>

                        <li>
                            <div class="transaction-top-line">
                                <div class="transaction-title">Send</div>
                                <div class="transaction-value">10€</div>
                            </div>
                            <div class="transaction-date">10/11/2021</div>
                        </li>

                        <li>
                            <div class="transaction-top-line">
                                <div class="transaction-title">Send</div>
                                <div class="transaction-value">10€</div>
                            </div>
                            <div class="transaction-date">10/11/2021</div>
                        </li>

                    </ul>

                </div>

                <a href=""><button id="logout-button"><img src="IMAGES/ICONS/logout-dark.svg" alt="Edit Icon">Logout</button></a>

            </div>

            <div id="friend-list"></div>

        </div>

        <script src="JS/cards.js"></script>
        <script src="JS/notifications.js"></script>

    </div>

</body>

</html>