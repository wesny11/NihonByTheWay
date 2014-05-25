$(function() {
    $(".basket tr .remove input").click(function() {
        var id = $(this).val();
        $.ajax({
            type: "GET",
            url: "basket-action.php",
            data: "remove=" + id,
            success: function() {
                $(".basket tr .remove input[value=" + id + "]").parent().parent().fadeOut(500, function() {
                    $(this).remove();
                    calcPrice();
                });
            },
            error: function() {
                window.location("basket-action.php?remove="+id);
            }
        });
    });
     
    $(".basket tr .quantity input").change(function() {
        var id = $(".basket tr .remove input").val();
        var quantity = $(this).val();
        $.ajax({
            type: "GET",
            url: "basket-action.php",
            data: "id=" + id + "&quantity=" + quantity,
            success: function() {
                var startColor = $(".basket tr .remove input").parent().parent().hasClass("odd") ? "#eee" : "#fff";
                $(".basket tr .remove input").parent().parent().find("td").animate({ backgroundColor: "#ff8" }, 100).animate({ backgroundColor: startColor }, 800);
                calcPrice();
            },
            error: function() {
                window.location("basket-action.php?id=" + id + "&quantity=" + quantity);
            }
        });
    });
});
 
function calcPrice() {
    var totalPrice = 0;
    $(".basket tr .quantity").parent().each(function() {
        var quantity = $(".quantity input", this).val();
        var price = $(".price", this).text().slice(0, -1);
        var extendedPrice = quantity*price;
        totalPrice += extendedPrice;
         
        $(".extended-price", this).html(extendedPrice + "€");
        $("#total-price").html(totalPrice + "€");
    });
    if ( totalPrice == 0 ) {
        $(".basket").parent().replaceWith("<p class='center'>You have no items in your cart.</p>");
    }
}