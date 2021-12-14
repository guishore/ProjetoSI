var notClick = false;

$("#notification-icon").click(function () {

    $("#notification-tab").toggleClass("notification-tab-open");

    if ($("#notification-tab").hasClass("notification-tab-open")) {
        $("#notification-tab").css({
            display: "block"
        });
        document.getElementById("notification-icon").src = "IMAGES/ICONS/bell-full-white.svg";

        if (!notClick) {
            var ajaxurl = "/PARTS/read-notifications.php";
            $.ajax({
                type: "post",
                url: ajaxurl
            });
            notClick = true;
        }

    } else {
        $("#notification-tab").css({
            display: "none"
        });
        $(".notification-top-line .notification-title .new-notif").css({
            display: "none"
        });
        document.getElementById("notification-icon").src = "IMAGES/ICONS/bell-white.svg";
    }

});