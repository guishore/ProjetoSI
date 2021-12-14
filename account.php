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
$email_array = explode("@", $data['email']);
$email = substr($email_array[0], 0, 3) . str_repeat("*", strlen(substr($email_array[0], 3))) . "@" . $email_array[1];
$phone = str_repeat("*", strlen(substr($data['phone'], -5))) . substr($data['phone'], -4);
$gender = $data['gender'];
$country = $data['country'];
$balance = number_format((float)$data['balance'], 2, '.', '');
$private = $data['private_profile'];

$purchasedata = pg_query($connection, "SELECT movie_id FROM public.purchases WHERE username='" . $_SESSION['username'] . "'");
$purchases = pg_fetch_all($purchasedata);
$purchasesNumber = count($purchases);

$followingdata = pg_query($connection, "SELECT enduser FROM public.follows WHERE startuser='" . $_SESSION['username'] . "'");
$following = pg_fetch_all($followingdata);
$followingNumber = count($following);

$followersdata = pg_query($connection, "SELECT startuser FROM public.follows WHERE enduser='" . $_SESSION['username'] . "'");
$followers = pg_fetch_all($followersdata);
$followersNumber = count($followers);

if (!isset($data['hide_watch_info'])) {
    $data['hide_watch_info'] = date("Y-m-d H:i:s");
}

$t1 = strtotime(date("Y-m-d H:i:s"));
$t2 = strtotime($data['hide_watch_info']);
$diff = $t1 - $t2;
$hideinfo = round($diff / (60 * 60));

?>

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

<script>username = "<?php echo $_SESSION['username']?>"</script>

<div id="primary-area">

    <h1 id="page-title">Account</h1>

    <div id="main-tab">

        <div id="account-section">

            <div id="profile-tab">
                <div id="profile-picture-frame">
                    <img id="profile-picture" src="IMAGES/PROFILE/<?php echo $picture ?>" alt="Profile Picture">
                </div>
                <div id="profile-info">
                    <h2><?php echo $name ?></h2>
                    <h3><?php echo $username ?></h3>
                    <div id="profile-stats">
                        <h4><span class="profile-number"><?php echo $purchasesNumber ?></span> Movies</h4>
                        <h4><span class="profile-number"><?php echo $followersNumber ?></span> Followers</h4>
                        <h4><span class="profile-number"><?php echo $followingNumber ?></span> Following</h4>
                    </div>
                </div>
            </div>

            <div id="profile-details-tab">

                <h2>Profile Details</h2>

                <?php
                if ($private == "t") {
                    echo '<h4>Profile Hidden</h4>';
                }

                if ($hideinfo < 6) {
                    echo '<h4>Watch Info Hidden</h4>';
                }
                ?>
                <ul>
                    <li>
                        <h3>Email</h3>
                        <p><?php echo $email ?></p>
                    </li>
                    <li>
                        <h3>Phone</h3>
                        <p><?php echo $phone ?></p>
                    </li>
                    <li>
                        <h3>Gender</h3>
                        <p><?php echo $gender ?></p>
                    </li>
                    <li>
                        <h3>Country</h3>
                        <p><?php echo $country ?></p>
                    </li>
                </ul>

            </div>

            <button onclick="menuclick('settings.php')" id="settings-button"><img src="IMAGES/ICONS/settings-dark.svg"
                                                                                  alt="Edit Icon">Settings
            </button>
            <form id="logout" action="FORMS/logout.php" method="post">
                <input type="submit" id="logout-button" value=""><label for="logout-button"><img
                            src="IMAGES/ICONS/logout-dark.svg" alt="Edit Icon">Logout</label>
            </form>

        </div>

        <div id="balance-tab">
            <h3>Balance</h3>
            <h2><?php echo $balance ?>€</h2>

            <div id="balance-buttons">
                <button onclick="enterTab('#add-balance-tab')"><img src="IMAGES/ICONS/plus-dark.svg" alt="Add Icon"> Add
                    Balance
                </button>
                <button onclick="enterTab('#request-tab')"><img src="IMAGES/ICONS/arrow-left-dark.svg"
                                                                alt="Request Icon"> Request
                </button>
                <button onclick="enterTab('#send-tab')"><img src="IMAGES/ICONS/arrow-right-dark.svg" alt="Send Icon">
                    Send
                </button>
            </div>

            <ul id="latest-transactions">

                <h4>Transactions</h4>

                <?php

                $transationdata = pg_query($connection, "SELECT * FROM transactions WHERE (startuser='" . $_SESSION['username'] . "'OR enduser='" . $_SESSION['username'] . "') ORDER BY id DESC LIMIT 10");

                while ($transation = pg_fetch_array($transationdata)) {
                    if ($transation['type'] == "request") {
                        if ($transation['startuser'] == $_SESSION['username']) {
                            echo '
                                <li>
                                    <div class="transaction-top-line">
                                        <div class="transaction-title">Requested <img src="IMAGES/ICONS/arrow-left-white.svg" alt="">
                                            ' . $transation['enduser'] . '<span class="state-' . $transation['state'] . ' state">' . $transation['state'] . '</span></div>
                                        <div class="transaction-value">' . $transation['amount'] . '€</div>
                                    </div>';
                            if ($transation['state'] == "pending") {
                                echo '
                                    <div class="transaction-bottom-line">
                                        <form action="FORMS/request-reply.php" method="post">
                                            <input name="id" type="number" value="' . $transation['id'] . '" style="display: none">
                                            <input name="amount" type="number" value="' . $transation['amount'] . '" style="display: none">
                                            <input type="submit" name="result" value="Cancel">
                                        </form>
                                        ';
                            }
                            echo '
                                        <div class="transaction-date">' . $transation['date'] . '</div>
                                        ';

                            if ($transation['state'] == "pending") {
                                echo '
                                    </div>';
                            }
                            echo '
                                </li>
                            ';
                        } else {
                            echo '
                                <li>
                                    <div class="transaction-top-line">
                                        <div class="transaction-title">Requested <img src="IMAGES/ICONS/arrow-right-white.svg" alt="">
                                            ' . $transation['startuser'] . '<span class="state-' . $transation['state'] . ' state">' . $transation['state'] . '</span></div>
                                        <div class="transaction-value">' . $transation['amount'] . '€</div>
                                    </div>';
                            if ($transation['state'] == "pending") {
                                echo '
                                    <div class="transaction-bottom-line">
                                        <form action="FORMS/request-reply.php" method="post">
                                            <input name="id" type="number" value="' . $transation['id'] . '" style="display: none">
                                            <input name="amount" type="number" value="' . $transation['amount'] . '" style="display: none">
                                            <input name="startuser" type="text" value="' . $transation['startuser'] . '" style="display: none">
                                            <input type="submit" name="result" value="Accept">
                                            <input type="submit" name="result" value="Deny">
                                        </form>
                                        ';
                            }
                            echo '
                                        <div class="transaction-date">' . $transation['date'] . '</div>
                                        ';

                            if ($transation['state'] == "pending") {
                                echo '
                                    </div>';
                            }
                            echo '
                                </li>
                            ';
                        }
                    } elseif ($transation['type'] == "send") {
                        if ($transation['startuser'] == $_SESSION['username']) {
                            echo '
                            <li>
                                <div class="transaction-top-line">
                                    <div class="transaction-title">Sent <img src="IMAGES/ICONS/arrow-right-white.svg" alt="">
                                        ' . $transation['enduser'] . '
                                    </div>
                                    <div class="transaction-value">' . $transation['amount'] . '€</div>
                                </div>
                                <div class="transaction-date">' . $transation['date'] . '</div>
                            </li>
                        ';
                        } else {
                            echo '
                            <li>
                                <div class="transaction-top-line">
                                    <div class="transaction-title">Received <img src="IMAGES/ICONS/arrow-left-white.svg" alt="">
                                        ' . $transation['startuser'] . '
                                    </div>
                                    <div class="transaction-value">' . $transation['amount'] . '€</div>
                                </div>
                                <div class="transaction-date">' . $transation['date'] . '</div>
                            </li>
                        ';

                        }
                    } else {
                        echo '
                            <li>
                                <div class="transaction-top-line">
                                    <div class="transaction-title">Add Balance <img src="IMAGES/ICONS/plus-white.svg" alt="">
                                    </div>
                                    <div class="transaction-value">' . $transation['amount'] . '€</div>
                                </div>
                                <div class="transaction-date">' . $transation['date'] . '</div>
                            </li>
                        ';
                    }
                }

                ?>


            </ul>

            <div id="add-balance-tab">
                <button class="tab-back-button" onclick="leaveTab('#add-balance-tab')"><img
                            src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>
                <form action="FORMS/add-balance.php" method="post">

                    <h4>Add Balance</h4>

                    <label for="add-balance-amount">Amount</label>
                    <div class="currency-frame">
                        <input id="add-balance-amount" name="amount" type="text">
                        <span class="currency">€</span>
                    </div>

                    <input type="submit" name="add-balance" value="Add Balance">

                </form>
            </div>

            <div id="request-tab">
                <button class="tab-back-button" onclick="leaveTab('#request-tab')"><img
                            src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>

                <form action="FORMS/request-money.php" method="post">

                    <h4>Request</h4>

                    <label for="request-user">Username</label>
                    <input id="request-user" name="username" type="text">

                    <label for="request-amount">Amount</label>
                    <div class="currency-frame">
                        <input id="request-amount" name="amount" type="text">
                        <span class="currency">€</span>
                    </div>

                    <input type="submit" name="request" value="request">

                </form>

            </div>

            <div id="send-tab">
                <button class="tab-back-button" onclick="leaveTab('#send-tab')"><img
                            src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>

                <form action="FORMS/send-money.php" method="post">

                    <h4>Send</h4>

                    <label for="send-user">Username</label>
                    <input id="send-user" name="username" type="text">

                    <label for="send-amount">Amount</label>
                    <div class="currency-frame">
                        <input id="send-amount" name="amount" type="text">
                        <span class="currency">€</span>
                    </div>


                    <input type="submit" name="send" value="Send">

                </form>


            </div>

        </div>


        <div id="friend-list">

            <div id="friend-list-top-line">
                <h2>Following</h2>
                <button onclick="enterTab('#add-friend-tab')"><img src="IMAGES/ICONS/user-plus-dark.svg" alt=""> Follow
                </button>
            </div>

            <ul>

                <?php

                $followingdata = pg_query($connection, "SELECT * FROM follows WHERE startuser='" . $_SESSION['username'] . "'");

                while ($following = pg_fetch_array($followingdata)) {

                    $enduserdata = "SELECT * FROM users WHERE username='" . $following['enduser'] . "'";
                    $enduser = pg_query($connection, $enduserdata);
                    $enduser = pg_fetch_array($enduser);

                    if (isset($enduser['hide_watch_info'])) {
                        $t1 = strtotime(date("Y-m-d H:i:s"));
                        $t2 = strtotime($enduser['hide_watch_info']);
                        $diff = $t1 - $t2;
                        $hideinfo = round($diff / (60 * 60));
                    } else {
                        $hideinfo = 12;
                    }

                    echo '
                        <li>
                            <div class="friend-image-frame">
                                <img src="IMAGES/PROFILE/' . $enduser['picture'] . '" alt="Profile Picture">
                            </div>
                            <div class="friend-right-section">
                                <h3>' . $enduser['name'] . '</h3>
                                <h4 class="friend-username">' . $enduser['username'] . '</h4>';
                    if ($hideinfo >= 6 && $enduser['watching_id'] != null) {

                        $watchingdata = "SELECT title FROM movies WHERE id='" . $enduser['watching_id'] . "'";
                        $watching = pg_query($connection, $watchingdata);
                        $watching = pg_fetch_array($watching)[0];

                        echo '
                                <img class="friend-currently-watching-icon" src="IMAGES/ICONS/camera-white.svg" alt="Camera Icon">
                                <h4 class="friend-currently-watching">';
                        if ($enduser['watching'] == "t") echo "Watching"; else echo "Last Watched";
                        echo ': ' . $watching . '</h4>';
                    }
                    echo '
                            </div>
                            <form action="FORMS/remove-following.php" method="post">
                                <input type="text" name="enduser" value="'. $enduser['username'] .'" style="display: none">
                                <label class="friend-delete-button"><input type="submit" name="remove" value=""><img src="IMAGES/ICONS/trash-dark.svg" alt="Delete Icon"></label>
                            </form>
                        </li>
                    ';


                }

                ?>

            </ul>

            <div id="add-friend-tab">
                <button class="tab-back-button" onclick="leaveTab('#add-friend-tab')"><img
                            src="IMAGES/ICONS/arrow-left-dark.svg" alt=""></button>

                <form action="FORMS/follow.php" method="post">

                    <h4>Follow</h4>

                    <label for="send-user">Username</label>
                    <input id="send-user" name="username" type="text">


                    <input type="submit" name="follow" value="Follow">

                </form>


            </div>

        </div>

    </div>

    <script src="JS/account.js"></script>
    <script src="JS/notifications.js"></script>
    <script src="JS/main.js"></script>

</div>

</body>

</html>