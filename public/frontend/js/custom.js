$(document).ready(function () {
    // loadcart();

    // function loadcart() {
    //     $.ajax({
    //         type: "GET",
    //         url: "/load-cart-data",
    //         success: function (response) {
    //             $(".cart-count").html("");
    //             $(".cart-count").html(response.count);

    //             //console.log(response.count);
    //         },
    //     });
    // }

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

    $(".increment-btn").click(function (e) {
        e.preventDefault();
        var inc_value = $("#quantity").val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $("#quantity").val(value);
        }
    });

    // $(".increment-btn").click(function (e) {
    //     e.preventDefault();

    //     var inc_value = $(this)
    //         .closest(".product_data")
    //         .find("#quantity")
    //         .val();
    //     var value = parseint(inc_value, 10);
    //     value = isNan(value) ? 0 : value;
    //     if (value < 10) {
    //         value++;
    //         $(this).closest(".product_data").find("#quantity").val(value);
    //     }
    // });

    $(".decrement-btn").click(function (e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var dec_value = $("#quantity").val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $("#quantity").val(value);
        }
    });

    // $(".quantity-right-minus").click(function (e) {
    //     e.preventDefault();

    //     var dec_value = $(this)
    //         .closest(".product-data")
    //         .find(".qty-input")
    //         .val();
    //     var value = parseInt(dec_value, 10);
    //     value = isNan(value) ? 0 : value;
    //     if (value > 1) {
    //         value--;
    //         $(this).closest("product_data").find(".qty-input").val(value);
    //     }
    // });

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
                window.location.reload();
            },
        });
    });

    // $(".quantity-right-plus").click(function (e) {
    //     e.preventDefault();

    //     var inc_value = $(this)
    //         .closest(".product_data")
    //         .find(".qty-input")
    //         .val();
    //     var value = parseint(inc_value, 10);
    //     value = isNan(value) ? 0 : value;
    //     if (value < 10) {
    //         value++;
    //         $(this).closest(".product_data").find(".qty-input").val(value);
    //     }
    // });

    // $(".quantity-right-minus").click(function (e) {
    //     e.preventDefault();

    //     var dec_value = $(this)
    //         .closest(".product-data")
    //         .find(".qty-input")
    //         .val();
    //     var value = parseInt(dec_value, 10);
    //     value = isNan(value) ? 0 : value;
    //     if (value > 1) {
    //         value--;
    //         $(this).closest("product_data").find(".qty-input").val(value);
    //     }
    // });

    // update price based on quantity

    $(".changeQuantity").click(function (e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var qty = $(this).closest(".product_data").find("#qty-input").val();
        data = {
            prod_id: prod_id,
            prod_qty: qty,
        };
        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                window.location.reload;
            },
        });
    });
});
