let chosenQuiz = [];
let nQuestion = 0;
let score = 0;

/**
∗ Shuffle the array.
* @param {∗[]} array
*/
function shuffle(array) {
    let counter = array.length;
    while (counter > 0) {
        let index = Math.floor(Math.random() * counter);
        counter--;
        // Swap positions counter and index in the array.
        [array[counter], array[index]] = [array[index], array[counter]];
    };
};

/**
 * Gets the quiz ID in the URL and saves the current quiz in global variable.
 */
function initChosenQuiz() {
    let id = new URL(location.href).searchParams.get("quizId");
    let i = 0;
    while (i < data.length && data[i]["id"] != id) {
        i++;
    };
    chosenQuiz = data[i];
};

/**
 * Adds visual informations of the page (possibilities, number, description, ..)
 */
function initUI() {
    let fusion = chosenQuiz["questions"][nQuestion]["answer"] + " "
        + chosenQuiz["questions"][nQuestion]["extras"];
    let arrayFusion = fusion.split(" ");
    shuffle(arrayFusion);

    $("#other, #again, #alert, #end").hide();
    $("#description").text(chosenQuiz["description"]);
    $("#number").text(nQuestion + 1);
    $("#question").text(chosenQuiz["questions"][nQuestion]["question"]);
    $("#check").click(procesAnswer);
    $("#next").hide();

    arrayFusion.forEach(item => $("#possibilities")
        .append($("<button>")
            .text(item)
            .click(moveToAnswer)
        )
    );
};

/**
 * Moves the clicked button in answer box and adds the reverse function to it.
 */
function moveToAnswer() {
    $("#answer").append($(this).click(moveToPossibilites));
};

/**
 * Moves the clicked button in possibilities box and adds the reverse function.
 */
function moveToPossibilites() {
    $("#possibilities").append($(this).click(moveToAnswer));
};

/**
 * Checks if the sent answer is right.
 * @returns {boolean} true if the answer is right, false otherwise
 */
function isCorrectAnswer() {
    let answers = $("#answer").children();
    let goodAnswer = chosenQuiz["questions"][nQuestion]["answer"].split(" ");
    let isCorrect = answers.length === goodAnswer.length;
    let i = 0;

    while (isCorrect && i < goodAnswer.length
        && $(answers[i]).text() === goodAnswer[i]) {
        i++;
    };

    return i === goodAnswer.length;
};

/**
 * Displays the success or error message based on the response sent.
 */
function getMessage() {
    if (isCorrectAnswer()) {
        $("#alert")
            .show()
            .addClass("success")
            .text("Vous avez trouvé la bonne réponse !");
        score++;
    } else {
        let goodAnswer = chosenQuiz["questions"][nQuestion]["answer"];
        $("#alert")
            .show()
            .addClass("error")
            .text("Vous n'avez pas trouvé la bonne réponse ! "
                + "La bonne réponse était \"" + goodAnswer + " !\"");
    };

    if (isLastQuestion()) {
        $("#end")
            .show()
            .addClass("info")
            .text(`Fini ! Vous avez eu un score de ${score} !`);
    };
};

/**
 * Process the form, displays the message and block the game.
 */
function procesAnswer() {
    $("#check").hide();
    $("#game button").attr("disabled", true);
    getMessage();

    if (isLastQuestion()) {
        $("#again").show().click(loadNext);
        $("#other").show().click(() => {
            window.location.replace("index.html");
        });
    } else {
        $("#next").show().click(loadNext);
    };
};

/**
 * Resets all messages and buttons inserted by the probably precedent question.
 */
function resetGame() {
    $("#alert, #end")
        .removeClass()
        .text("");

    $("#other, #again, #alert, #end").hide();
    $("#answer, #possibilities").empty();
    $("#check").show();
};

/**
 * Loads the next question, updates what is displayed and call again the main.
 * Or if the game is over, offer the same new test or another.
 */
function loadNext() {
    // Reset click events on buttons
    $("#check, #next, #again").off("click");

    if (isLastQuestion()) {
        nQuestion = 0;
        score = 0;
    } else {
        nQuestion++;
    };

    resetGame();
    initUI();
};

/**
 * Checks if the test is finished.
 * @returns {boolean} true if the test is finish, false otherwise
 */
function isLastQuestion() {
    return ((chosenQuiz["questions"].length - 1) == nQuestion) ? true : false;
};

/**
 * Calls methods that should execute when the page is loaded.
 */
function main() {
    initChosenQuiz();
    initUI();
};
