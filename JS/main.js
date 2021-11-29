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

window.addEventListener(
  "LazyLoad::Initialized",
  function (event) {
    window.lazyLoadInstance = event.detail.instance;
  },
  false
);

function addFriendTabButton() {
  $("#add-friend-tab").css({
    right: 0
  });
}
