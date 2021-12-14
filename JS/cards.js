$(".card-medium")
  .mouseenter(function () {
      $(this).children(".card-medium-video").get(0).currentTime = 0;
      $(this).children(".card-medium-video").get(0).play();
      $(this).children(".card-medium-video").css({ opacity: 1 });
  })
  .mouseleave(function () {
      $(this).children(".card-medium-video").css({ opacity: 0 });
  });

$(".card-medium-video").on("ended", function () {
  $(this).css({ opacity: 0 });
});

$(".card-list-next-button").click(function () {
  var marginLeftArray = $(this)
    .parent(".card-list")
    .children("ul")
    .css("margin-left")
    .split("px");
  var marginLeft = parseInt(marginLeftArray[0]);
  var moveAmount = 1155;
  var amountLeft =
    $(this).parent(".card-list").children("ul").innerWidth() +
    marginLeft -
    moveAmount;
  var maxWidth =
    $(this).parent(".card-list").parent("#primary-area").innerWidth() + 35;

  $(this)
    .parent(".card-list")
    .children(".card-list-previous-button")
    .css({ display: "block" });

  if (amountLeft > maxWidth) {
    $(this)
      .parent(".card-list")
      .children("ul")
      .css({
        "margin-left": "calc(" + marginLeft + "px - " + moveAmount + "px)",
      });
  } else {
    $(this).css({ display: "none" });

    $(this)
      .parent(".card-list")
      .children("ul")
      .css({
        "margin-left":
          "calc(-" +
          $(this).parent(".card-list").children("ul").innerWidth() +
          "px + " +
          maxWidth +
          "px)",
      });
  }
});

$(".card-list-previous-button").click(function () {
  var marginLeftArray = $(this)
    .parent(".card-list")
    .children("ul")
    .css("margin-left")
    .split("px");
  var marginLeft = parseInt(marginLeftArray[0]);
  var moveAmount = 1155;

  $(this)
    .parent(".card-list")
    .children(".card-list-next-button")
    .css({ display: "block" });

  if (marginLeft < -moveAmount) {
    $(this)
      .parent(".card-list")
      .children("ul")
      .css({
        "margin-left": "calc(" + marginLeft + "px + " + moveAmount + "px)",
      });
  } else {
    $(this).css({ display: "none" });

    $(this).parent(".card-list").children("ul").css({
      "margin-left": 0,
    });
  }
});
