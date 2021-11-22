<!DOCTYPE html>
<html>

<head>
    <title>LDMovies | Account</title>
    <?php include("PARTS/head-tag.php"); ?>
    <link rel="stylesheet" href="CSS/account.css">
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

            <div id="friend-list">

                <div id="friend-list-top-line">
                    <h2>Friend List</h2>
                    <button><img src="IMAGES/ICONS/user-plus-dark.svg" alt=""> Add Friend</button>
                </div>

                <ul id="card-grid">

                    <li class="card card-medium">
                        <img class="card-item card-medium-image" src="IMAGES/MOVIES/Joker.jpg" alt="Movie Poster">
                        <div class="card-item card-medium-bottom">
                            <h3>Joker</h3>
                            <h3 style="display: none;">Joaquin Phoenix, Robert De Niro</h3>
                        </div>
                    </li>

                    <li class="card card-medium">
                        <img class="card-item card-medium-image" src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster">
                        <div class="card-item card-medium-bottom">
                            <h3>The French Dispatch</h3>
                            <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                        </div>
                    </li>

                    <li class="card card-medium">
                        <img class="card-item card-medium-image" src="IMAGES/MOVIES/TheFrenchDispatch.jpeg" alt="Movie Poster">
                        <div class="card-item card-medium-bottom">
                            <h3>The French Dispatch</h3>
                            <h3 style="display: none;">Timothée Chalamet, Tilda Swinton, Bill Murray</h3>
                        </div>
                    </li>

                </ul>

            </div>

        </div>

        <script src="JS/cards.js"></script>
        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>