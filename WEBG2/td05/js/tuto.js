function encadrer() {
    $("p").css("border", "thin solid");
}

function remplacerTexte() {
    $("#monPar").text("Je suis inséré avec jQuery");
}

$(document).ready(function () {
    remplacerTexte();
    encadrer();

    $("#action").click(function () {
        $("#monPar").addClass("maClasse");
    });
});
