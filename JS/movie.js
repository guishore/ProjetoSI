$("#movie-player")
  .mouseenter(function () {
    $("#movie-player button").css({ opacity: 1 });
  })
  .mouseleave(function () {
    if ($("#movie-player video").get(0).paused == false)
      $("#movie-player button").css({ opacity: 0 });
  });

function moviePlayerEnter() {
  $("#movie-player").css({ left: 0 });
}


function moviePlayerLeave() {
    $("#movie-player video").get(0).pause();
    $("#movie-player").css({ left:"100%" });
  }
