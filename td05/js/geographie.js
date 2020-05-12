$(document).ready(function () {

    let countries = [{
        "country": "Allemagne",
        "capital": "Berlin"
    },
    {
        "country": "Autriche",
        "capital": "Vienne"
    },
    {
        "country": "Belgique",
        "capital": "Bruxelles"
    },
    {
        "country": "Bulgarie",
        "capital": "Sofia"
    }, {
        "country": "Chypre",
        "capital": "Nicosie"
    },
    {
        "country": "Danemark",
        "capital": "Copenhague"
    }];

    for (countrie of countries) {

        $("#countries").append($("<tr>")
            .append($("<td>").text(countrie["country"]))
            .append($("<td>").text(countrie["capital"]))
        );

        console.log(`La capitale de ${countrie["country"]} est ${countrie["capital"]}`);
    }
});