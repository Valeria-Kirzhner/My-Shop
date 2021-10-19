$("div.sm-box").delay(3000).slideup();

$(".add-to-cart-btn").click(function () {
    $.ajax({
        url: BASE_URL + "/shop/add-to-cart", // base url given in the head og main page
        type: "GET",
        dataType: "html",
        data: { id: $(this).data("id") },
        success: function (response) {
            location.reload();
        },
    });
});
