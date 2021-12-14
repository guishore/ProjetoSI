function menuclick(j) {
    $("#primary-area").css({
        opacity: 0,
    });
    $("#primary-area").bind(
        "transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",
        function (event) {
            window.location.assign(j);
        }
    );
}

function loginRegisterButton(j) {
    $(".main-tab").css({display: "none"});
    $(j).css({display: "block"});
}

$(document).ready(function () {
    $("#primary-area").css({
        opacity: 1,
    });
});

$("#ratings li").click(function () {
    $("#info-rating").attr("value", $(this).html());
    $(this).css({color: "white"});
    $("#ratings li").not(this).css({color: "grey"});
});

$("#info-percentage input[type='checkbox']").click(function () {
    $(this).toggleClass("active");

    if ($(this).hasClass("active")) {
        $("#info-percentage-value").css({
            color: "white",
        });
    } else {
        $("#info-percentage-value").css({
            color: "grey",
        });
    }
});

if ($("#info-percentage input[type='checkbox']").hasClass("active")) {
    $("#info-percentage-value").css({
        color: "white",
    });
}

function addToCart(j) {
    var ajaxurl = "./FORMS/add-to-cart.php?id=" + j;
    $.ajax({
        type: "post",
        url: ajaxurl
    });
}

function addToWishlist(id, obj, cls) {
    var ajaxurl = "./FORMS/add-to-wishlist.php?id=" + id;
    $.ajax({
        type: "post",
        url: ajaxurl
    });
}

function startWatching(id) {
    var ajaxurl = "./FORMS/start-watching.php?id=" + id;
    $.ajax({
        type: "post",
        url: ajaxurl
    });
}

function stopWatching(id) {
    var ajaxurl = "./FORMS/stop-watching.php";
    $.ajax({
        type: "post",
        url: ajaxurl
    });
}

$(".add-to-wishlist-button").click(function () {

    if ($(this).hasClass("added")) {
        var ajaxurl = "./FORMS/remove-from-wishlist.php?id=" + $(this).attr("data-id");
        ;
        $.ajax({
            type: "post",
            url: ajaxurl
        });
        $(this).children("img").attr('src', 'IMAGES/ICONS/bookmark-dark.svg');
    } else {
        var ajaxurl = "./FORMS/add-to-wishlist.php?id=" + $(this).attr("data-id");
        ;
        $.ajax({
            type: "post",
            url: ajaxurl
        });
        $(this).children("img").attr('src', 'IMAGES/ICONS/bookmark-full-dark.svg');
    }

    $(this).toggleClass("added");
});

$(window).on("beforeunload", function (evt) {

    stopWatching(username);

});


$("#confirm-remove input[type='button']").click(function () {
        $(this).parent("form").css({display: "none"});
        $(this).parent("form").parent(".line-list-right-section").children(".line-list-action-buttons").css({display: "block"});
});