function enterTab(j) {
  $(j).css({
    right: 0,
  });
}

function leaveTab(j) {
  $(j).css({
    right: "-100%",
  });
}

var settingsMenuActive = "#settings-profile-button";

function settingsMenuClick(j, k) {
  $("#settings form").css({ display: "none" });
  $(j).css({ display: "block" });
  $("#settings-menu li").css({ background: "transparent" });
  $(k).css({ background: "grey" });
  settingsMenuActive = k;
}

$("#settings-menu li")
  .mouseover(function () {
    $(this).css({ background: "grey" });
  })
  .mouseout(function () {
    $(this).css({ background: "transparent" });
    $(settingsMenuActive).css({ background: "grey" });
  });

