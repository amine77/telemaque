
$(function() {

    $(".add_article").click(function() {
        var data = {"id_article": $(this).data('role')};
        add_article(data,$(this));

    });


    $(".glyphicon-minus-sign").on('click', function() {
        console.log("moins");
    });
    $(".glyphicon-plus-sign").on('click', function() {
        var data = $(this).parent().parent().data('role');
         add_article(data,$(this));
    });
     $(".glyphicon-trash").on('click', function() {
           var data = $(this).parent().parent().data('role');
    });


});


function add_article(data,entity,panier,action) {
 

    var pathArray = window.location.pathname.split('/');

    $.post("/" + pathArray[1] + "/panier/add_article", data, function(result) {

        $("#panier span").html(result);
        $("#panier span").animate({fontSize: "17px", color: "#AA0000"}, 500).animate({fontSize: "13px", color: "white"}, 300);
        if(panier){
            entity.$('input').hide();
        }
        

    });

}
