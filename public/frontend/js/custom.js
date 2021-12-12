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

    $(".delete-cart-item").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                swal("", response.status, "success");
            },
        });
    });

    // $(".increment-btn").click(function (e) {
    //     e.preventDefault();

    //     var inc_value = $(".qty-input").val();
    //     var value = parseint(inc_value, 10);
    //     value = isNan(value) ? 0 : value;
    //     if (value < 10) {
    //         value++;
    //         $(".qty-input").val(value);
    //     }
    // });

    // $(".decrement-btn").click(function (e) {
    //     e.preventDefault();

    //     var dec_value = $(this)
    //         .closest(".product-data")
    //         .find(".qty-input")
    //         .val();
    //     var value = parseInt(dec_value, 10);
    //     value = isNan(value) ? 0 : value;
    //     if (value > 1) {
    //         value++;
    //         $(this).closest("product_data").find(".qty-input").val(value);
    //     }
    // });
});
