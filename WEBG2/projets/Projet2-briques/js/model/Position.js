'use strict';
/**
 * Defines the position of an element on the scene.
 */
class Position {
    /**
     * Defines the x and y position with given values for an element.
     * @param {number} x : the given X coordinate for the element on the scene
     * @param {number} y : the given Y coordinate for the element on the scene
     */
    constructor(x, y) {
        this._x = x;
        this._y = y;
    };

    /**
     * Gets the x coordinate of the position.
     * @returns {number} the x coordinate
     */
    get x() {
        return this._x;
    };

    /**
     * Gets the y coordinate of the position.
     * @returns {number} the y coordinate
     */
    get y() {
        return this._y;
    };

    /**
     * Defines the new x coordinate of the position.
     * @param {number} newX the new x given coordinate
     */
    set x(newX) {
        this._x = newX;
    };

    /**
     * Defines the new y coordinate of the position.
     * @param {number} newY the new y given coordinate
     */
    set y(newY) {
        this._y = newY;
    };
};
