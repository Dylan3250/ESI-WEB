const SEQUENCE_SIZE = 7;
const MEMORIZATION_DURATION = 3;

let array = [];
let currentNumber;

// Mélange le tableau donné
function shuffle(tab) {
    for (let i = tab.length - 1; i > 0; i--) {
        let j = Math.floor(Math.random() * (i + 1));
        [tab[i], tab[j]] = [tab[j], tab[i]];
    }
};

// Crée une séquence mélangée avec les valeurs de 1 à 7.
// Retourne : un tableau d’entiers.
function createShuffledSequence(nb) {
    for (let i = 1; i <= nb; i++) {
        array.push(i);
    }
    shuffle(array)
    return array;
};

// Affiche la séquance de nombres
function showSequence(sequence) {
    for (let i = 0; i < sequence.length; i++) {
        $("#sequence").children().eq(i).text(sequence[i])
    }
};

// Cache la séquance de nombres
function hideSequence() {
    $("#sequence").children()
        .empty()
        .each(function () {
            $($(this)).click(clickNumber);
        });
}

// Action sur le clique d'un bouton
function clickNumber() {
    let index = $(this).index();
    let nombre = array[index];
    console.log(nombre + " = " + currentNumber)
    if (nombre === currentNumber) {
        if (currentNumber === SEQUENCE_SIZE) {
            end("gagné");
        }
        $(this).addClass("right");
        $("#sequence").children().eq(index).text(nombre);
        currentNumber++;
    } else {
        $(this).addClass("wrong");
        end("perdu");
    }
}

// Fin de la partie
function end(message) {
    $("#info").removeClass("hidden");

    if (message === "gagné") {
        $("#info").addClass("success").text("Bravo ! Vous avez gagné !");
    } else {
        $("#info").addClass("error").text("Dommage ! Vous avez perdu !");
    }

    showSequence(array);

    $("#sequence").children()
        .each(function () {
            $($(this)).prop("disabled", true);
        });

    $("#run").removeClass("hidden").text("Relancer").click(function () {
        location.reload();
    })
}

// Lance le jeu (affiche et cache le bouton)
function startGame() {
    currentNumber = 1;
    setTimeout(hideSequence, MEMORIZATION_DURATION * 1000);
    array = createShuffledSequence(SEQUENCE_SIZE);
    showSequence(array);
    $("#run").addClass("hidden");
};

// Lance le programme principal et ses mécaniques
function main() {
    for (let i = 0; i < SEQUENCE_SIZE; i++) {
        $("#sequence").append($("<button>"));
    }

    $("#run").click(startGame);
};