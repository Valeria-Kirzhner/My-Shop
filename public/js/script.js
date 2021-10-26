String.prototype.permalink = function () {
    return this.toString().trim().toLocaleLowerCase().replace(/\s/g, "-");
};

$(".origin-text").on("focusout", function () {
    $(".target-text").val($(this).val().permalink());
});

$("div.sm-box").delay(3000).slideUp();

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

$(".update-cart").click(function () {
    $.ajax({
        url: BASE_URL + "/shop/update-cart", // base url given in the head og main page
        type: "GET",
        dataType: "html",
        data: { id: $(this).data("id"), operation: $(this).val() },
        success: function (response) {
            location.reload(); // to see the cart updating immidiately
        },
    });
});
