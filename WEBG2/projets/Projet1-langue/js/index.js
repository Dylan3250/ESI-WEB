/**
 * Shows in the select with id " quizId " each description of each quiz.
 */
function showDescription() {
    data.forEach(element =>
        $("#quizId").append($("<option>")
            .val(element["id"])
            .text(element["description"])
        )
    );
};

/**
 * Calls methods that should execute when the page is loaded.
 */
function main() {
    showDescription();
};