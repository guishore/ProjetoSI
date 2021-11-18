$(".card-medium")
  .mouseover(function () {
    //$(this).next(".projectInfo").stop().slideDown(200);
    $(this)
      .children(".card-medium-bottom")
      .children(".card-medium-action-buttons")
      .css({
        opacity: 1,
        right: "25px",
      });
  })
  .mouseout(function () {
    $(this)
      .children(".card-medium-bottom")
      .children(".card-medium-action-buttons")
      .css({
        opacity: 0,
        right: "20px",
      });
  });

$(document).ready(function () {

  $("#profile-picture").each(function (index) {
    $(this).css({
      "margin-left": "calc(-" + $(this).width() / 2 + "px + 75px)",
    });
  });

  $(".card-medium-image").each(function (index) {
    $(this).css({
      "margin-left": "calc(-" + $(this).width() / 2 + "px + 125px)",
    });
  });

  $(".card-small-image").each(function (index) {
    $(this).css({
      "margin-left": "calc(-" + $(this).width() / 2 + "px + 92.5px)",
    });
  });
});
