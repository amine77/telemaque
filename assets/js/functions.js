
$(function() {
    //affiche formulaire de date
  

   $('.input-group.date').datepicker({
    format: 'mm/dd/yyyy',
    startDate: '-3d'
    });
    
   $('#select-cat').on('change',function(){
       
        var data = {"cat_id": $(this).val()};
        $.post("vendeurs/select_product", data, function(result) {
              result = $.parseJSON(result);
              console.log(result);
        });
   });
   
    $(".add_article").click(function() {
        var data = {"user_article_id": $(this).data('role')};
        var action = "add_article/norm";
        var qty = $(this).data('qty');
        var qtymax = $(this).data('qty-max');

        if (qty < qtymax)
            print_cart(action, data, $(this));

    });
    $("#commande span.btn").on('click', function() {
        $("#cart-order").slideToggle();
    });
    $(".glyphicon-trash").on('click', function() {
        var data = $(this).parent().parent().data('role');

    });


});

function delete_article() {
    var data = $(this).parent().parent().data('role');
}

function delete_sample_article(entity) {
    var ua_id = entity.parent().parent().data('role');
    var data = {"user_article_id": ua_id};
    var action = "delete_sample_article";
    var qty = entity.next('input').data('qty');
    if (qty >= 2)
        print_cart(action, data);
}

function empty_cart() {
    var data = "";
    var action = "empty_cart";
    print_cart(action, data);
}
function add_article(entity) {

    var ua_id = entity.parent().parent().data('role');
    var data = {"user_article_id": ua_id};
    var action = "add_article";
    var qty = entity.prev('input').data('qty');
    var qtymax = entity.prev('input').data('qty-max');

    console.log("qty : " + qty + " qty_max : " + qtymax);
    if (qty < qtymax)
        print_cart(action, data);
}

function print_cart(action, data, entity) {


    var pathArray = window.location.pathname.split('/');

    $.post("/" + pathArray[1] + "/panier/" + action, data, function(result) {

        result = $.parseJSON(result);



        if (action == "add_article/norm") {
            $("#panier span").html(result);
            entity.data('qty', parseInt(entity.data('qty') + 1));
        }
        else {

            $('#bloc_panier').html(result);
        }
        $("#panier span").animate({fontSize: "17px", color: "#AA0000"}, 500).animate({fontSize: "13px", color: "white"}, 300);

    });

}
