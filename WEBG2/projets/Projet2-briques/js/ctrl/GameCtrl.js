'use strict';
/**
 * Controller for call the game and start / stop it.
 */
class GameCtrl {
    /**
     * Game controller with his view, adds walls of bricks,
     * paddle and ball controller.
     * @param {Game} game : the given game
     * @param {View} view : the given view
     */
    constructor(game, view) {
        this._game = game;
        this._view = view;
        new PaddleCtrl(game, view);
        this._ballCtrl = new BallCtrl(game, view, this);
        this._view.addSprite(game.paddle);
        this._view.addSprite(game.ball);
        this._view.displayLevel(this._game.currentLevel);
        this._view.addSpriteWall(game.wall);
    };

    /**
     * Starts the game (ball).
     */
    play() {
        this.ballStartWait();
    };

    /**
     * Displays the message to start the game and waits for the player to click.
     */
    ballStartWait() {
        this._view.showMessage("Click to start");
        $(document).mouseup(() => this.ballStart());
    };

    /**
     * Hides the message, removes the event and starts the ball.
     */
    ballStart() {
        $(document).off("mouseup");
        this._view.hideMessage();
        this._ballCtrl.start();
    };
};
