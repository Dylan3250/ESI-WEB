$(document).ready(function () {

    $("#sendCommentary").click(function () {
        let name = $("[name=name]");
        let commentary = $("[name=commentary]");
        let accept = $("[name=accept]:checked");

        $("#commentaries #info")
            .removeClass("error")
            .removeClass("success")
            .addClass("hidden")
            .empty();

        if (name.val() != "" && commentary.val() != "") {
            if (accept.val() != undefined) {
                let formattedDate = new Date();
                let day = formattedDate.getDate();
                let month = formattedDate.getMonth();

                $("#commentaries h2").removeClass("hidden");
                $("#commentaries")
                    .append($("<p>").text(`Le ${day}/${month}, ${name.val()} a écrit : ${commentary.val()}`));
            };

            $("#commentaries #info")
                .text("Votre commentaire a correctement été ajouté !")
                .addClass("success")
                .removeClass("hidden");

            accept.prop("checked", false);
            name.val("");
            commentary.val("");
        } else {
            $("#commentaries #info")
                .text("Veuillez remplir tous les champs du formulaire !")
                .addClass("error")
                .removeClass("hidden");
        };
    })
});