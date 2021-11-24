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

/*===================================*/

