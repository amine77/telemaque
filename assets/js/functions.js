
$(function() {

    $(".add_article").click(function() {
        var data = {"user_article_id": $(this).data('role')};
        var action = "add_article/norm";
        var qty = $(this).data('qty');
        var qtymax = $(this).data('qty-max');
        if (qty < qtymax)
          print_cart(action, data ,$(this));

    });

    $("#empty-cart").on('click', function() {
        var data ="";
        var action = "empty_cart";
        print_cart(action, data);
    });
    $(".glyphicon-minus-sign").on('click', function() {
        var ua_id = $(this).parent().parent().data('role');
        var data = {"user_article_id": ua_id};
        var action = "delete_sample_article";
        var qty = $(this).next('input').data('qty');
        var qtymax = $(this).next('input').data('qty-max');
        print_cart(action, data);
    });

    $(".glyphicon-plus-sign").on('click', function() {
        var ua_id = $(this).parent().parent().data('role');
        var data = {"user_article_id": ua_id};
        var action = "add_article";
        var qty = $(this).prev('input').data('qty');
        var qtymax = $(this).prev('input').data('qty-max');
        console.log("qty : " + qty + " qty_max : " + qtymax);
        if (qty < qtymax)
            print_cart(action, data);

    });
    $(".glyphicon-trash").on('click', function() {
        var data = $(this).parent().parent().data('role');
    });


});


function print_cart(action, data,entity) {


    var pathArray = window.location.pathname.split('/');
    
    $.post("/" + pathArray[1] + "/panier/" + action, data, function(result) {
        
        result = $.parseJSON(result);
        
      
      
        if(action == "add_article/norm"){
           $("#panier span").html(result);
          entity.data('qty',parseInt(entity.data('qty')+1)); 
        }
        else{
            
            $('#bloc_contenu').html(result);
        }
          $("#panier span").animate({fontSize: "17px", color: "#AA0000"}, 500).animate({fontSize: "13px", color: "white"}, 300);
       
    });

}
