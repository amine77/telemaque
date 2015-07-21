
$(function() {

    $(".add_article").click(function() {
   
        var data = {"id_article": $(this).data('role')};
        var nb_article = $("#panier span").html();
        nb_article = parseInt(nb_article);
        var pathArray = window.location.pathname.split('/');
          console.log(nb_article);
        $.post("/" + pathArray[1] + "/panier/add_article", data, function(result) {
   
            $("#panier span").html(result);
            $("#panier span").animate({fontSize: "17px", color: "#AA0000"}, 500).animate({fontSize: "13px", color: "white"}, 300);
     
       });

    });
});

