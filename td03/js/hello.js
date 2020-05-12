let currentDate = new Date();
let format = currentDate.getHours() + ":" + currentDate.getMinutes();
let moment;

function randomBeetween(min, max) {
    return Math.round(Math.random() * (max - min) + min);
}

function rollDice() {
    return randomBeetween(1, 6);
}

function coin() {
    let status;

    if (randomBeetween(1, 2) === 1) {
        status = "face";
    } else {
        status = "pile";
    }

    return status;
}

function calculLuck(nbLancers, piece) {
    let count = 0;

    for (let i = 0; i < nbLancers; i++) {
        if (piece == "pile") {
            count++;
        }
    }

    return Math.round(count / nbLancers * 100);
}

function getTable(x, n) {
    if (n == undefined) {
        n = 10;
    }

    for (let i = 0; i < n; i++) {
        console.log(x + "*" + i + " = " + x * i);
    }
}

function calculFraction(fraction) {
    let term = fraction.split("/");

    if (term.length != 2) {
        throw new Error("Format invalide");
    }

    return term[0] / term[1];
}

function showTab(tab) {
    for (let i = 0; i < tab.length; i++) {
        console.log(tab[i]);
    }
}

function showReversedTab(tab) {
    for (let i = tab.length; i >= 0; i--) {
        console.log(tab[i]);
    }
}

function showForOfTab(tab) {
    for (let item of tab) {
        console.log(item);
    }
}

function max(tab) {
    let value = 0;

    for (let item of tab) {
        item = Number(item);

        if (item > value && (typeof item == "number")) {
            value = item;
        }
    }

    return value;
}

if (currentDate.getHours() <= 5 && currentDate.getHours() >= 0) {
    moment = "Bonne nuit";
} else if (currentDate.getHours() <= 11 && currentDate.getHours() >= 6) {
    moment = "Bon matin";
} else if (currentDate.getHours() <= 17 && currentDate.getHours() >= 12) {
    moment = "Bonne après-midi";
} else {
    moment = "Bonne soirée";
}

// alert(format);
// console.log(format);
document.write("<h1>" + moment + ", il est " + format + " !</h1>");
document.getElementById("time").parentElement.style.display = 'none';
// document.getElementById("time").textContent = format;