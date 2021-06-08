/**
 * Shows in console each description of each quiz.
 */
function showDescription() {
    data.forEach(element => console.log(element["description"]));
}

/**
 * Calls methods that should execute when the page is loaded.
 */
function main() {
    showDescription();
}
