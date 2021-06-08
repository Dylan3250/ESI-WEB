let number = 1;

function update() {
    $("#compteur").text(number);
}

$(document).ready(function () {
    update();

    $("#add").click(function () {
        number += 1;
        update();
    });

    $("#remove").click(function () {
        number -= 1;
        update();
    });
});