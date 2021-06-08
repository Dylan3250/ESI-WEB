'use strict';
/**
 * Defines the movement with a delta X and delta Y.
 */
class Movement {
    /**
     * Defines the deltaX and deltaY for this movement object.
     * @param {number} deltaX : the deltaX for this movement
     * @param {number} deltaY : the deltaY for this movement
     */
    constructor(deltaX, deltaY) {
        this._deltaX = deltaX;
        this._deltaY = deltaY;
    };

    /**
     * Gets the deltaX for this movement.
     * @returns {number} the deltaX for this movement
     */
    get deltaX() {
        return this._deltaX;
    };

    /**
     * Gets the deltaY for this movement.
     * @returns {number} the deltaY for this movement
     */
    get deltaY() {
        return this._deltaY;
    };

    /**
     * Reverses the X movement in another direction.
     */
    reverseX() {
        this._deltaX *= -1;
    };

    /**
     * Reverses the Y movement in another direction.
     */
    reverseY() {
        this._deltaY *= -1;
    };
};
