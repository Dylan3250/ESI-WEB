$(document).ready(function () {
    $("#add").click(function () {
        $("#list").append($("<li>").text("Je suis le " + ($("li").length + 1) + "-ième élément"));
    })

    $("#remove").click(function () {
        $("#list").children().last().remove();
    })
});