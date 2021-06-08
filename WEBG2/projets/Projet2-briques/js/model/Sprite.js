'use strict';
/**
 * Defines a element of the game with a id, type, position and dimension.
 */
class Sprite {
    /**
     * Defines the unique id, position, dimension and the movement of the sprite.
     * @param {String} id : the unique sprite identifier
     * @param {String} type : the type of sprite
     * @param {Position} topLeft : the position of the upper left corner of the sprite
     * @param {Dimension} dimension : the given dimension for the sprite
     */
    constructor(id, type, topLeft, dimension) {
        this._id = id;
        this._type = type;
        this._topLeft = topLeft;
        this._dimension = dimension;
    };

    /**
     * Gets the unique id of the sprite.
     * @returns {String} the unique id of the sprite
     */
    get id() {
        return this._id;
    };

    /**
    * Gets the type of the sprite.
    * @returns {String} the type of the sprite
    */
    get type() {
        return this._type;
    };

    /**
     * Gets the upper left corner of sprite (x and y).
     * @returns {Position} the position of sprite (x and y)
     */
    get topLeft() {
        return this._topLeft;
    };

    /**
     * Gets the dimension of the sprite (height and width).
     * @returns {Dimension} the height and width of the sprite
     */
    get dimension() {
        return this._dimension;
    };

    /**
     * Checks if this sprite is on collision with another and return
     * with which direction it is colliding.
     * @param {Sprite} sprite the given sprite to check collider
     * @returns {String[]} array with direction(s) of the collison
     */
    isCollider(sprite) {
        let onCollider = [];
        // Class sprite object coordinates
        const rightCorner = this._topLeft.x + this._dimension.width;
        const bottomCorner = this._topLeft.y + this._dimension.height;
        // Given sprite coordinates
        const rightSpriteCorner = sprite.topLeft.x + sprite.dimension.width;
        const bottomSpriteCorner = sprite.topLeft.y + sprite.dimension.height;

        // Checks if there is collision (without looking witch sides)
        if ((this._topLeft.y <= bottomSpriteCorner &&
            sprite.topLeft.y <= bottomCorner)
            && (rightSpriteCorner >= this._topLeft.x &&
                sprite.topLeft.x <= rightCorner)) {

            if (onCollider) {
                // if the given sprite hits this sprite by bottom
                if (sprite.topLeft.y <= bottomCorner && sprite.topLeft.y >= bottomCorner - 5) {
                    onCollider.push("bottom");
                    // if the given sprite hits this sprite by top
                } else if (bottomSpriteCorner >= this._topLeft.y && bottomSpriteCorner <= this._topLeft.y + 5) {
                    onCollider.push("top");
                } else {
                    // if the given sprite hits this sprite by left or right
                    onCollider.push(
                        (rightSpriteCorner >= this.topLeft.x && rightSpriteCorner <= this.topLeft.x + 5)
                            ? "left" : "right"
                    );
                };
            };
        };
        return onCollider;
    };
};
