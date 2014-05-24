$(function() {
    $('.basket tr .remove input').click(function() {
        var id = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'cart-action.php',
            data: 'remove[]=' + id,
            success: function() {
                $('.basket tr .remove input[value=' + id + ']').parent().parent().fadeOut(500, function() {
                    $(this).remove();
                    calcPrice();
                });
            },
            error: function() {
                window.location('basket-action.php?remove[]='+id);
            }
        });
    });

    $('.basket tr .quantity input').change(function() {
        var id = $(this).attr('name').slice(9, -1);
        var quantity = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'cart-action.php',
            data: 'quantity[' + id + ']=' + quantity,
            success: function() {
                var startColor = $(".basket tr .quantity input[name*=" + orderCode + "]").parent().parent().hasClass("odd") ? "#eee" : "#fff";
                $(".basket tr .quantity input[name*=" + orderCode + "]").parent().parent().find("td").animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: startColor }, 800);
                calcPrice();
            },
            error: function() {
                window.location("basket-action.php?quantity[" + orderCode + "]=" + quantity);
            }
        });
    });

    function calcPrice() {
        var totalPrice = 0;
        $(".basket tr .quantity").parent().each(function() {
            var quantity = $(".quantity input", this).val();
            var price = $(".price", this).text().slice(1);
            var extendedPrice = quantity*unitPrice;
            totalPrice += extendedPrice;
             
            $(".extended-price", this).html("$" + extendedPrice);
            $("#total-price").html("$"+totalPrice);
        });
        if ( totalPrice == 0 ) {
            $(".basket").parent().replaceWith("<p class='center'>You have no items in your cart.</p>");
        }
    }
});