$(document).ready(function () {

    $(".carre, .cercle")
        .hover(function () {
            $(this).addClass("hover");
        }, function () {
            $(this).removeClass("hover");
        })
        .click(function (e) {
            $(this).toggleClass("hover");
        }
    ); 
});