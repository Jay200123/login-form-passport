var productCount = 0;
var priceTotal = 0.0;
var quantity = 0;
var clone = "";

$(document).ready(function () {
    $.ajax({
        type: "GET",
        url: "/api/products/all",
        dataType: "json",
        success: function (data) {
            console.log(data);
            $.each(data, function (key, value) {
                // id = value.product_id;
                var products =
                    "<div class='products'><div class='productDetails'><div class='productImage'><img src=" +
                    "/storage/" +
                    value.product_image +
                    " width='50px', height='120px'/></div><div class='productText'><p class='price-container'>Price: Php <span class='price'>" +
                    value.sell_price +
                    "</span></p><p>" +
                    value.description +
                    "</p></div><input type='number' class='qty' name='quantity' min='1' max='5'><p class='productId' hidden>" +
                    value.id +
                    "</p>  </div><button type='button' class='btn btn-primary add' style='margin-top:5px;'>Add to cart</button></div>";
                $("#products").append(products);
            });
        },
        error: function () {
            console.log("AJAX load did not work");
            alert("error");
        },
    });

    $("#products").on("click", ".add", function () {
        productCount++;
        $("#productCount").text(productCount).css("display", "block");
        clone = $(this)
            .siblings()
            .clone()
            .appendTo("#cartProducts")
            .append('<button class="removeProduct">Remove Product</button>');
        var price = parseInt($(this).siblings().find(".price").text());
        priceTotal += price;
        $("#cartTotal").text("Total: $" + priceTotal);
    });

    $(".openCloseCart").click(function () {
        $("#shoppingCart").toggle();
    });


    $("#shoppingCart").on("click", ".removeProduct", function () {
        $(this).parent().remove();
        productCount--;
        $("#productCount").text(productCount);

        // Remove Cost of Deleted Item from Total Price
        var price = parseInt($(this).siblings().find(".price").text());
        priceTotal -= price;
        $("#cartTotal").text("Total: php" + priceTotal);

        if (productCount == 0) {
            $("#productCount").css("display", "none");
        }
    });

    $("#emptyCart").click(function () {
        productCount = 0;
        priceTotal = 0;

        $("#productCount").css("display", "none");
        $("#cartProducts").text("");
        $("#cartTotal").text("Total: $" + priceTotal);
    });
 //checkout
    $("#checkout").click(function () {
        productCount = 0;
        priceTotal = 0;
        let products = new Array();

        $("#cartProducts", "p")
            .find(".productDetails")
            .each(function (i, element) {
                console.log(element);
                let productId = 0;
                let qty = 0;

                qty = parseInt($(element).find($(".qty")).val());
                product_id = parseInt($(element).find($(".productId")).html());

                products.push({
                    product_id: productId,
                    quantity: qty,
                });
            });
        console.log(JSON.stringify(products));
        var data = JSON.stringify(products);

        $.ajax({
            type: "POST",
            url: "/api/product/checkout",
            data: data,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            dataType: "json",
            processData: false,
            contentType: "application/json; charset=utf-8",
            success: function (data) {
                console.log(data);
                alert(data.status);
            },
            error: function (error) {
                alert(data.status);
            },
        });
        $("#productCount").css("display", "none");
        $("#cartProducts").text("");
        $("#cartTotal").text("Total: P" + priceTotal);
        $("#shoppingCart").css("display", "none");

        
    });
});