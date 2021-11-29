$("#movie-player")
  .mouseenter(function () {
    $("#movie-player button").css({ opacity: 1 });
  })
  .mouseleave(function () {
    if ($("#movie-player video").get(0).paused == false)
      $("#movie-player button").css({ opacity: 0 });
  });

function moviePlayerEnter() {
  $("#movie-player").css({ top: 0 });
  $(".card-large-bottom").css({ bottom: "-100%" });
}

function moviePlayerLeave() {
  $("#movie-player video").get(0).pause();
  $("#movie-player").css({ top: "100%" });
  $(".card-large-bottom").css({ bottom: 0 });
}

$("#movie-player video").on("ended", function () {
  moviePlayerLeave();
  setTimeout(function () {
    $("#movie-player video").get(0).currentTime = 0;
  }, 500);
});
