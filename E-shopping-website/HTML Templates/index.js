$(document).ready(function () {
  // banner owl carousel
  $("#banner-area .owl-carousel").owlCarousel({
    dots: true,
    items: 1,
  });

  //top-sale owl-carousel
  $("#top-sale .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  // isotope plugin
  var $grid = $(".grid").isotope({
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
  });

  //filter item on button click
  $(".button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });
  });

  // New phones owl carousel
  $("#new-phones .owl-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 5,
      },
    },
  });

  // Latest Blogs owl carousel
  $("#latest-blogs .owl-carousel").owlCarousel({
    loop: true,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
    },
  });

  // product qty section
  let $qty_up = $(".qty .qty-up");
  let $qty_down = $(".qty .qty-down");
  // let $input = $(".qty .qty_input");

  // click event on qty btns
  $qty_up.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    if ($input.val() >= 1 && $input.val() < 10) {
      $input.val(function (x, oldval) {
        return ++oldval;
      });
    }
  });

  $qty_down.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    if ($input.val() > 1 && $input.val() <= 10) {
      $input.val(function (x, oldval) {
        return --oldval;
      });
    }
  });
});
