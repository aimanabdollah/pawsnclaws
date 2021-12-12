$(document).ready(function () {
    $(".addToCartBtn").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".input-number")
            .val();

        // alert(product_id);
        // alert(product_qty);

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                swal(response.status);
            },
        });
    });

    var quantitiy = 0;
    $(".quantity-right-plus").click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($("#quantity").val());

        // If is not undefined

        $("#quantity").val(quantity + 1);

        // Increment
    });

    $(".quantity-left-minus").click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($("#quantity").val());

        // If is not undefined

        // Increment
        if (quantity > 0) {
            $("#quantity").val(quantity - 1);
        }
    });
});
