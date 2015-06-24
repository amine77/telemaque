
$(function () {

    $(".add_article").click(function () {

        var data = {"id_article": $(this).data('role')};
        var nb_article = parseInt($("#panier span").html());

        $.post("panier/add_article", data, function (result) {
     
            $("#panier span").html(result);
        },'json');
    });


});

