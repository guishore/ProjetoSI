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

$(document).ready(function () {
  $("#primary-area").css({
    opacity: 1,
  });
});
