'use strict';
/**
 * Calls methods that should execute when the page is loaded.
 */
function main() {
    const game = new Game();
    const view = new View();
    const gameCtrl = new GameCtrl(game, view);
    gameCtrl.play();
};
