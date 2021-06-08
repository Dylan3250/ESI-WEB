'use strict';
/**
 * Controller for the paddle. It make it follow the mouse.
 */
class PaddleCtrl {
    /**
     * Starts controlling the paddle with the mouse.
     * @param {Game} game : the given game
     * @param {View} view : the given view
     */
    constructor(game, view) {
        $(document).mousemove(this._moveMouse.bind(this, game.paddle, view));
    };

    /**
     * Called when the mouse is moved.
     * It moves the paddle (horizontally) where the mouse is.
     * @param {Paddle} paddle : the given paddle
     * @param {View} view : the given view
     * @param {MouseEvent} evt : the mouse event
     */
    _moveMouse(paddle, view, evt) {
        paddle.moveTo(evt.clientX - view.sceneLeft());
        view.updateSprite(paddle);
    };
};
