$(document).ready(() => {
    $(".titleRepo").on("click", function () {
        $.getJSON("/api/repositories/" + $(this).attr("data-id"), (data) => {

            $("#infoDepot")
                .empty()
                .append($("<h3>").text("Nom du dépot"))
                .append($("<span>").text(data.repository_name))
                .append($("<h3>").text("Nom de l'utilisateur"))
                .append($("<span>").text(data.user_name))
                .append($("<h3>").text("Liste des commits"))
                .append($("<ul>").attr('id', 'listCommit'));

            data.commit.forEach(e => {
                $("#listCommit").append($("<li>").text(e.date != null
                    ? `[${e.date}] ${e.message}`
                    : "Aucun commit pour l'instant"));
            });
        });
    });
});
