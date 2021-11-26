function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, b, i, txtValue, ArrayValueB, txtValueB;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("card-grid");
  li = ul.getElementsByTagName("li");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("h3")[0];
    b = li[i].getElementsByTagName("h3")[1];
    txtValue = $(a).text();
    ArrayValueB = $(b).text().split(",");
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }

    for (j = 0; j < ArrayValueB.length; j++) {
      txtValueB = ArrayValueB[j];
      if (txtValueB.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      }
    }
  }
}

function myFunctionAdmin() {
  // Declare variables
  var input, filter, ul, li, a, b, i, txtValue, ArrayValueB, txtValueB;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("line-list");
  li = ul.getElementsByClassName("line-list-item");

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("h3")[0];
    b = li[i].getElementsByTagName("h3")[1];
    txtValue = $(a).text();
    ArrayValueB = $(b).text().split(",");
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }

    for (j = 0; j < ArrayValueB.length; j++) {
      txtValueB = ArrayValueB[j];
      if (txtValueB.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      }
    }
  }
}

$("#category-button").click(function () {
  $("#category-list").toggleClass("active-list");

  if ($("#category-list").hasClass("active-list")) {
    $("#category-list").stop().slideDown(200);
  } else {
    $("#category-list").stop().slideUp(200);
  }
  
  $("#rating-list").stop().slideUp(200);
  $("#rating-list").removeClass("active-list");
});

$("#rating-button").click(function () {
  $("#rating-list").toggleClass("active-list");

  if ($("#rating-list").hasClass("active-list")) {
    $("#rating-list").stop().slideDown(200);
  } else {
    $("#rating-list").stop().slideUp(200);
  }
  
  $("#category-list").stop().slideUp(200);
  $("#category-list").removeClass("active-list");
});

function categorySelection(id) {
  if (id == "all-movies-category") {
    $("#card-grid li").each(function () {
      $(this).css({ display: "inline-lock" });
    });
  } else {
    $("#card-grid li").each(function () {
      if ($(this).hasClass(id)) {
        $(this).css({ display: "inline-block" });
      } else {
        $(this).css({ display: "none" });
      }
    });
  }
  $("#category-list").stop().slideUp(200);
  $("#category-list").toggleClass("active-list");
}

function ratingSelection(id) {
  if (id == "all-ratings") {
    $("#card-grid li").each(function () {
      $(this).css({ display: "inline-lock" });
    });
  } else {
    $("#card-grid li").each(function () {
      if ($(this).hasClass(id)) {
        $(this).css({ display: "inline-block" });
      } else {
        $(this).css({ display: "none" });
      }
    });
  }
  $("#rating-list").stop().slideUp(200);
  $("#rating-list").toggleClass("active-list");
}
