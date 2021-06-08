'use strict';
/**
 * Defines the size of an element (width and height).
 */
class Dimension {
    /**
     * Defines the size of an element (width and hieght).
     * @param {number} width : the width of element
     * @param {number} height : the height of element
     */
    constructor(width, height) {
        this._width = width;
        this._height = height;
    };

    /**
     * Gets the width of the element.
     * @returns {number} the width of element
     */
    get width() {
        return this._width;
    };

    /**
     * Gets the height of the element.
     * @returns {number} the height of element
     */
    get height() {
        return this._height;
    };
};
