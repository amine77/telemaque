
$(function () {





    $("button").click(function () {

        var data = {"id_article": $(this).data('role')};
        var nb_article = parseInt($("#panier span").html());
   
        $.post("panier/add_article", data, function () {
            nb_article++;
            $("#panier span").html(nb_article);
        });
    });




});

