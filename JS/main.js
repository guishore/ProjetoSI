function menuclick(j) {
  $("#primary-area").css({
    opacity: 0,
  });
  $("#primary-area").bind(
    "transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd",
    function (event) {
      window.location.replace(j);
    }
  );
}

function loginRegisterButton(j) {
  $(".main-tab").css({ display: "none" });
  $(j).css({ display: "block" });
}

$(document).ready(function () {
  $("#primary-area").css({
    opacity: 1,
  });
});

$("#ratings li").click(function () {
  $("#info-rating").attr("value", $(this).html());
  $(this).css({ color: "white" });
  $("#ratings li").not(this).css({ color: "grey" });
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
