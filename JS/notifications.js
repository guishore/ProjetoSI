$("#notification-icon").click(function() {

    $("#notification-tab").toggleClass("notification-tab-open");

    if($("#notification-tab").hasClass("notification-tab-open")) {
        $("#notification-tab").css({
            display: "block"
        });
        document.getElementById("notification-icon").src = "IMAGES/ICONS/bell-full-white.svg";
    } else {
        $("#notification-tab").css({
            display: "none"
        });
        document.getElementById("notification-icon").src = "IMAGES/ICONS/bell-white.svg";
    }

});