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

            <div id="account-section">

                <div id="profile-tab">
                    <div id="profile-picture-frame">
                        <img id="profile-picture" src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                    </div>
                    <div id="profile-info">
                        <h2>Name</h2>
                        <h3>Username</h3>
                        <div id="profile-stats">
                            <h4><span class="profile-number">12</span> Movies</h4>
                            <h4><span class="profile-number">12</span> Followers</h4>
                            <h4><span class="profile-number">12</span> Following</h4>
                        </div>
                        <!-- <a href=""><button><img src="IMAGES/ICONS/pencil-dark.svg" alt="Edit Icon">Edit Profile</button></a> -->
                    </div>
                </div>

                <div id="echievements-tab">

                    <h2>Achievements</h2>

                </div>

                <button onclick="menuclick('settings.php')" id="settings-button"><img src="IMAGES/ICONS/settings-dark.svg" alt="Edit Icon">Settings</button>
                <button id="logout-button"><img src="IMAGES/ICONS/logout-dark.svg" alt="Edit Icon">Logout</button>

            </div>

            <div id="balance-tab">
                <h3>Balance</h3>
                <h2>90.90€</h2>

                <div id="balance-buttons">
                    <button onclick="enterTab('#add-balance-tab')"><img src="IMAGES/ICONS/plus-dark.svg" alt=""> Add Balance</button>
                    <button onclick="enterTab('#request-tab')"><img src="IMAGES/ICONS/arrow-left-dark.svg" alt=""> Request</button>
                    <button onclick="enterTab('#send-tab')"><img src="IMAGES/ICONS/arrow-right-dark.svg" alt=""> Send</button>
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

                <div id="add-balance-tab">
                    <button class="tab-back-button" onclick="leaveTab('#add-balance-tab')"><img src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>
                </div>

                <div id="request-tab">
                    <button class="tab-back-button" onclick="leaveTab('#request-tab')"><img src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>
                </div>

                <div id="send-tab">
                    <button class="tab-back-button" onclick="leaveTab('#send-tab')"><img src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>
                </div>

            </div>


            <div id="friend-list">

                <div id="friend-list-top-line">
                    <h2>Following</h2>
                    <button onclick="enterTab('#add-friend-tab')"><img src="IMAGES/ICONS/user-plus-dark.svg" alt=""> Follow</button>
                </div>

                <ul>
                    <li>
                        <div class="friend-image-frame">
                            <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                        </div>
                        <div class="friend-right-section">
                            <h3>Name</h3>
                            <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                            <h4 class="friend-currently-watching-tag">Currently Watching</h4>
                            <h4 class="friend-currently-watching">Movie Title</h4>
                        </div>
                        <div class="friend-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></div>
                    </li>

                    <li>
                        <div class="friend-image-frame">
                            <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                        </div>
                        <div class="friend-right-section">
                            <h3>Name</h3>
                            <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                            <h4 class="friend-currently-watching-tag">Currently Watching</h4>
                            <h4 class="friend-currently-watching">Movie Title</h4>
                        </div>
                        <div class="friend-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></div>
                    </li>

                    <li>
                        <div class="friend-image-frame">
                            <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                        </div>
                        <div class="friend-right-section">
                            <h3>Name</h3>
                            <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                            <h4 class="friend-currently-watching-tag">Last Watched</h4>
                            <h4 class="friend-currently-watching">Movie Title</h4>
                        </div>
                        <div class="friend-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></div>
                    </li>

                    <li>
                        <div class="friend-image-frame">
                            <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                        </div>
                        <div class="friend-right-section">
                            <h3>Name</h3>
                            <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                            <h4 class="friend-currently-watching-tag">Last Watched</h4>
                            <h4 class="friend-currently-watching">Movie Title</h4>
                        </div>
                        <div class="friend-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></div>
                    </li>
                    <li>
                        <div class="friend-image-frame">
                            <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                        </div>
                        <div class="friend-right-section">
                            <h3>Name</h3>
                            <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                            <h4 class="friend-currently-watching-tag">Currently Watching</h4>
                            <h4 class="friend-currently-watching">Movie Title</h4>
                        </div>
                        <div class="friend-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></div>
                    </li>

                    <li>
                        <div class="friend-image-frame">
                            <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                        </div>
                        <div class="friend-right-section">
                            <h3>Name</h3>
                            <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                            <h4 class="friend-currently-watching-tag">Currently Watching</h4>
                            <h4 class="friend-currently-watching">Movie Title</h4>
                        </div>
                        <div class="friend-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></div>
                    </li>

                    <li>
                        <div class="friend-image-frame">
                            <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                        </div>
                        <div class="friend-right-section">
                            <h3>Name</h3>
                            <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                            <h4 class="friend-currently-watching-tag">Last Watched</h4>
                            <h4 class="friend-currently-watching">Movie Title</h4>
                        </div>
                        <div class="friend-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></div>
                    </li>

                    <li>
                        <div class="friend-image-frame">
                            <img src="IMAGES/PROFILE/ProfilePicture.jpg" alt="Profile Picture">
                        </div>
                        <div class="friend-right-section">
                            <h3>Name</h3>
                            <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                            <h4 class="friend-currently-watching-tag">Last Watched</h4>
                            <h4 class="friend-currently-watching">Movie Title</h4>
                        </div>
                        <div class="friend-delete-button"><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></div>
                    </li>
                </ul>

                <div id="add-friend-tab">
                    <div id="search-bar">
                        <button id="add-friend-back-button" onclick="leaveTab('#add-friend-tab')"><img src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>
                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search"><img id="search-bar-icon" src="IMAGES/ICONS/search-dark.svg" alt="Search Icon">
                    </div>
                </div>

            </div>

        </div>

        <script src="JS/notifications.js"></script>
        <script src="JS/main.js"></script>

    </div>

</body>

</html>