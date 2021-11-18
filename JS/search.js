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
