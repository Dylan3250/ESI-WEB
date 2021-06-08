function addZero(num) {
    return num < 10 ? "0" + num : num;
}

function getFormattedDate(date) {
    date = new Date(date);
    let year = addZero(date.getFullYear());
    let month = addZero(date.getMonth() + 1);
    let day = addZero(date.getDate());
    let hour = addZero(date.getHours());
    let min = addZero(date.getMinutes());
    let sec = addZero(date.getSeconds());

    return day + '/' + month + '/' + year + " " + hour + ":" + min + ":" + sec;
}

function loadMessages() {
    $.getJSON("/api/channels/" + getRoomId() + "/messages", function (data, status) {
        $(".messages").empty();

        if (data.length === 0) {
            $(".messages")
                .append($('<div>').addClass("msg")
                    .append($('<div>').css("margin-bottom", ".5em").addClass("msg-text")
                        .text("Aucun message pour l'instant ! Mettez le premier !"))
                )
        }
        data.forEach((item) => {
            let user = item.displayName + " (" + item.login + ") - " + getFormattedDate(item.added_on);
            $(".messages").append($('<div>').addClass("msg")
                .append($('<div>').addClass("msg-info").text(user))
                .append($('<div>').addClass("msg-text").text(item.content))
            )
        })
    })
}

function loadDynamicAside() {
    $.getJSON("/api/channels/", function (data) {
        $(".lateral").empty();

        data.forEach((item) => {
            if (getRoomId() === item.id) {
                $("h2").text(item.name + " - " + item.topic);
            }

            $(".lateral").append($('<a>').attr("href", "/chat/" + item.id)
                .append($('<div>').addClass("channel")
                    .addClass(getRoomId() === item.id ? "active" : "").text(item.name)
                )
            )
        })
    })
}

function makeForm() {
    $("#addMessage").submit(function (e) {
        e.preventDefault();
        let $this = $(this);

        $(".alert").css("display", "none").empty().removeClass("error");
        $.ajax({
            url: $this.attr('action'),
            type: $this.attr('method'),
            data: new FormData(this),
            contentType: false,
            processData: false,
            dataType: 'json',
            success: (json) => {
                if (json) {
                    loadMessages();
                    $("textarea").val("").focus();
                } else {
                    $(".alert").css("display", "block").addClass("error")
                        .append($("<p>").text("Une erreur est survenue, merci de réessayer."));
                }
            }, error: (request) => {
                let errors = request.responseJSON;
                $.each(errors.errors, function (k, v) {
                    $(".alert").css("display", "block").addClass("error").append($("<p>").text(v));
                })
            }
        })
    })
}

$(document).ready(() => {
    $('textarea').focus();
    loadDynamicAside();
    loadMessages();
    makeForm();
    window.setInterval(loadMessages, 8000);
})
