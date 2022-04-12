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
  let $deal_price = $("#deal-price");
  // let $input = $(".qty .qty_input");

  // click event on qty btns
  $qty_up.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    //change product price using ajax call
    $.ajax({
      type: "post",
      url: "template/ajax.php",
      data: { itemid: $(this).data("id") },
      success: function (response) {
        let obj = JSON.parse(response);
        let item_price = obj[0]["item_price"];

        if ($input.val() >= 1 && $input.val() < 10) {
          $input.val(function (x, oldval) {
            return ++oldval;
          });
          // increase product price
          $price.text(parseInt(item_price * $input.val()).toFixed(2));

          // subtotal
          let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
          $deal_price.text(subtotal.toFixed(2));
        }
      },
    }); // closing ajax
  });

  // click on qty down button
  $qty_down.click(function (e) {
    let $input = $(`.qty_input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product_price[data-id='${$(this).data("id")}']`);

    //change product price using ajax call
    $.ajax({
      type: "post",
      url: "template/ajax.php",
      data: { itemid: $(this).data("id") },
      success: function (response) {
        let obj = JSON.parse(response);
        let item_price = obj[0]["item_price"];

        if ($input.val() > 1 && $input.val() < 10) {
          $input.val(function (x, oldval) {
            return --oldval;
          });

          // increase product price
          $price.text(parseInt(item_price * $input.val()).toFixed(2));

          // subtotal
          let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
          $deal_price.text(subtotal.toFixed(2));
        }
      },
    }); // closing ajax
  });
});
