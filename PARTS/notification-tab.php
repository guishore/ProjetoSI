<ul id="notification-tab">

    <h2>Notifications</h2>

    <?php

    $notificationdata = pg_query($connection, "SELECT * FROM notifications WHERE username='" . $_SESSION['username'] . "' ORDER BY id DESC LIMIT 20");

    while ($notification = pg_fetch_array($notificationdata)) {

        $title = $notification['title'];
        $description = $notification['description'];
        $date = strtotime(date("Y-m-d")) - strtotime($notification['date']);
        $date = abs(round($date / 86400));
        if ($date <= 0) {
            $date = "Today";
        } elseif ($date == 1) {
            $date = $date . " day ago";
        } else {
            $date = $date . " days ago";
        }

        echo '
            <li>
                <div class="notification-top-line">
                    <h3 class="notification-title">'.$title;

        if($notification['read'] == "f") echo' <span class="new-notif"></span>';
        echo'</h3>
                    <div class="notification-date">'.$date.'</div>
                </div>
                <div class="notification-description">'.$description.'</div>
            </li>
        ';
    }

    ?>

</ul>