'use strict';
/**
 * Defines the player object of the game and manages its score and its lifes.
 */
class Player {
    /**
     * Defines the score and the number of life by default on the game.
     */
    constructor() {
        this._score = 0;
        this._life = DEFAULT_LIFE;
    };

    /**
     * Gets the score of the player.
     * @returns {number} the score of the player
     */
    get score() {
        return this._score;
    };

    /**
     * Gets the number of life of the player.
     * @returns {number} the number of life of the player
     */
    get life() {
        return this._life;
    };

    /**
     * Adds given points to the player's score.
     * @param {number} points : the given points to add to the score.
     */
    addToScore(points) {
        this._score += points;
    };

    /**
     * Removes one player's life.
     */
    removeLife() {
        this._life -= 1;
    };

    /**
     * Adds one player's life.
     */
    addLife() {
        this._life += 1;
    };

    /**
     * Checks if player is still alive (has more than 0 life).
     * @returns {Boolean} true if the player is alive, false otherwise.
     */
    isAlive() {
        return this._life > 0;
    };
};
