<?php

$admin = $_SESSION['admin'];
$ap = "'";

$sql_user = "SELECT * FROM notifications WHERE (read='f' AND username='" . $_SESSION['username'] . "')";
$res_user = pg_query($connection, $sql_user);

if (pg_num_rows($res_user) == 0) {
    $unread = false;
} else {
    $unread = true;
}

?>

<header id="menu-bar">
    <ul id="top-section">
        <li id="logo"><img src="IMAGES/ICONS/movie-white.svg" alt="Logo"></li>
        <li onclick="menuclick('index.php')"><img id="home-icon" src="IMAGES/ICONS/home-white.svg" alt="Home Icon"></li>
        <li onclick="menuclick('library.php')"><img id="library-icon" src="IMAGES/ICONS/folder-white.svg"
                                                    alt="Library Icon"></li>
        <li onclick="menuclick('wishlist.php')"><img id="wishlist-icon" src="IMAGES/ICONS/bookmark-white.svg"
                                                     alt="Wishlist Icon"></li>
        <li onclick="menuclick('search.php')"><img id="search-icon" src="IMAGES/ICONS/search-white.svg"
                                                   alt="Search Icon"></li>
        <?php

        if ($admin == "t") {
            echo '<li onclick="menuclick(' . $ap . 'admin.php' . $ap . ')"><img id="admin-icon" src="IMAGES/ICONS/admin.svg" alt="Admin Icon"></li>';
        }

        ?>
    </ul>
    <ul id="bottom-section">
        <li>
            <div id="current-balance-tag"><?php echo $balance ?>€</div>
        </li>
        <li onclick="menuclick('shopping-cart.php')"><img src="IMAGES/ICONS/cart-white.svg" alt="Shopping Cart Icon">
        </li>
        <li><img id="notification-icon" src="IMAGES/ICONS/bell-white.svg" alt="Notification Icon"></li>
        <li onclick="menuclick('account.php')"><img id="account-icon" src="IMAGES/ICONS/user-white.svg"
                                                    alt="Account Icon"></li>
    </ul>
    <?php if ($unread) {
        echo '<script>document.getElementById("notification-icon").src = "IMAGES/ICONS/bell-unread-white.svg";</script>';
    }
    ?>
</header>