'use strict';
/**
 * Controller for the ball.
 * Suggests methods to start/stop the ball and make it move.
 */
class BallCtrl {
    /**
     * Ball controller with the view and the game
     * @param {Game} game : the given game
     * @param {View} view : the given view
     * @param {GameCtrl} gameCtrl : the controller of the fame
     */
    constructor(game, view, gameCtrl) {
        this._game = game;
        this._view = view;
        this._gameCtrl = gameCtrl;
    };

    /**
     * Starts the ball.
     */
    start() {
        this._moveListener = setInterval(() => this.move(), 10);
    };

    /**
     * Moves the ball one step (defined by its movement) and refresh the view
     * with new position of ball, deleted bricks and update the new score.
     * If the game is lost or won, the ball is stopped if the player is not
     * alive and calls the view to display a message.
     */
    move() {
        this._view.updateSprite(this._game.ball);
        this._view.removeSprite(this._game.ballMove());
        this._view.updateScore(this._game.player.score);
        this._checkStatus();
        this._view.displayLife(this._game.player.life);
        this._view.displayLevel(this._game.currentLevel);
    };

    /**
     * Stops the ball.
     */
    _stop() {
        clearInterval(this._moveListener);
    };

    /**
     * Checks if the game is done (if the player has won or lost). If the game
     * has lost or won, the ball is stopped if the player is not alive and
     * calls the view to display a message.
     */
    _checkStatus() {
        if (this._game.isWon()) {
            this._stop();
            if (LEVELS[this._game.currentLevel + 1] === undefined) {
                this._view.showMessage("Congratulations, the game is done !");
            } else {
                this._game.increasesLevel();
                this._game.reloadWall();
                if (this._game.player.life < 10) {
                    this._game.player.addLife();
                };
                this._restart();
                this._view.showMessage("Congratulations, this level is done !");
            };
        } else if (this._game.isLost()) {
            this._game.player.removeLife();
            if (this._game.player.isAlive()) {
                this._restart();
            } else {
                this._stop();
                this._view.showMessage("Lost ! You have no more life!");
            };
        };
    };

    /**
     * Restarts the game (with one life less and new position for the ball)
     */
    _restart() {
        this._stop();
        this._game.resetBall();
        this._view = new View();
        this._gameCtrl = new GameCtrl(this._game, this._view);
        this._gameCtrl.play();
    };
};
