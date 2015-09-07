
$(function() {
    //affiche formulaire de date


    $('.input-group.date').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });

    $('#select-cat').on('change', function() {
       if($(this).val()!=0)
            $('.require_art').hide();
        var data = {"cat_id": $(this).val()};
        $.post("vendeurs/select_cat", data, function(result) {
            result = $.parseJSON(result);
            if (result != 'vide') {

                var html = '<select name="select_product" id="select-product" class="form-control input-sm">' +
                        '<option value="0">Selectionner un article</option>';
                $.each(result, function(index, value) {
                    html += '<option value="' + value.article_id + '">' + value.article_label + '</option>';
                });
                html += '</select>';

                $('#content-select-product .form-group').html(html);
                $('#content-select-product').show();
                console.log(result);

                var html = "";
                select_art();
            }
            else
                $('#content-select-product').hide();
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


function select_art(){
    
    $('#content-select-product select').on('change', function() {
        if($(this).val()!=0)
            $('.require_art').show();
        else
             $('.require_art').hide();
        var data = {"article_id": $(this).val()};
        $.post("vendeurs/select_product", data, function(result) {
            result = $.parseJSON(result);
            if (result != 'vide') {

              
                $.each(result, function(index, value) {
                    html += '<tr height="50px">'+
                                '<td class="col-xs-2 col-sm-2 col-md-2">'+value.specification_label+'</td>'+
                                '<td class="col-xs-2 col-sm-2 col-md-2"><input type="text" name="spec_id_'+value.specification_id+'" class="form-control"/></td>'
                             '</tr>';
                             
                });

                $('#input-spec table').html(html);
                $('#content-select-spec,#input-spec').show();
                console.log(result);

                var html = "";
            }
            else
                $('#content-select-spec').hide();
        });
    });


}