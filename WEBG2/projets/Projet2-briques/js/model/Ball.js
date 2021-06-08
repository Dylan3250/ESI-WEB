'use strict';
/**
 * Defines the ball object of the game.
 */
class Ball extends Sprite {
    /**
     * Defines the unique id, position, dimension and the movement of the ball.
     * @param {String} id : the unique ball identifier
     * @param {Position} pos : the position of the upper left corner of the ball
     * @param {Dimension} dimension : the given dimension for the ball
     * @param {Movement} movement : the desired ball movement
     * @param {number} speed : the speed of the ball
     */
    constructor(id, pos, dimension, movement, speed) {
        super(id, "ball", pos, dimension);
        this._movement = movement;
        this._speed = speed;
    };

    /**
     * Gets the mouvement of the ball.
     * @returns {Movement} : the mouvement of the ball.
     */
    get movement() {
        return this._movement;
    };

    /**
     * Gets the speed of the ball.
     * @returns {number} : the speed of the ball.
     */
    get speed() {
        return this._speed;
    };

    /**
     * Sets the speed of the ball.
     * @param {number} speed : the given speed for the ball.
     */
    set speed(speed) {
        this._speed = speed;
    };

    /**
     * Increases the speed of the ball depending on what is the given speed.
     * @param {number} newSpeed : the given speed to update the deltaX and deltaY
     */
    addSpeed(newSpeed) {
        this._speed += newSpeed;
    };

    /**
     * Defines the new position on the ball after movement.
     */
    move() {
        this._sceneCollision(this.topLeft);
        const newX = this.topLeft.x + this._movement.deltaX * this._speed;
        const newY = this.topLeft.y + this._movement.deltaY * this._speed;
        this._topLeft = new Position(newX, newY);
    };

    /**
     * Checks if the ball is not in the corner. If there is in the corner,
     * the movement is reversed, otherwise the movement is unchanged.
     * @param {Position} position : the given position to check
     */
    _sceneCollision(position) {
        const rightCorner = WIDTH_SCENE - this.dimension.width;

        // Horizontal check
        if (position.x < 0 || position.x > rightCorner) {
            this._movement.reverseX();
        };

        // Vertical check
        if (position.y < 0) {
            this._movement.reverseY();
        };
    };
};
