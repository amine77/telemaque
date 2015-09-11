
$(function() {
    //affiche formulaire de date


  /*  $('.input-group.date').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });*/
    var count = 1;
    $('#btn_add_spec').on('click',function(){
        var html = "<tr height='50px'>"+
                        "<td><input type='text' name='spec"+count+"' class='form-control' placeholder='Libellé caracteristique'/></td>"+
                        "<td>&nbsp;&nbsp;<span class='glyphicon glyphicon-remove-circle' style='cursor:pointer' onclick='$(this).parent().parent().remove()'></span></td>"+
                    "</tr>";
        $('#input_spec_add table').append(html);
        
    });
    
    $("li", "#btselmulti ").click(function() {
        var action = $(this).attr("id");
        switch (action) {
            case "addall":
                var ids = $("#chooseplaylist option");
                var dest = $("#selplaylist");
                break;
            case "addsel":
                var ids = $("#chooseplaylist option:selected");
                var dest = $("#selplaylist");
                break;
            case "quitsel":
                var ids = $("#selplaylist option:selected");
                var dest = $("#chooseplaylist");
                break;
            case "quitall":
                var ids = $("#selplaylist option");
                var dest = $("#chooseplaylist");
                break;
        }
        changedata(ids, dest);
        putsels();
    });


    //CREATION NOUVELLE ARTICLE
    $('#select-cat-art').on('change', function() {
        if ($(this).val() == 0) {
            $('.require_art').hide();
            $('#content-select-product').hide();
        }
        else {
            $('#content-select-product,.require_art').show();

        }
    });

//CREATION NOUVELLE EXEMPLAIRE
    $('#select-cat').on('change', function() {
        if ($(this).val() != 0)
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


}
);

function delete_article(entity) {
    var ua_id = entity.parent().parent().data('role');
    var data = {"user_article_id": ua_id};
    var action = "delete_article";

    print_cart(action, data, entity);
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
            $("#panier #panier-nbarticle").html(result);
            entity.data('qty', parseInt(entity.data('qty') + 1));
        }
        else {
            if (action == "delete_article") {
                var qtyini = $("#panier #panier-nbarticle").html();
                var qty = entity.parent().find('input').data('qty');

                $("#panier #panier-nbarticle").html(qtyini - qty);
            }
            $('#bloc_panier').html(result);
        }
        $("#panier #panier-nbarticle").animate({fontSize: "17px", color: "#AA0000"}, 500).animate({fontSize: "13px", color: "white"}, 300);

    });

}


function select_art() {

    $('#content-select-product select').on('change', function() {
        if ($(this).val() != 0)
            $('.require_art').show();
        else
            $('.require_art').hide();
        var data = {"article_id": $(this).val()};
        $.post("vendeurs/select_product", data, function(result) {
            result = $.parseJSON(result);
            if (result != 'vide') {


                $.each(result, function(index, value) {
                    html += '<tr height="50px">' +
                            '<td class="col-xs-2 col-sm-2 col-md-2">' + value.specification_label + '</td>' +
                            '<td class="col-xs-2 col-sm-2 col-md-2"><input type="text" name="spec_id_' + value.specification_id + '" class="form-control"/></td>'
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


/* -- Ecrit les éléments sélectionnés dans le select de destination et les efface de celui d'origine -- */
function changedata(ids, dest) {
    ids.each(function() {
        dest.append("<option value='" + $(this).val() + "'>" + $(this).text() + "</option>");
    })
    $(ids).remove();
}

/* -- Ecrit les élements sélectionnés dans le hidden (text pour l'exemple) -- */
function putsels() {
    var listsels = new Array();
    $("#selplaylist option").each(function() {
        listsels.push($(this).text());
    })
    $("#playlist").val(listsels.join(","));
}
