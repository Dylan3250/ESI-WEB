'use strict';
/**
 * Defines the paddle object of the game.
 */
class Paddle extends Sprite {
    /**
     * Defines the unique id, position and dimension of the paddle.
     * @param {String} id : the unique paddle identifier
     * @param {Position} left : the upper left corner position of the paddle
     * @param {Dimension} dimension : the given dimension for the paddle
     */
    constructor(id, left, dimension) {
        super(id, "paddle", left, dimension);
    };

    /**
     * Changes the position of the paddle on the left of scene.
     * @param {number} left : the given left offset in pixel for the paddle
     */
    moveTo(left) {
        const centerPaddle = this.dimension.width / 2;
        this._topLeft = new Position(
            this._checkBound(left - centerPaddle),
            HEIGHT_SCENE - this.dimension.height
        );
    };

    /**
     * Checks if the given offset is possible, if it is too big or too small,
     * the offset is adapted of the maximum of scene or the minimum of scene.
     * @param {number} number : the given left offset in pixel for the paddle
     * @returns {number} the valid left offset
     */
    _checkBound(number) {
        const maxBound = WIDTH_SCENE - this.dimension.width;
        let validValue = number;

        if (number > maxBound) {
            validValue = maxBound;
        } else if (number < 0) {
            validValue = 0;
        };
        return validValue;
    };
};
