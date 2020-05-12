$(document).ready(function () {
    let data = [{
        "answer": "12",
        "explain": "Le + entre 2 chaines les concatène"
    },
    {
        "answer": "3",
        "explain": "Le + entre 2 entiers les additionne"
    },
    {
        "answer": "1+2=12",
        "explain": "Le premier + concatène (en transformant le 1 en chaine). Idem pour le second +"
    },
    {
        "answer": "1+2=3",
        "explain": "Les parenthèses impliquent qu'on fait le second + (addition). Ensite, le premier + concatène."
    },
    {
        "answer": "Afficher OK!",
        "explain": "la condition est en fait une assignation qui met ok à vrai. Du coup, la condition est vraie."
    }];

    $(".answer").click(function () {
        nQuest = $(this).parent().parent().parent().index();
        saveParent = $(this).parent();
        $(this).remove();
        saveParent.append($("<output>").text(data[nQuest]["answer"]));
    });

    $(".explain").click(function () {
        nQuest = $(this).parent().parent().parent().index();
        saveParent = $(this).parent();
        $(this).remove();
        saveParent.text(saveParent.text() + data[nQuest]["explain"]);
    });
});