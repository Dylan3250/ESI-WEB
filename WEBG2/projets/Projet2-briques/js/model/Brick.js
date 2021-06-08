'use strict';
/**
 * Defines an brick object in the game.
 */
class Brick extends Sprite {
    /**
     * Defines the unique id, position, dimension and the movement of the ball.
     * @param {String} id : the unique brick identifier
     * @param {Position} left : the given position for the brick
     * @param {Dimension} dimension : the given dimension for the brick
     */
    constructor(id, left, dimension) {
        super(id, "brick", left, dimension);
    };
};
