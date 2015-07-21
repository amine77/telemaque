
$(function() {

    $(".add_article").click(function() {
   
        var data = {"id_article": $(this).data('role')};
        var nb_article = $("#panier span").html();
        nb_article = parseInt(nb_article);
        var pathArray = window.location.pathname.split('/');
          
        $.post("/" + pathArray[1] + "/panier/add_article", data, function(result) {
            console.log(nb_article);
            $("#panier span").html(result);
            $("#panier span").animate({fontSize: "17px", color: "#AA0000"}, 500).animate({fontSize: "13px", color: "white"}, 300);
     
       });

    });
});

